<?php
$pageTitle = 'MiTV Store - Kho Ứng Dụng & Clean Launcher Cho Tivi Xiaomi (Không Quảng Cáo)';
$pageDesc = 'Kho ứng dụng CH Play độc quyền cho Tivi Xiaomi: Cài đặt trực tiếp 1 chạm bóng đá trực tiếp, VTV1 HD, phim 4K không quảng cáo và tối ưu RAM.';
require_once __DIR__ . '/header.php';
?>

<style>
/* TV App Store (10-Foot UI for Android TV / Remote D-Pad Navigation) */
:root {
    --store-card-bg: #141329;
    --store-focus-border: #FF6700;
    --store-focus-glow: rgba(255, 103, 0, 0.45);
}

.tv-store-wrapper {
    padding: 30px 0 60px;
}

.tv-banner-hero {
    background: linear-gradient(135deg, #181534 0%, #0d0c1d 100%);
    border: 2px solid var(--border-subtle);
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 35px;
    position: relative;
    overflow: hidden;
}

.tv-category-pills {
    display: flex;
    gap: 12px;
    overflow-x: auto;
    padding-bottom: 12px;
    margin-bottom: 30px;
}

.tv-category-btn {
    background: #1b1935;
    border: 1px solid var(--border-subtle);
    color: var(--text-sub);
    padding: 10px 22px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.25s ease;
    white-space: nowrap;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.tv-category-btn:hover, .tv-category-btn.active, .tv-category-btn:focus {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
    box-shadow: 0 4px 15px var(--store-focus-glow);
    outline: none;
    transform: scale(1.05);
}

.tv-apps-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
}

.tv-app-card {
    background: var(--store-card-bg);
    border: 2px solid var(--border-subtle);
    border-radius: 18px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.25s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

/* Hiệu ứng chọn bằng Remote TV (Focus state) */
.tv-app-card:hover, .tv-app-card:focus-within {
    border-color: var(--store-focus-border);
    box-shadow: 0 10px 25px var(--store-focus-glow);
    transform: translateY(-6px) scale(1.02);
    outline: none;
}

.tv-app-header {
    display: flex;
    gap: 16px;
    margin-bottom: 14px;
}

.tv-app-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    flex-shrink: 0;
}

.tv-app-meta h3 {
    margin: 0 0 4px;
    font-size: 1.25rem;
    color: #fff;
}

.tv-app-meta span {
    font-size: 0.8rem;
    color: var(--text-muted);
}

.tv-app-desc {
    font-size: 0.88rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.tv-app-tags {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    margin-bottom: 18px;
}

.tv-tag {
    font-size: 0.72rem;
    padding: 3px 8px;
    border-radius: 6px;
    font-weight: 700;
}

.tv-install-btn {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.2s ease;
    text-decoration: none;
}

.tv-install-btn:focus, .tv-install-btn:hover {
    filter: brightness(1.15);
    transform: scale(1.02);
    outline: 2px solid #fff;
}
</style>

<div class="tv-store-wrapper">
    <div class="container">
        <!-- Hero Header -->
        <div class="tv-banner-hero">
            <div style="max-width: 750px;">
                <span class="card-tag" style="background:var(--primary); color:#fff;"><i class="fas fa-cubes"></i> KHO ỨNG DỤNG TIVI TẬP TRUNG (ALL-IN-ONE)</span>
                <h1 style="font-size: 2.2rem; margin: 12px 0 8px;">MiTV Store - CH Play Độc Quyền Cho Xiaomi TV</h1>
                <p style="color:var(--text-muted); font-size:1.05rem; line-height:1.7; margin-bottom: 20px;">
                    Chỉ cần cài <strong>1 ứng dụng duy nhất</strong> trên tivi. Toàn bộ kho app xem bóng đá trực tiếp, truyền hình VTV1-VTV9, phim 4K không quảng cáo đều nằm sẵn bên trong — bấm là cài ngay không cần gõ mã!
                </p>
                <div style="display:flex; gap:16px; flex-wrap:wrap; align-items:center;">
                    <a href="downloads/MiTV-Pro.apk" download class="btn-primary" style="padding:12px 26px; font-size:1rem; text-decoration:none;">
                        <i class="fas fa-download"></i> Tải Gói Cài Đặt MiTV Pro TV APK (Bản Mới Nhất)
                    </a>
                    <span style="color:#00C853; font-weight:700; font-size:0.9rem;">
                        <i class="fas fa-shield-check"></i> Cam kết 100% Sạch & Không Quảng Cáo
                    </span>
                </div>
            </div>
        </div>

        <!-- Category Navigation Bar -->
        <div class="tv-category-pills">
            <button class="tv-category-btn active" onclick="filterStoreCategory('all', this)">
                <i class="fas fa-border-all"></i> Tất Cả Ứng Dụng
            </button>
            <button class="tv-category-btn" onclick="filterStoreCategory('football', this)">
                <i class="fas fa-futbol"></i> Bóng Đá Trực Tiếp
            </button>
            <button class="tv-category-btn" onclick="filterStoreCategory('tv', this)">
                <i class="fas fa-tv"></i> Truyền Hình VTV & Quốc Tế
            </button>
            <button class="tv-category-btn" onclick="filterStoreCategory('movie', this)">
                <i class="fas fa-film"></i> Phim 4K & YouTube Không QC
            </button>
            <button class="tv-category-btn" onclick="filterStoreCategory('system', this)">
                <i class="fas fa-bolt"></i> Tối Ưu RAM & Launcher
            </button>
        </div>

        <!-- Apps Catalog Grid -->
        <div class="tv-apps-grid" id="appsContainer">

            <!-- App 1: Monster TV Live Sports -->
            <div class="tv-app-card" data-category="football">
                <div>
                    <div class="tv-app-header">
                        <div class="tv-app-icon" style="background:rgba(255,59,48,0.15); color:#FF3B30;">
                            <i class="fas fa-futbol"></i>
                        </div>
                        <div class="tv-app-meta">
                            <h3>Monster TV Sports Live</h3>
                            <span>Phiên bản: v3.8.2 &bull; Dung lượng: 16 MB</span>
                        </div>
                    </div>
                    <div class="tv-app-tags">
                        <span class="tv-tag" style="background:rgba(255,59,48,0.2); color:#FF3B30;">NGOẠI HẠNG ANH</span>
                        <span class="tv-tag" style="background:rgba(255,103,0,0.2); color:var(--primary);">CÚP C1 CHÂU ÂU</span>
                        <span class="tv-tag" style="background:rgba(0,200,83,0.2); color:#00C853;">BL TIẾNG VIỆT</span>
                    </div>
                    <p class="tv-app-desc">
                        Trực tiếp toàn bộ các trận đấu bóng đá đỉnh cao: Ngoại Hạng Anh, C1 Champions League, La Liga, Serie A, V-League với đội ngũ bình luận viên tiếng Việt chuyên nghiệp, nhiều link dự phòng chống nghẽn.
                    </p>
                </div>
                <button class="tv-install-btn btn-primary" onclick="installAppDirect('Monster TV Sports', 'https://raw.githubusercontent.com/Phat20110/mitvpro/main/downloads/MiTV-Optimizer-v2.5.apk')">
                    <i class="fas fa-cloud-arrow-down"></i> Cài Đặt Trực Tiếp (1 Chạm)
                </button>
            </div>

            <!-- App 2: Xôi Lạc / Vebo TV Android TV Edition -->
            <div class="tv-app-card" data-category="football">
                <div>
                    <div class="tv-app-header">
                        <div class="tv-app-icon" style="background:rgba(255,103,0,0.15); color:var(--primary);">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="tv-app-meta">
                            <h3>Xôi Lạc & Vebo TV TV Edition</h3>
                            <span>Phiên bản: v2.4.0 &bull; Dung lượng: 12 MB</span>
                        </div>
                    </div>
                    <div class="tv-app-tags">
                        <span class="tv-tag" style="background:rgba(255,103,0,0.2); color:var(--primary);">CHUẨN REMOTE TV</span>
                        <span class="tv-tag" style="background:rgba(0,180,216,0.2); color:#00B4D8;">FULL HD 60FPS</span>
                    </div>
                    <p class="tv-app-desc">
                        Bản thiết kế tối ưu riêng biệt cho điều khiển Remote Tivi Xiaomi. Hỗ trợ xem trực tiếp các môn thể thao, tự động bắt luồng máy chủ tốc độ cao nhất gần vị trí của bạn.
                    </p>
                </div>
                <button class="tv-install-btn btn-primary" onclick="installAppDirect('Xôi Lạc TV', 'https://raw.githubusercontent.com/Phat20110/mitvpro/main/downloads/MiTV-Optimizer-v2.5.apk')">
                    <i class="fas fa-cloud-arrow-down"></i> Cài Đặt Trực Tiếp (1 Chạm)
                </button>
            </div>

            <!-- App 3: VTV Go TV Chính Thức -->
            <div class="tv-app-card" data-category="tv">
                <div>
                    <div class="tv-app-header">
                        <div class="tv-app-icon" style="background:rgba(235,50,35,0.15); color:#FF3D3D;">
                            <i class="fas fa-tv"></i>
                        </div>
                        <div class="tv-app-meta">
                            <h3>VTV Go TV (Bản Chuẩn TV)</h3>
                            <span>Đài THVN &bull; Dung lượng: 18 MB</span>
                        </div>
                    </div>
                    <div class="tv-app-tags">
                        <span class="tv-tag" style="background:rgba(235,50,35,0.2); color:#FF3D3D;">VTV1 - VTV9</span>
                        <span class="tv-tag" style="background:rgba(0,200,83,0.2); color:#00C853;">XEM LẠI 6 THÁNG</span>
                        <span class="tv-tag" style="background:rgba(255,255,255,0.1); color:#fff;">CHÍNH THỨC</span>
                    </div>
                    <p class="tv-app-desc">
                        Ứng dụng bản quyền của Đài Truyền Hình Việt Nam: Xem Thời sự 19h VTV1 HD, thể thao VTV5/VTV Cần Thơ, giải trí VTV3. Tích hợp lịch phát sóng và tính năng xem lại chương trình yêu thích.
                    </p>
                </div>
                <button class="tv-install-btn btn-primary" onclick="installAppDirect('VTV Go TV', 'https://raw.githubusercontent.com/Phat20110/mitvpro/main/downloads/MiTV-Optimizer-v2.5.apk')">
                    <i class="fas fa-cloud-arrow-down"></i> Cài Đặt Trực Tiếp (1 Chạm)
                </button>
            </div>

            <!-- App 4: TiviMate IPTV Player Pro -->
            <div class="tv-app-card" data-category="tv">
                <div>
                    <div class="tv-app-header">
                        <div class="tv-app-icon" style="background:rgba(0,200,83,0.15); color:#00C853;">
                            <i class="fas fa-satellite-dish"></i>
                        </div>
                        <div class="tv-app-meta">
                            <h3>TiviMate IPTV Player Pro</h3>
                            <span>Phiên bản: v4.7.0 &bull; Dung lượng: 14 MB</span>
                        </div>
                    </div>
                    <div class="tv-app-tags">
                        <span class="tv-tag" style="background:rgba(0,200,83,0.2); color:#00C853;">250+ KÊNH VN & QT</span>
                        <span class="tv-tag" style="background:rgba(124,77,255,0.2); color:#7C4DFF;">HBO & DISCOVERY</span>
                        <span class="tv-tag" style="background:rgba(255,103,0,0.2); color:var(--primary);">K+ SPORT 1-2</span>
                    </div>
                    <p class="tv-app-desc">
                        Trình phát truyền hình số 1 cho Android TV: Đầy đủ các đài VTV, HTV, THVL Vĩnh Long, VTC và các kênh quốc tế chọn lọc có lồng tiếng/thuyết minh tiếng Việt. Chuyển kênh siêu tốc dưới 0.3s.
                    </p>
                </div>
                <button class="tv-install-btn btn-primary" onclick="installAppDirect('TiviMate IPTV Pro', 'https://raw.githubusercontent.com/Phat20110/mitvpro/main/downloads/MiTV-Optimizer-v2.5.apk')">
                    <i class="fas fa-cloud-arrow-down"></i> Cài Đặt Trực Tiếp (1 Chạm)
                </button>
            </div>

            <!-- App 5: SmartTube Next Stable 4K -->
            <div class="tv-app-card" data-category="movie">
                <div>
                    <div class="tv-app-header">
                        <div class="tv-app-icon" style="background:rgba(235,50,35,0.15); color:#FF3D3D;">
                            <i class="fab fa-youtube"></i>
                        </div>
                        <div class="tv-app-meta">
                            <h3>SmartTube Next Stable (YouTube TV)</h3>
                            <span>Phiên bản: v22.40 &bull; Dung lượng: 21 MB</span>
                        </div>
                    </div>
                    <div class="tv-app-tags">
                        <span class="tv-tag" style="background:rgba(0,200,83,0.2); color:#00C853;">CHẶN 100% QUẢNG CÁO</span>
                        <span class="tv-tag" style="background:rgba(0,180,216,0.2); color:#00B4D8;">4K 60FPS HDR</span>
                        <span class="tv-tag" style="background:rgba(255,103,0,0.2); color:var(--primary);">SPONSORBLOCK</span>
                    </div>
                    <p class="tv-app-desc">
                        Bản YouTube hoàn hảo nhất cho Tivi Xiaomi: Tuyệt đối không có quảng cáo, tự động bỏ qua intro xin tài trợ của video, hỗ trợ đăng nhập tài khoản Google và bypass chặn mạng của các nhà mạng viễn thông.
                    </p>
                </div>
                <button class="tv-install-btn btn-primary" onclick="installAppDirect('SmartTube Next 4K', 'downloads/SmartTube-Stable.apk')">
                    <i class="fas fa-cloud-arrow-down"></i> Cài Đặt Trực Tiếp (1 Chạm)
                </button>
            </div>

            <!-- App 5b: YTXTube TV Edition (Liquid Glass UI) -->
            <div class="tv-app-card" data-category="movie">
                <div>
                    <div class="tv-app-header">
                        <div class="tv-app-icon" style="background:rgba(255,23,68,0.15); color:#FF1744;">
                            <i class="fab fa-youtube"></i>
                        </div>
                        <div class="tv-app-meta">
                            <h3>YTXTube TV (v2.2.0 - Liquid Glass)</h3>
                            <span>Tác giả: Koustubh12345 &bull; Dung lượng: 4.1 MB (Siêu Nhẹ)</span>
                        </div>
                    </div>
                    <div class="tv-app-tags">
                        <span class="tv-tag" style="background:rgba(255,23,68,0.2); color:#FF1744;">LIQUID GLASS UI</span>
                        <span class="tv-tag" style="background:rgba(0,200,83,0.2); color:#00C853;">REMOTE D-PAD READY</span>
                        <span class="tv-tag" style="background:rgba(33,150,243,0.2); color:#2196F3;">YT MUSIC & 4K</span>
                    </div>
                    <p class="tv-app-desc">
                        Bản YouTube & Music mã nguồn mở thiết kế giao diện kính mờ Liquid Glass siêu mượt. Không quảng cáo, hỗ trợ cuộn Shorts vô tận, lời bài hát phong cách Apple Music, tối ưu hoàn hảo cho Remote Tivi và màn hình lớn.
                    </p>
                </div>
                <div style="display:flex; gap:8px; margin-top:16px;">
                    <a href="downloads/YTXTube-v2.2.0.apk" download class="tv-install-btn btn-primary" style="flex:2; text-decoration:none; text-align:center; padding:12px; border-radius:10px;">
                        <i class="fas fa-cloud-arrow-down"></i> Tải APK (4.1MB)
                    </a>
                    <a href="https://github.com/Koustubh12345/YTXTube" target="_blank" class="tv-install-btn" style="flex:1; background:rgba(255,255,255,0.08); color:var(--text-main); text-decoration:none; text-align:center; padding:12px; border-radius:10px; border:1px solid var(--border-subtle);">
                        <i class="fab fa-github"></i> Repo
                    </a>
                </div>
            </div>

            <!-- App 6: Stremio TV 4K Cinema -->
            <div class="tv-app-card" data-category="movie">
                <div>
                    <div class="tv-app-header">
                        <div class="tv-app-icon" style="background:rgba(124,77,255,0.15); color:#7C4DFF;">
                            <i class="fas fa-film"></i>
                        </div>
                        <div class="tv-app-meta">
                            <h3>Stremio TV 4K Cinema</h3>
                            <span>Phiên bản: v1.6.11 &bull; Dung lượng: 32 MB</span>
                        </div>
                    </div>
                    <div class="tv-app-tags">
                        <span class="tv-tag" style="background:rgba(124,77,255,0.2); color:#7C4DFF;">RẠP PHIM 4K REMUX</span>
                        <span class="tv-tag" style="background:rgba(0,180,216,0.2); color:#00B4D8;">DOLBY ATMOS 7.1</span>
                        <span class="tv-tag" style="background:rgba(0,200,83,0.2); color:#00C853;">PHỤ ĐỀ VIỆT TỰ ĐỘNG</span>
                    </div>
                    <p class="tv-app-desc">
                        Kho phim chiếu rạp bom tấn Netflix, HBO, Disney+, Apple TV+. Xem phim chất lượng nguyên bản 4K Dolby Vision, tự động kéo phụ đề tiếng Việt chuẩn điện ảnh.
                    </p>
                </div>
                <button class="tv-install-btn btn-primary" onclick="installAppDirect('Stremio 4K TV', 'https://raw.githubusercontent.com/Phat20110/mitvpro/main/downloads/MiTV-Optimizer-v2.5.apk')">
                    <i class="fas fa-cloud-arrow-down"></i> Cài Đặt Trực Tiếp (1 Chạm)
                </button>
            </div>

            <!-- App 7: MiTV Pro Native Cleaner & Launcher -->
            <div class="tv-app-card" data-category="system">
                <div>
                    <div class="tv-app-header">
                        <div class="tv-app-icon" style="background:rgba(255,103,0,0.15); color:var(--primary);">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <div class="tv-app-meta">
                            <h3>MiTV Clean Launcher & RAM Core</h3>
                            <span>Lõi C++20 & Rust &bull; Dung lượng: 4.8 MB</span>
                        </div>
                    </div>
                    <div class="tv-app-tags">
                        <span class="tv-tag" style="background:rgba(255,103,0,0.2); color:var(--primary);">LAUNCHER SẠCH 100%</span>
                        <span class="tv-tag" style="background:rgba(0,200,83,0.2); color:#00C853;">HỒI PHỤC 50% RAM</span>
                        <span class="tv-tag" style="background:rgba(255,59,48,0.2); color:#FF3B30;">KHÓA QUẢNG CÁO XIAOMI</span>
                    </div>
                    <p class="tv-app-desc">
                        Launcher màn hình chính siêu sạch thay thế giao diện PatchWall đầy quảng cáo của Xiaomi TV. Đóng băng các tiến trình ngầm, đo độ trễ IPTV và tăng tốc tivi mượt như mới.
                    </p>
                </div>
                <button class="tv-install-btn btn-primary" onclick="installAppDirect('MiTV Clean Launcher', 'https://raw.githubusercontent.com/Phat20110/mitvpro/main/downloads/MiTV-Optimizer-v2.5.apk')">
                    <i class="fas fa-cloud-arrow-down"></i> Cài Đặt Trực Tiếp (1 Chạm)
                </button>
            </div>

        </div>
    </div>
</div>

<script>
function filterStoreCategory(category, btn) {
    document.querySelectorAll('.tv-category-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const cards = document.querySelectorAll('.tv-app-card');
    cards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-category') === category) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}

function installAppDirect(appName, downloadUrl) {
    if (confirm('Bắt đầu tải và cài đặt ứng dụng: ' + appName + ' vào Tivi Xiaomi?')) {
        window.location.href = downloadUrl;
    }
}
</script>

<?php require_once __DIR__ . '/footer.php'; ?>
