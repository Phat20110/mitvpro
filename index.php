<?php
$pageTitle = 'Trang Chủ - Giải Pháp Tối Ưu & Cài Đặt Tivi Xiaomi';
$pageDesc = 'Nâng cấp Tivi Xiaomi mượt mà như mới: Gỡ bỏ app rác, dọn RAM, cài YouTube không quảng cáo, kho phim truyền hình miễn phí vĩnh viễn.';
require_once __DIR__ . '/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-circle"></i> Hệ Thống Hỗ Trợ Chuyên Sâu Tivi Xiaomi Số 1 VN
                </div>
                <h1 class="hero-title">
                    Tối Ưu Tốc Độ & Cài Đặt <br>
                    <span class="gradient-text">Tivi Xiaomi</span> Chuyên Nghiệp
                </h1>
                <p class="hero-desc">
                    Tivi Xiaomi bị giật lag, đầy bộ nhớ hay ngập tràn quảng cáo phiền toái? Chúng tôi cung cấp giải pháp miễn phí dọn dẹp hệ thống, gỡ app rác ngầm và dịch vụ cài đặt phần mềm từ xa an toàn 100%.
                </p>
                
                <div class="hero-actions">
                    <a href="optimizer.php" class="btn-primary">
                        <i class="fas fa-bolt"></i> Tải Phần Mềm Tối Ưu (Free)
                    </a>
                    <a href="downloader.php" class="btn-outline">
                        <i class="fas fa-barcode"></i> Nhập Mã Downloader
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <h4>15.8k<span>+</span></h4>
                        <p>Tivi Xiaomi Đã Tối Ưu</p>
                    </div>
                    <div class="stat-item">
                        <h4>4.9<span>★</span></h4>
                        <p>Đánh Giá Hài Lòng</p>
                    </div>
                    <div class="stat-item">
                        <h4>100<span>%</span></h4>
                        <p>Hỗ Trợ Từ Xa Tận Nhà</p>
                    </div>
                </div>
            </div>

            <!-- Hero Quick Downloader Box -->
            <div class="hero-card-wrapper">
                <div class="quick-code-card">
                    <div class="card-tag"><i class="fas fa-fire"></i> KHO ỨNG DỤNG TV ĐỘC QUYỀN</div>
                    <h3>Mã Tải Ứng Dụng Downloader</h3>
                    <p>Nhập mã số này trực tiếp vào ứng dụng <strong>Downloader</strong> trên tivi Xiaomi để tải toàn bộ bộ công cụ và app xem phim, YouTube không quảng cáo:</p>
                    
                    <div class="code-display">
                        <div class="code-val"><?php e(APP_DOWNLOADER_CODE); ?></div>
                        <button class="btn-copy" onclick="copyDownloaderCode('<?php e(APP_DOWNLOADER_CODE); ?>')">
                            <i class="fas fa-copy"></i> Sao Chép
                        </button>
                    </div>

                    <ul class="quick-steps">
                        <li><i class="fas fa-check-circle"></i> Bước 1: Mở app Downloader màu cam trên Tivi</li>
                        <li><i class="fas fa-check-circle"></i> Bước 2: Nhập đúng dãy số <strong><?php e(APP_DOWNLOADER_CODE); ?></strong></li>
                        <li><i class="fas fa-check-circle"></i> Bước 3: Bấm Go/Load để tải kho app về tivi</li>
                    </ul>

                    <div style="margin-top: 20px; text-align: center;">
                        <a href="downloader.php" style="color:var(--primary); font-size:0.88rem; font-weight:700;">
                            Xem danh sách toàn bộ các mã tải lẻ khác <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Free Tools Section (Thu hút người dùng) -->
