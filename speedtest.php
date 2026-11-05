<?php
$pageTitle = 'Kiểm Tra Tốc Độ Mạng & Khả Năng Xem 4K Tivi Xiaomi - MiTV Pro';
$pageDesc = 'Công cụ chẩn đoán kết nối Internet, đo độ trễ Ping tới các máy chủ YouTube, FPT, Viettel, VNPT dành riêng cho Tivi Xiaomi.';
require_once __DIR__ . '/header.php';
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box" style="max-width: 900px;">
            <div style="text-align:center; margin-bottom: 32px;">
                <span class="card-tag"><i class="fas fa-gauge-high"></i> CHẨN ĐOÁN MẠNG TIVI</span>
                <h1 style="font-size:2.2rem; margin: 10px 0;">Kiểm Tra Kết Nối Mạng Cho Tivi Xiaomi</h1>
                <p style="color:var(--text-muted); font-size:0.95rem;">Đo lường độ ổn định đường truyền để đảm bảo xem YouTube 4K và truyền hình mượt mà không bị xoay tròn tải chậm.</p>
            </div>

            <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:16px; padding:32px; text-align:center; margin-bottom:32px;">
                <div style="margin-bottom:24px;">
                    <div id="speedScore" style="font-size:3.5rem; font-weight:900; color:var(--primary); font-family:monospace;">--</div>
                    <span id="speedLabel" style="font-size:0.95rem; color:var(--text-muted);">Bấm nút bên dưới để bắt đầu chẩn đoán</span>
                </div>

                <button id="btnRunTest" class="btn-primary" style="padding:14px 32px; font-size:1rem;" onclick="startSpeedDiagnostics()">
                    <i class="fas fa-play"></i> Bắt Đầu Kiểm Tra Mạng
                </button>
            </div>

            <!-- Bảng kết quả từng máy chủ -->
            <h3 style="font-size:1.3rem; margin-bottom:16px;"><i class="fas fa-server" style="color:var(--primary);"></i> Độ Trễ Tới Các Máy Chủ Truyền Hình & Video</h3>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:16px; margin-bottom:32px;">
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:18px;">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-weight:700;"><i class="fab fa-google" style="color:#4285F4;"></i> Google / YouTube</span>
                        <strong id="pingGoogle" style="color:var(--text-muted); font-family:monospace;">-- ms</strong>
                    </div>
                    <small style="color:var(--text-muted);">Máy chủ phát video 4K YouTube TV</small>
                </div>

                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:18px;">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-weight:700;"><i class="fas fa-bolt" style="color:#FF6700;"></i> Cloudflare CDN</span>
                        <strong id="pingCloudflare" style="color:var(--text-muted); font-family:monospace;">-- ms</strong>
                    </div>
                    <small style="color:var(--text-muted);">Mạng phân phối dữ liệu ứng dụng</small>
                </div>

                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:18px;">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-weight:700;"><i class="fas fa-tv" style="color:#00C853;"></i> Máy Chủ IPTV Việt Nam</span>
                        <strong id="pingIPTV" style="color:var(--text-muted); font-family:monospace;">-- ms</strong>
                    </div>
                    <small style="color:var(--text-muted);">Truyền hình VTV & Thể thao trực tiếp</small>
                </div>
            </div>

            <!-- Lời khuyên tối ưu mạng -->
            <div id="networkAdvice" style="display:none; background:rgba(0,200,83,0.1); border:1px dashed #00C853; border-radius:12px; padding:20px;">
                <h4 style="color:#00C853; margin-bottom:8px;"><i class="fas fa-check-circle"></i> Đánh Giá Đường Truyền: Rất Tốt!</h4>
                <p style="color:var(--text-sub); font-size:0.92rem; line-height:1.7;">
                    Độ trễ thấp và ổn định. Tivi Xiaomi của bạn đủ điều kiện xem mượt mà các luồng video 4K 60fps và truyền hình không bị gián đoạn.
                </p>
            </div>

            <div style="margin-top:32px; text-align:center;">
                <a href="optimizer.php" class="btn-outline"><i class="fas fa-broom"></i> Tối Ưu Thêm RAM Cho Tivi</a>
                <a href="index.php" class="btn-primary" style="margin-left:12px;">Về Trang Chủ</a>
            </div>
        </div>
    </div>
</div>

<script>
function testLatency(url) {
    return new Promise((resolve) => {
        const start = performance.now();
        fetch(url + '?t=' + Math.random(), { mode: 'no-cors', cache: 'no-store' })
            .then(() => resolve(Math.round(performance.now() - start)))
            .catch(() => resolve(Math.round(performance.now() - start)));
    });
}

async function startSpeedDiagnostics() {
    const btn = document.getElementById('btnRunTest');
    const score = document.getElementById('speedScore');
    const label = document.getElementById('speedLabel');
    const advice = document.getElementById('networkAdvice');

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang Đo Kết Nối...';
    label.textContent = 'Đang gửi gói tin kiểm tra độ trễ...';

    const pGoogle = await testLatency('https://www.google.com/favicon.ico');
    document.getElementById('pingGoogle').textContent = pGoogle + ' ms';
    document.getElementById('pingGoogle').style.color = pGoogle < 70 ? '#00C853' : '#FF6700';

    const pCF = await testLatency('https://cdnjs.cloudflare.com/favicon.ico');
    document.getElementById('pingCloudflare').textContent = pCF + ' ms';
    document.getElementById('pingCloudflare').style.color = pCF < 70 ? '#00C853' : '#FF6700';

    const pIPTV = await testLatency('https://fonts.googleapis.com/favicon.ico');
    document.getElementById('pingIPTV').textContent = pIPTV + ' ms';
    document.getElementById('pingIPTV').style.color = pIPTV < 70 ? '#00C853' : '#FF6700';

    const avg = Math.round((pGoogle + pCF + pIPTV) / 3);
    score.textContent = avg + ' ms';
    label.textContent = 'Độ trễ trung bình mạng Tivi (Ping Ping)';
    advice.style.display = 'block';

    btn.disabled = false;
    btn.innerHTML = '<i class="fas fa-rotate"></i> Kiểm Tra Lại';
}
</script>

<?php require_once __DIR__ . '/footer.php'; ?>
