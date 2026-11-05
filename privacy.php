<?php
$pageTitle = 'Chính Sách Bảo Mật Quyền Riêng Tư - MiTV Pro';
$pageDesc = 'Chính sách bảo mật thông tin người dùng, cam kết không thu thập dữ liệu cá nhân nhạy cảm trên Tivi Xiaomi của khách hàng.';
require_once __DIR__ . '/header.php';
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box">
            <h1>Chính Sách Bảo Mật (Privacy Policy)</h1>
            <div class="legal-meta">
                <span><i class="fas fa-calendar-alt"></i> Ban hành: Năm <?php echo date('Y'); ?></span> &bull; 
                <span><i class="fas fa-lock"></i> Chuẩn mã hóa: SSL / TLS 1.3</span>
            </div>

            <p>Tại <strong>MiTV Pro</strong>, chúng tôi coi trọng sự riêng tư và an toàn dữ liệu của quý khách hàng hơn bất kỳ điều gì khác. Văn bản này minh bạch toàn bộ các tiêu chuẩn thu thập và bảo vệ thông tin khi quý khách ghé thăm website hoặc sử dụng dịch vụ của chúng tôi.</p>

            <h2>1. Dữ Liệu Chúng Tôi Thu Thập</h2>
            <p>Chúng tôi chỉ thu thập các thông tin tối thiểu cần thiết để phục vụ công việc hỗ trợ:</p>
            <ul>
                <li><strong>Thông tin thiết bị:</strong> Tên model tivi (ví dụ: Xiaomi EA55), phiên bản hệ điều hành Android TV để tư vấn gói ứng dụng tương thích.</li>
                <li><strong>Thông tin liên lạc:</strong> Số điện thoại hoặc tài khoản Zalo do quý khách chủ động cung cấp khi gửi yêu cầu hỗ trợ.</li>
                <li><strong>Chúng tôi TUYỆT ĐỐI KHÔNG:</strong> Thu thập mật khẩu tài khoản Google, thông tin thẻ ngân hàng hay bất kỳ hình ảnh/video cá nhân nào lưu trên tivi của khách hàng.</li>
            </ul>

            <h2>2. An Toàn Trong Quá Trình Hỗ Trợ Từ Xa</h2>
            <ul>
                <li>Mọi phiên kết nối điều khiển từ xa (qua phần mềm TeamViewer/AnyDesk) đều được mã hóa đầu cuối 256-bit RSA.</li>
                <li>Kỹ thuật viên chỉ có thể kết nối khi có sự cấp quyền và mật khẩu phiên ngẫu nhiên (One-Time Password) hiển thị trên màn hình tivi do chính khách hàng đọc cho chúng tôi.</li>
                <li>Mỗi lần kết thúc phiên làm việc, mã kết nối tự động hủy bỏ. Kỹ thuật viên không thể tự ý truy cập lại nếu không có sự đồng ý của khách hàng.</li>
            </ul>

            <h2>3. Sử Dụng Cookie & Tệp Nhật Ký</h2>
            <p>Website sử dụng session cookie bảo mật cao (HttpOnly, SameSite=Lax) nhằm mục đích chống tấn công CSRF và đảm bảo sự ổn định khi tải file. Chúng tôi không cài cắm bất kỳ phần mềm gián điệp, tracker quảng cáo hay pixel theo dõi xâm phạm quyền riêng tư.</p>

            <h2>4. Liên Hệ Bộ Phận Bảo Mật</h2>
            <p>Nếu quý khách có bất kỳ câu hỏi nào về chính sách này, xin vui lòng liên hệ qua hotline hoặc kênh Zalo chính thức được niêm yết tại chân trang.</p>

            <div style="margin-top:36px; text-align:center;">
                <a href="index.php" class="btn-primary"><i class="fas fa-check"></i> Xác Nhận & Quay Lại Trang Chủ</a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
