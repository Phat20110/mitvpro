/**
 * SMART REMOTE KEYPAD ENGINE (MITV PRO)
 * Tối ưu hóa toàn diện hàng phím số (0-9) trên Remote TV
 * Hỗ trợ: Direct Channel Jump, Speed Dial, Diagnostics HUD
 */

(function() {
    'use strict';

    // 1. Channel Mapping (Danh mục kênh số hóa)
    const CHANNEL_MAP = {
        '1': { name: 'VTV1 HD', cat: 'Thời Sự & Chính Luận', icon: 'img/vtvgo.png' },
        '2': { name: 'VTV2 HD', cat: 'Khoa Học & Đời Sống', icon: 'img/vtvgo.png' },
        '3': { name: 'VTV3 HD', cat: 'Giải Trí & Gameshow', icon: 'img/vtvgo.png' },
        '5': { name: 'VTV5 HD', cat: 'Thể Thao Dân Tộc', icon: 'img/vtvgo.png' },
        '6': { name: 'THVL1 HD', cat: 'Truyền Hình Vĩnh Long', icon: 'img/tivimate.png' },
        '7': { name: 'HTV7 HD', cat: 'Đài Truyền Hình TP.HCM', icon: 'img/tivimate.png' },
        '88': { name: 'K+ Sport 1 HD', cat: 'Ngoại Hạng Anh Đỉnh Cao', icon: 'img/monstertv.png' },
        '89': { name: 'K+ Sport 2 HD', cat: 'Champions League & Tennis', icon: 'img/monstertv.png' },
        '99': { name: 'Monster TV Live', cat: 'Bóng Đá Trực Tiếp 60fps', icon: 'img/monstertv.png' },
        '101': { name: 'HBO Cinema HD', cat: 'Phim Bom Tấn Hollywood', icon: 'img/cinema_4k.png' },
        '102': { name: 'CineMAX Action', cat: 'Phim Hành Động 24/7', icon: 'img/cinema_4k.png' }
    };

    let dialBuffer = '';
    let dialTimer = null;
    let keyPressTimers = {};
    let isDiagActive = false;

    // Khởi tạo DOM HUD nếu chưa có
    function initHudElements() {
        if (!document.getElementById('glassDialOverlay')) {
            const dialEl = document.createElement('aside');
            dialEl.id = 'glassDialOverlay';
            dialEl.className = 'glass-dial-overlay';
            dialEl.innerHTML = `
                <div class="glass-dial-num" id="glassDialNum">1</div>
                <div class="glass-dial-name" id="glassDialName">VTV1 HD</div>
                <div class="glass-dial-sub" id="glassDialSub">Đang nhảy kênh...</div>
            `;
            document.body.appendChild(dialEl);
        }

        if (!document.getElementById('glassDiagHud')) {
            const diagEl = document.createElement('aside');
            diagEl.id = 'glassDiagHud';
            diagEl.className = 'glass-diagnostics-hud';
            diagEl.innerHTML = `
                <div class="diag-header">
                    <span class="diag-title">Engine Diagnostics</span>
                    <span class="diag-badge">60 FPS</span>
                </div>
                <div class="diag-row"><span>Buffer Latency:</span><span class="diag-val highlight">180 ms</span></div>
                <div class="diag-row"><span>Stream Bitrate:</span><span class="diag-val">8.4 Mbps (4K HDR)</span></div>
                <div class="diag-row"><span>Video Codec:</span><span class="diag-val">HEVC / H.265 HW</span></div>
                <div class="diag-row"><span>Audio Codec:</span><span class="diag-val">Dolby Atmos 5.1</span></div>
                <div class="diag-row"><span>Engine RAM:</span><span class="diag-val highlight">42.8 MB</span></div>
                <div class="diag-row"><span>Zapping Speed:</span><span class="diag-val">0.19 s</span></div>
            `;
            document.body.appendChild(diagEl);
        }
    }

    // Hiển thị Overlay số kênh đang gõ
    function showDialOverlay(numStr) {
        initHudElements();
        const dialEl = document.getElementById('glassDialOverlay');
        const numEl = document.getElementById('glassDialNum');
        const nameEl = document.getElementById('glassDialName');
        const subEl = document.getElementById('glassDialSub');

        numEl.innerText = numStr;
        const channel = CHANNEL_MAP[numStr];
        if (channel) {
            nameEl.innerText = channel.name;
            subEl.innerText = channel.cat;
        } else {
            nameEl.innerText = 'Kênh Số ' + numStr;
            subEl.innerText = 'Đang dò luồng IPTV...';
        }

        dialEl.classList.add('active');

        clearTimeout(dialTimer);
        dialTimer = setTimeout(() => {
            executeChannelJump(numStr);
            dialEl.classList.remove('active');
            dialBuffer = '';
        }, 1200);
    }

    // Thực thi nhảy kênh
    function executeChannelJump(numStr) {
        const channel = CHANNEL_MAP[numStr];
        const title = channel ? channel.name : `Kênh Số ${numStr}`;
        const desc = channel ? channel.cat : 'Kênh truyền hình trực tiếp tốc độ cao.';
        
        if (window.showHud) {
            window.showHud(`📺 Đang mở [ ${numStr} ] : ${title} (Chất lượng 1080p 50fps)`);
        }

        // Tự động cuộn đến section hoặc cập nhật Hero nếu có
        const heroTitle = document.getElementById('heroTitle');
        if (heroTitle && channel) {
            window.updateHero(channel.name, channel.cat + ' - Đường truyền máy chủ tốc độ cao chuẩn TV.', 'ĐANG PHÁT TRỰC TIẾP', '', channel.icon);
        }
    }

    // Bật/tắt Diagnostic HUD khi bấm phím 0
    function toggleDiagnostics() {
        initHudElements();
        const diagEl = document.getElementById('glassDiagHud');
        isDiagActive = !isDiagActive;
        if (isDiagActive) {
            diagEl.classList.add('active');
        } else {
            diagEl.classList.remove('active');
        }
    }

    // Lắng nghe sự kiện bàn phím từ Remote TV
    document.addEventListener('keydown', function(e) {
        // Kiểm tra phím số 0-9
        let digit = null;
        if (e.key >= '0' && e.key <= '9') {
            digit = e.key;
        } else if (e.keyCode >= 48 && e.keyCode <= 57) {
            digit = String(e.keyCode - 48);
        } else if (e.keyCode >= 96 && e.keyCode <= 105) {
            digit = String(e.keyCode - 96);
        }

        if (digit !== null) {
            // Nếu bấm phím 0 khi buffer đang trống -> Bật/tắt Diagnostics HUD
            if (digit === '0' && dialBuffer === '') {
                toggleDiagnostics();
                e.preventDefault();
                return;
            }

            dialBuffer += digit;
            showDialOverlay(dialBuffer);
            e.preventDefault();
        }
    });

    console.log('[SmartKeypadEngine] Initialized with 11 channel mappings & Liquid Glass Overlay.');
})();
