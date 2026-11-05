use std::collections::HashSet;
use std::net::{UdpSocket, SocketAddr};
use std::sync::atomic::{AtomicU64, Ordering};
use std::sync::Arc;
use std::time::Duration;

/**
 * MiTV Home AdBlock Shield - DNS Sinkhole Engine (Tương tự Pi-hole trên Raspberry Pi)
 * Biến Tivi Xiaomi thành trạm chặn quảng cáo toàn bộ mạng Wi-Fi gia đình
 */
pub struct DnsSinkhole {
    pub blocked_domains: HashSet<String>,
    pub total_queries: Arc<AtomicU64>,
    pub blocked_queries: Arc<AtomicU64>,
    pub upstream_dns: String,
}

impl DnsSinkhole {
    pub fn new() -> Self {
        let mut blocked = HashSet::new();

        // 1. Tên miền quảng cáo độc quyền Xiaomi & MIUI TV
        let xiaomi_ads = [
            "ad.xiaomi.com",
            "ad1.xiaomi.com",
            "data.mistat.xiaomi.com",
            "tracking.miui.com",
            "adv.sec.miui.com",
            "api.ad.xiaomi.com",
            "o2o.api.xiaomi.com",
            "stat.pandora.xiaomi.com",
            "upgrade.mifi.pt.xiaomi.com",
            "notice.pt.xiaomi.com",
        ];
        for d in xiaomi_ads { blocked.insert(d.to_string()); }

        // 2. Mạng quảng cáo phổ biến trên Smart TV và Web
        let global_ads = [
            "doubleclick.net",
            "googleads.g.doubleclick.net",
            "pagead2.googlesyndication.com",
            "adservice.google.com",
            "unityads.unity3d.com",
            "vungle.com",
            "inmobi.com",
            "appsflyer.com",
            "applovin.com",
            "ironsrc.mobi",
            "popads.net",
            "adcolony.com",
            "taboola.com",
            "outbrain.com",
        ];
        for d in global_ads { blocked.insert(d.to_string()); }

        DnsSinkhole {
            blocked_domains: blocked,
            total_queries: Arc::new(AtomicU64::new(0)),
            blocked_queries: Arc::new(AtomicU64::new(0)),
            upstream_dns: "1.1.1.1:53".to_string(), // Cloudflare Ultra-Fast DNS
        }
    }

    pub fn is_blocked(&self, domain: &str) -> bool {
        let clean = domain.trim_end_matches('.').to_lowercase();
        if self.blocked_domains.contains(&clean) {
            return true;
        }
        // Kiểm tra wildcard subdomain (vd: *.doubleclick.net)
        for b in &self.blocked_domains {
            if clean.ends_with(&format!(".{}", b)) {
                return true;
            }
        }
        false
    }

    pub fn parse_domain_from_dns_packet(buf: &[u8]) -> Option<String> {
        if buf.len() < 12 { return None; }
        let mut pos = 12;
        let mut parts = Vec::new();

        while pos < buf.len() {
            let len = buf[pos] as usize;
            if len == 0 { break; }
            pos += 1;
            if pos + len > buf.len() { return None; }
            if let Ok(part) = std::str::from_utf8(&buf[pos..pos + len]) {
                parts.push(part);
            }
            pos += len;
        }

        if parts.is_empty() { None } else { Some(parts.join(".")) }
    }

    pub fn run_server(&self, bind_port: u16) -> std::io::Result<()> {
        let socket = UdpSocket::bind(format!("0.0.0.0:{}", bind_port))?;
        socket.set_read_timeout(Some(Duration::from_millis(500)))?;

        println!("\x1b[1;32m[+] MiTV Home DNS Shield đang lắng nghe trên cổng UDP 53...\x1b[0m");
        println!("[*] Danh sách đen nạp sẵn: {} tên miền quảng cáo & theo dõi.", self.blocked_domains.len());

        let mut buf = [0u8; 512];
        let mut count = 0;

        // Vòng lặp lắng nghe thử nghiệm mẫu
        while count < 5 {
            if let Ok((amt, src)) = socket.recv_from(&mut buf) {
                self.total_queries.fetch_add(1, Ordering::Relaxed);
                if let Some(domain) = Self::parse_domain_from_dns_packet(&buf[..amt]) {
                    if self.is_blocked(&domain) {
                        self.blocked_queries.fetch_add(1, Ordering::Relaxed);
                        println!("\x1b[1;31m[CHẶN QUẢNG CÁO] Từ IP: {} -> Tên miền: {}\x1b[0m", src, domain);
                    } else {
                        println!("\x1b[1;36m[CHO PHÉP] Từ IP: {} -> {}\x1b[0m", src, domain);
                    }
                }
            }
            count += 1;
        }

        Ok(())
    }
}