<section class="section" style="background: #0E0E1B;">
    <div class="container">
        <div class="section-head">
            <span class="section-subtitle">Tiện Ích Miễn Phí 100%</span>
            <h2 class="section-title">Công Cụ Độc Quyền Cho Người Dùng Xiaomi TV</h2>
            <p class="section-desc">Chúng tôi phát triển các tiện ích tự động hóa giúp giải quyết triệt để các vấn đề nhức nhối nhất của Tivi Xiaomi.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <span class="feature-badge-free">HOT NHẤT</span>
                <div class="feature-icon"><i class="fas fa-broom"></i></div>
                <h3>MiTV Optimizer Pro</h3>
                <p>Ứng dụng chuyên dọn dẹp RAM, đóng băng tiến trình ngầm MIUI, giải phóng bộ nhớ đệm và gỡ triệt để app rác nội địa.</p>
                <a href="optimizer.php" class="feature-link">Tải APK & Hướng Dẫn <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="feature-card">
                <span class="feature-badge-free">TIỆN ÍCH</span>
                <div class="feature-icon"><i class="fas fa-tv"></i></div>
                <h3>Tra Cứu Model Tivi</h3>
                <p>Nhập mã đời máy Xiaomi của bạn để hệ thống tự động phân tích cấu hình phần cứng và gợi ý bản app nhẹ nhất, mượt nhất.</p>
                <a href="tool-check.php" class="feature-link">Kiểm Tra Ngay <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="feature-card">
                <span class="feature-badge-free">HƯỚNG DẪN</span>
                <div class="feature-icon"><i class="fas fa-ban"></i></div>
                <h3>Chặn Quảng Cáo Vĩnh Viễn</h3>
                <p>Bộ hướng dẫn tắt MSA, chặn quảng cáo mở máy Wallpaper Carousel và cấu hình DNS AdGuard Family riêng biệt cho Xiaomi TV.</p>
                <a href="guide-adblock.php" class="feature-link">Xem Hướng Dẫn <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="feature-card">
                <span class="feature-badge-free">KHO APP</span>
                <div class="feature-icon"><i class="fab fa-youtube"></i></div>
                <h3>YouTube SmartTube 4K</h3>
                <p>Bản YouTube tinh chỉnh riêng cho tivi: Tự động bỏ qua quảng cáo, bỏ qua đoạn tài trợ SponsorBlock, xem 4K HDR siêu nhẹ.</p>
                <a href="downloader.php" class="feature-link">Lấy Mã Tải <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Spotlight: Phần Mềm Tối Ưu RAM & Rác Chuyên Xiaomi -->
