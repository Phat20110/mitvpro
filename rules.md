# QUY TẮC PHÁT TRIỂN & ĐIỀU PHỐI DỰ ÁN MITV PRO (RULES.MD)

## 1. CHẾ ĐỘ MULTI-TASK & PHÂN CHIA VIỆC SONG SONG (TỰ HÀNH 100%)
- **Phân chia 93 Agent**: Khi được giao việc, tuyệt đối không bao giờ ôm tất cả một mình mà phải chủ động chia đều ra 93 agent / luồng độc lập để xử lý song song thần tốc.
- **Tốc độ & Dứt điểm (End-to-End)**: Hoàn thành trọn gói mọi việc từ viết code, kiểm thử, build APK đến commit và đẩy lên GitHub. Tuyệt đối không để dở dang hay làm chậm trễ tiến độ.
- **Quy định giao tiếp**: Tuyệt đối không bao giờ hỏi người dùng có muốn kết thúc cuộc gọi/phiên làm việc hay không. Luôn giữ trạng thái trực chiến và hoàn thành mọi nhiệm vụ.

## 2. GIAO DIỆN ANDROID TV (LIQUID GLASS)
- **Không hiển thị widget remote ảo trên màn hình ứng dụng**: Người dùng TV tương tác trực tiếp bằng Remote vật lý (D-Pad). Không bật widget điều khiển ảo trên màn hình gây mất thẩm mỹ.
- **Bảo tồn điều hướng phím**: Giữ nguyên toàn bộ logic xử lý sự kiện bàn phím/remote (`ArrowUp`, `ArrowDown`, `ArrowLeft`, `ArrowRight`, `Enter`, `Back`).
- **Chuẩn Liquid Glass**: Bo góc cong mềm, kính mờ bán trong suốt, highlight viền 1px, phản xạ ánh sáng tự nhiên, hiệu năng TV mượt mà 60 FPS (blur <= 24px).

## 3. CHÍNH XÁC MÃ NGUỒN & ĐỒNG BỘ GITHUB
- **Mã Downloader chuẩn**: Sử dụng mã số chính thức AFTVnews `6372800` (hoặc shortlink `is.gd/mitv25`), không dùng các mã cũ lỗi thời.
- **Link tải APK chính xác**: Từng ứng dụng trỏ đúng vào file APK tương ứng hoặc gói cài đặt tổng hợp `MiTV-Pro.apk` đã ký số đầy đủ.
- **Đẩy code lên GitHub ngay khi hoàn thành**: Đồng bộ repository và submodule sạch sẽ lên GitHub branch `main`.
