<?php
// Footer chung
?>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="index.php" class="brand-logo" style="margin-bottom: 14px;">
                        <div class="brand-icon"><i class="fas fa-tv"></i></div>
                        <div class="brand-text">MiTV<span>Pro</span></div>
                    </a>
                    <p>Giải pháp toàn diện tối ưu hệ thống, cài đặt kho ứng dụng giải trí đỉnh cao và hỗ trợ kỹ thuật từ xa chuyên biệt cho toàn bộ các thế hệ Tivi Xiaomi tại Việt Nam.</p>
                    <div style="display:flex; gap:10px; margin-top:14px;">
                        <span style="font-size:0.8rem; background:rgba(0,200,83,0.12); color:#00C853; border:1px solid rgba(0,200,83,0.25); padding:4px 10px; border-radius:50px;">
                            <i class="fas fa-lock"></i> SSL Encrypted 256-bit
                        </span>
                        <span style="font-size:0.8rem; background:rgba(255,103,0,0.12); color:#FF6700; border:1px solid var(--border-primary); padding:4px 10px; border-radius:50px;">
                            <i class="fas fa-shield"></i> Anti-Virus Checked
                        </span>
                    </div>
                </div>

                <div>
                    <h4 class="footer-title">Tính Năng Miễn Phí</h4>
                    <ul class="footer-links">
                        <li><a href="downloader.php"><i class="fas fa-chevron-right" style="font-size:0.75rem;"></i> Mã Tải Downloader</a></li>
                        <li><a href="optimizer.php"><i class="fas fa-chevron-right" style="font-size:0.75rem;"></i> Phần Mềm MiTV Optimizer</a></li>
                        <li><a href="tool-check.php"><i class="fas fa-chevron-right" style="font-size:0.75rem;"></i> Kiểm Tra Đời Máy Xiaomi</a></li>
                        <li><a href="guide-adblock.php"><i class="fas fa-chevron-right" style="font-size:0.75rem;"></i> Hướng Dẫn Tắt Quảng Cáo</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Hỗ Trợ Khách Hàng</h4>
                    <ul class="footer-links">
                        <li><a href="https://zalo.me/" target="_blank"><i class="fab fa-facebook-messenger" style="font-size:0.75rem;"></i> Kênh Hỗ Trợ Zalo</a></li>
                        <li><a href="https://tiktok.com/@vietxiaomi" target="_blank"><i class="fab fa-tiktok" style="font-size:0.75rem;"></i> Kênh Video TikTok</a></li>
                        <li><a href="index.php#pricing"><i class="fas fa-tags" style="font-size:0.75rem;"></i> Bảng Giá Dịch Vụ Từ Xa</a></li>
                        <li><a href="index.php#faq"><i class="fas fa-question-circle" style="font-size:0.75rem;"></i> Câu Hỏi Thường Gặp</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Chính Sách & Pháp Lý</h4>
                    <ul class="footer-links">
                        <li><a href="terms.php"><i class="fas fa-file-contract" style="font-size:0.75rem;"></i> Điều Khoản Người Dùng</a></li>
                        <li><a href="privacy.php"><i class="fas fa-user-shield" style="font-size:0.75rem;"></i> Chính Sách Bảo Mật</a></li>
                        <li><a href="disclaimer.php"><i class="fas fa-scale-balanced" style="font-size:0.75rem;"></i> Tuyên Bố Miễn Trừ</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div>
                    &copy; <?php echo date('Y'); ?> MiTV Pro. Bản quyền thuộc về đội ngũ kỹ thuật MiTV Pro Việt Nam.
                </div>
                <div style="font-size:0.8rem; color:#7A7A99;">
                    Không liên kết trực thuộc tập đoàn Xiaomi Inc. Tên gọi Xiaomi được sử dụng theo mục đích nhận diện tương thích thiết bị.
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Actions -->
    <div class="floating-contact">
        <a href="https://zalo.me/" target="_blank" class="btn-float btn-float-zalo" title="Chat Zalo hỗ trợ ngay">
            <i class="fas fa-comment-dots"></i>
        </a>
        <button class="btn-float btn-float-top" id="btnScrollTop" title="Lên đầu trang">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    <!-- Main JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