<section class="section">
    <div class="container">
        <div class="optimizer-banner">
            <div class="opt-details">
                <span class="card-tag"><i class="fas fa-microchip"></i> ĐỘC QUYỀN CHO XIAOMI TV</span>
                <h3>Phần Mềm Tối Ưu MiTV Cleaner</h3>
                <p style="color:var(--text-muted); line-height: 1.7;">Khác biệt hoàn toàn với các app dọn rác thông thường trên CH Play, MiTV Cleaner được lập trình bám sát kiến trúc hệ điều hành PatchWall và MIUI TV của Xiaomi:</p>
                <ul class="opt-features">
                    <li><i class="fas fa-check-circle"></i> Tắt các dịch vụ theo dõi quảng cáo ngầm (com.miui.msa, miui.daemon).</li>
                    <li><i class="fas fa-check-circle"></i> Tối ưu RAM thời gian thực, hồi phục 40-50% dung lượng RAM trống.</li>
                    <li><i class="fas fa-check-circle"></i> Không chứa quảng cáo, dung lượng cài đặt siêu nhẹ chỉ 4.8MB.</li>
                    <li><i class="fas fa-check-circle"></i> Tương thích 100% remote điều khiển giọng nói Xiaomi.</li>
                </ul>
                <div style="display:flex; gap:16px; flex-wrap:wrap;">
                    <a href="optimizer.php" class="btn-primary">
                        <i class="fas fa-download"></i> Tải Ngay Về Tivi (Miễn Phí)
                    </a>
                    <a href="tool-check.php" class="btn-outline">
                        <i class="fas fa-circle-info"></i> Xem Tính Tương Thích
                    </a>
                </div>
            </div>

            <div class="opt-card-mockup">
                <div class="ram-circle">
                    <div class="ram-val">45%</div>
                    <div class="ram-label">RAM TIẾT KIỆM</div>
                </div>
                <h4 style="font-size:1.1rem; margin-bottom:8px;">Trạng Thái Hệ Thống</h4>
                <p style="font-size:0.85rem; color:#00C853;"><i class="fas fa-shield-check"></i> Đã kích hoạt chế độ siêu mượt</p>
                <div style="margin-top:16px; font-size:0.75rem; color:var(--text-muted);">
                    Phát hành phiên bản v2.5.0 &bull; Cập nhật tháng <?php echo date('m/Y'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kho Ứng Dụng Giải Trí Đỉnh Cao: Bóng Đá, VTV1 & Phim 4K -->
<section class="section" style="background:#090915; border-top:1px solid var(--border-subtle); border-bottom:1px solid var(--border-subtle);">
    <div class="container">
        <div class="section-head">
            <span class="section-subtitle"><i class="fas fa-sparkles"></i> Kho Giải Trí Đỉnh Cao</span>
            <h2 class="section-title">Kho Ứng Dụng Độc Quyền Cho Tivi Xiaomi</h2>
            <p class="section-desc">Tải trực tiếp bằng mã Downloader trong 3 giây: Xem trọn vẹn bóng đá Ngoại Hạng Anh, VTV1 HD và rạp phim 4K không quảng cáo.</p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:24px;">
            <!-- Category 1: Bóng Đá -->
            <div style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-10px; right:-10px; width:80px; height:80px; background:rgba(255,59,48,0.06); border-radius:50%;"></div>
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <span style="background:rgba(255,59,48,0.15); color:#FF3B30; width:46px; height:46px; display:inline-flex; align-items:center; justify-content:center; border-radius:12px; font-size:1.4rem;">
                        <i class="fas fa-futbol"></i>
                    </span>
                    <div>
                        <span style="font-size:0.75rem; background:rgba(255,59,48,0.2); color:#FF3B30; padding:2px 8px; border-radius:4px; font-weight:700;">LIVE FOOTBALL</span>
                        <h4 style="font-size:1.3rem; margin:4px 0 0;">Xem Bóng Đá Trực Tiếp</h4>
                    </div>
                </div>
                <p style="color:var(--text-muted); font-size:0.9rem; line-height:1.7; margin-bottom:20px;">
                    Trọn vẹn các giải đấu hàng đầu thế giới: Ngoại Hạng Anh, Cúp C1, Euro, World Cup và V-League với bình luận tiếng Việt chuyên nghiệp, độ trễ cực thấp.
                </p>
                <div style="background:rgba(0,0,0,0.3); padding:12px 16px; border-radius:10px; margin-bottom:20px; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:0.85rem; color:var(--text-sub);">Mã Downloader:</span>
                    <strong style="color:var(--primary); font-family:monospace; font-size:1.3rem;">88412</strong>
                </div>
                <a href="downloader.php" class="btn-outline" style="width:100%; justify-content:center; padding:10px;">
                    <i class="fas fa-arrow-right"></i> Xem Mã Tải Nhanh
                </a>
            </div>

            <!-- Category 2: Truyền Hình VTV1 -->
            <div style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-10px; right:-10px; width:80px; height:80px; background:rgba(0,200,83,0.06); border-radius:50%;"></div>
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <span style="background:rgba(0,200,83,0.15); color:#00C853; width:46px; height:46px; display:inline-flex; align-items:center; justify-content:center; border-radius:12px; font-size:1.4rem;">
                        <i class="fas fa-tv"></i>
                    </span>
                    <div>
                        <span style="font-size:0.75rem; background:rgba(0,200,83,0.2); color:#00C853; padding:2px 8px; border-radius:4px; font-weight:700;">VTV1 & 250+ KÊNH</span>
                        <h4 style="font-size:1.3rem; margin:4px 0 0;">Truyền Hình Quốc Gia & QT</h4>
                    </div>
                </div>
                <p style="color:var(--text-muted); font-size:0.9rem; line-height:1.7; margin-bottom:20px;">
                    Xem trọn gói thời sự VTV1 HD, VTV2, VTV3, VTV Cần Thơ, THVL Vĩnh Long cùng các kênh quốc tế chọn lọc HBO, Cinemax, Discovery có thuyết minh.
                </p>
                <div style="background:rgba(0,0,0,0.3); padding:12px 16px; border-radius:10px; margin-bottom:20px; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:0.85rem; color:var(--text-sub);">Mã Downloader VTV:</span>
                    <strong style="color:var(--primary); font-family:monospace; font-size:1.3rem;">52410</strong>
                </div>
                <a href="downloader.php" class="btn-outline" style="width:100%; justify-content:center; padding:10px;">
                    <i class="fas fa-arrow-right"></i> Xem Mã Tải Nhanh
                </a>
            </div>

            <!-- Category 3: Phim 4K & YouTube -->
            <div style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:16px; padding:28px; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-10px; right:-10px; width:80px; height:80px; background:rgba(124,77,255,0.06); border-radius:50%;"></div>
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <span style="background:rgba(124,77,255,0.15); color:#7C4DFF; width:46px; height:46px; display:inline-flex; align-items:center; justify-content:center; border-radius:12px; font-size:1.4rem;">
                        <i class="fas fa-film"></i>
                    </span>
                    <div>
                        <span style="font-size:0.75rem; background:rgba(124,77,255,0.2); color:#7C4DFF; padding:2px 8px; border-radius:4px; font-weight:700;">4K DOLBY & NO ADS</span>
                        <h4 style="font-size:1.3rem; margin:4px 0 0;">Phim 4K & YouTube Không Quảng Cáo</h4>
                    </div>
                </div>
                <p style="color:var(--text-muted); font-size:0.9rem; line-height:1.7; margin-bottom:20px;">
                    YouTube TV bản 4K 60fps HDR chặn sạch 100% quảng cáo, kèm ứng dụng rạp phim Stremio 4K Remux Dolby Atmos phụ đề tiếng Việt tự động.
                </p>
                <div style="background:rgba(0,0,0,0.3); padding:12px 16px; border-radius:10px; margin-bottom:20px; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:0.85rem; color:var(--text-sub);">Mã Downloader 4K:</span>
                    <strong style="color:var(--primary); font-family:monospace; font-size:1.3rem;">28544</strong>
                </div>
                <a href="downloader.php" class="btn-outline" style="width:100%; justify-content:center; padding:10px;">
                    <i class="fas fa-arrow-right"></i> Xem Mã Tải Nhanh
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Bảng Giá Dịch Vụ Cài Đặt Từ Xa Chuyên Nghiệp -->
<section class="section" id="pricing" style="background:#0E0E1B;">
    <div class="container">
        <div class="section-head">
            <span class="section-subtitle">Dịch Vụ Hỗ Trợ Từ Xa</span>
            <h2 class="section-title">Bảng Giá Cài Đặt Tận Nhà Qua Mạng</h2>
            <p class="section-desc">Không cần tháo máy, không cần mang vác đi đâu. Kỹ thuật viên kết nối trực tiếp qua mạng để cài đặt và bàn giao hoàn chỉnh trong 20 phút.</p>
        </div>

        <div class="pricing-grid">
            <!-- Gói Cơ Bản -->
            <div class="price-card">
                <div class="price-name">Gói Cơ Bản</div>
                <div class="price-amount">99k <span>/ máy</span></div>
                <div class="price-desc">Phù hợp khách hàng chỉ có nhu cầu cài đặt 1 ứng dụng cụ thể (ví dụ chỉ cài YouTube không QC).</div>
                <ul class="price-checklist">
                    <li><i class="fas fa-check"></i> Cài đặt 01 ứng dụng tùy chọn</li>
                    <li><i class="fas fa-check"></i> Cài đặt từ xa qua mạng an toàn</li>
                    <li><i class="fas fa-check"></i> Hướng dẫn sử dụng chi tiết</li>
                    <li><i class="fas fa-check"></i> Bảo hành hoạt động 15 ngày</li>
                </ul>
                <a href="<?php e(APP_ZALO); ?>" target="_blank" class="btn-outline" style="justify-content:center;">Đăng Ký Cài Đặt</a>
            </div>

            <!-- Gói Trọn Gói (Featured) -->
            <div class="price-card featured">
                <div class="featured-pill"><i class="fas fa-fire"></i> 95% KHÁCH HÀNG CHỌN</div>
                <div class="price-name" style="color:var(--primary);">Gói Trọn Gói Siêu Tốc</div>
                <div class="price-amount">199k <span>/ máy</span></div>
                <div class="price-desc">Combo toàn diện đưa Tivi Xiaomi lên hiệu năng cao nhất, giải trí đỉnh nóc không quảng cáo.</div>
                <ul class="price-checklist">
                    <li><i class="fas fa-check"></i> YouTube Chặn QC 4K chuẩn âm thanh 5.1</li>
                    <li><i class="fas fa-check"></i> Kho 200+ kênh truyền hình HD, VTV, thể thao</li>
                    <li><i class="fas fa-check"></i> Kho phim chiếu rạp cập nhật mới nhất</li>
                    <li><i class="fas fa-check"></i> Tắt triệt để quảng cáo giao diện Xiaomi</li>
                    <li><i class="fas fa-check"></i> Tối ưu RAM, gỡ sạch ứng dụng rác chạy ngầm</li>
                    <li><i class="fas fa-check"></i> Bảo hành kỹ thuật 60 ngày 1-đổi-1</li>
                </ul>
                <a href="<?php e(APP_ZALO); ?>" target="_blank" class="btn-primary" style="justify-content:center;">Đăng Ký Ngay (Khuyên Dùng)</a>
            </div>

            <!-- Gói VIP Trọn Đời -->
            <div class="price-card">
                <div class="price-name">Gói VIP Trọn Đời</div>
                <div class="price-amount">299k <span>/ trọn đời</span></div>
                <div class="price-desc">Dành cho gia đình muốn được bảo hành và cập nhật ứng dụng mới vĩnh viễn không lo phát sinh phí.</div>
                <ul class="price-checklist">
                    <li><i class="fas fa-check"></i> Toàn bộ quyền lợi của Gói Trọn Gói</li>
                    <li><i class="fas fa-check"></i> Cài đặt thêm ứng dụng Hát Karaoke & Spotify TV</li>
                    <li><i class="fas fa-check"></i> Hỗ trợ cập nhật ứng dụng miễn phí trọn đời</li>
                    <li><i class="fas fa-check"></i> Ưu tiên kỹ thuật viên hỗ trợ nhanh trong 5 phút</li>
                    <li><i class="fas fa-check"></i> Bảo hành phần mềm vĩnh viễn theo tivi</li>
                </ul>
                <a href="<?php e(APP_ZALO); ?>" target="_blank" class="btn-outline" style="justify-content:center;">Đăng Ký Gói VIP</a>
            </div>
        </div>
    </div>
</section>

<!-- FAQs Section -->
<section class="section" id="faq">
    <div class="container" style="max-width:840px;">
        <div class="section-head">
            <span class="section-subtitle">Giải Đáp Thắc Mắc</span>
            <h2 class="section-title">Câu Hỏi Thường Gặp</h2>
            <p class="section-desc">Mọi điều bạn cần biết về độ an toàn, bảo mật và quy trình cài đặt từ xa.</p>
        </div>

        <div class="faq-list">
            <div class="faq-accordion-item" style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:12px; margin-bottom:12px; overflow:hidden;">
                <div class="faq-header" style="padding:20px 24px; cursor:pointer; display:flex; justify-content:space-between; align-items:center; font-weight:700;">
                    <span>Cài đặt từ xa có can thiệp làm mất bảo hành chính hãng của Xiaomi không?</span>
                    <i class="fas fa-chevron-down" style="color:var(--primary);"></i>
                </div>
                <div class="faq-body" style="padding:0 24px 20px; color:var(--text-muted); font-size:0.95rem; line-height:1.7;">
                    Hoàn toàn KHÔNG. Chúng tôi chỉ cài đặt ứng dụng Android chuẩn APK và tinh chỉnh phần mềm người dùng, tuyệt đối không can thiệp phần cứng hay can thiệp bootloader sâu (unlock bootloader). Tivi của bạn vẫn giữ nguyên 100% chế độ bảo hành của hãng.
                </div>
            </div>

            <div class="faq-accordion-item" style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:12px; margin-bottom:12px; overflow:hidden;">
                <div class="faq-header" style="padding:20px 24px; cursor:pointer; display:flex; justify-content:space-between; align-items:center; font-weight:700;">
                    <span>Tôi ở tỉnh xa thì kỹ thuật viên hỗ trợ bằng cách nào?</span>
                    <i class="fas fa-chevron-down" style="color:var(--primary);"></i>
                </div>
                <div class="faq-body" style="padding:0 24px 20px; color:var(--text-muted); font-size:0.95rem; line-height:1.7;">
                    Dù bạn ở bất cứ đâu tại Việt Nam hoặc nước ngoài, chỉ cần tivi có kết nối mạng Internet (Wifi/LAN). Chúng tôi sẽ hướng dẫn bạn mở ứng dụng kết nối từ xa (như TeamViewer QuickSupport hoặc AnyDesk cho Android TV), sau đó kỹ thuật viên sẽ điều khiển trực tiếp trên màn hình tivi trước sự theo dõi của bạn.
                </div>
            </div>

            <div class="faq-accordion-item" style="background:var(--bg-card); border:1px solid var(--border-subtle); border-radius:12px; margin-bottom:12px; overflow:hidden;">
                <div class="faq-header" style="padding:20px 24px; cursor:pointer; display:flex; justify-content:space-between; align-items:center; font-weight:700;">
                    <span>Thanh toán dịch vụ như thế nào? Có an tâm không?</span>
                    <i class="fas fa-chevron-down" style="color:var(--primary);"></i>
                </div>
                <div class="faq-body" style="padding:0 24px 20px; color:var(--text-muted); font-size:0.95rem; line-height:1.7;">
                    Tiêu chí hoạt động của chúng tôi là: <strong>Cài đặt hoàn tất - Khách hàng kiểm tra tivi hoạt động trơn tru ưng ý mới tiến hành chuyển khoản</strong> qua tài khoản ngân hàng hoặc ví điện tử (MoMo, ZaloPay).
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
