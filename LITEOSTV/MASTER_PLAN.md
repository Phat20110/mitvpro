# LITEOSTV — MASTER PLAN VÀ HỆ Ý TƯỞNG ĐỘT PHÁ

## I. BẢN ĐỒ Ý TƯỞNG ĐẶC BIỆT (CORE INNOVATIONS)

### 1. Ý tưởng "HyperOS Color & Liquid Glass Fusion" (Giao diện Kính Siêu Biến Hình)
- **Cơ chế**: Kết hợp giữa hiệu ứng khúc xạ ánh sáng Liquid Glass (Phụ lục A) và thuật toán Color Palette trích xuất của Xiaomi HyperOS.
- **Tính năng độc quyền**:
  - *Dynamic Atmospheric Backlight*: Khi người dùng chọn một ứng dụng (ví dụ YouTube đỏ, Spotify xanh lá, Netflix đỏ rượu), dải ánh sáng ambient phía sau tấm kính launcher sẽ nhẹ nhàng biến đổi theo gam màu thương hiệu.
  - *Glass Translucency Slider*: Cho phép người dùng tùy chỉnh độ mờ (blur từ 8px đến 24px) và độ trong suốt của kính (từ 5% đến 25%) phù hợp với độ sáng TV phòng khách.
  - *No-Ghosting Focus Ring*: Viền sáng 1px bo cong đồng tâm phản xạ ánh sáng tự nhiên khi D-Pad di chuyển, có hiệu ứng đàn hồi Spring Physics mượt mà 60 FPS.

### 2. Ý tưởng "Sileo / Cydia for Android TV" (Kho Mod & Tweak Mở Độc Bản)
- **Cơ chế**: Mô phỏng hoàn hảo hệ sinh thái jailbreak của iPhone trên nền tảng TV.
- **Tính năng độc quyền**:
  - *Community Repositories*: Thay vì một cửa hàng đóng kín, LITEOSTV hỗ trợ thêm nhiều nguồn (Sources/Repos). Các modder và hội nhóm lập trình có thể tự host repo GitHub, người dùng chỉ cần nhập link hoặc quét mã QR qua điện thoại.
  - *Định dạng đóng gói `.ltpack`*: Chứa toàn bộ cấu hình JSON, tài nguyên SVG/PNG, âm thanh focus sound `.wav`, và mã kịch bản styling.
  - *Live Preview & Hot Reload*: Xem trước giao diện thực tế trước khi bấm "Cài Đặt". Khi cài xong, màn hình TV lập tức biến đổi trong 100ms mà không hề chớp đen hay restart.
  - *Subsystem Tweaks*: Tweak sâu các thành phần: Đổi bố cục Dock (Ngang, Dọc, Ẩn tự động), Lưới App (3x2, 4x2, 5x3), Hình dạng Icon (Squircle, Tròn, Giọt nước, Kính nổi 3D), Font chữ (Inter, MiSans, SF Pro, JetBrains Mono).

### 3. Ý tưởng "LineageOS Lean Engine" (Xào Nấu Mã Nguồn Mở Tối Thượng)
- **Cơ chế**: Tách bỏ sạch sẽ các tiến trình chạy ngầm vô bổ của Google TV / Android TV gốc.
- **Tính năng độc quyền**:
  - *RAM Saver 2.0 (ZRAM LZO-RLE)*: Nén bộ nhớ đệm thông minh, giải phóng 350MB - 500MB RAM nhàn rỗi cho TV Xiaomi / Sony / TCL cấu hình thấp.
  - *Zero Ad Guarantee*: 100% không quảng cáo, không banner gợi ý rác, mở máy hiển thị ngay lập tức các ứng dụng yêu thích.
  - *Instant Boot & Sleep Wake*: Giảm thời gian mở máy từ trạng thái Sleep xuống dưới 0.3 giây.

---

## II. DANH SÁCH NHỮNG VIỆC CẦN LÀM (ACTION ITEMS BẮT BUỘC)

### Giai đoạn 1: Thiết kế Kiến trúc & Đặc tả Chuẩn (Architecture & Specs)
- [x] Soạn thảo đặc tả định dạng gói `.ltpack` (Manifest schema, Assets rules, CSS Token injections).
- [x] Thiết kế chuẩn giao thức máy chủ Repo (REST API / Static JSON Index).
- [x] Lập ma trận phân rã chi tiết 93 Agent song song.

### Giai đoạn 2: Phát triển Bộ Lõi Runtime (Core Engine Development)
- [ ] Xây dựng `ThemeEngine.js`: Quản lý danh sách theme đã nạp, trích xuất bảng màu, ghi đè CSS variables trực tiếp vào `:root`.
- [ ] Xây dựng `RemoteNavigator.js`: Bộ máy xử lý bàn phím và remote vật lý (D-Pad: ArrowUp, ArrowDown, ArrowLeft, ArrowRight, Enter, Back), tích hợp Web Audio API phát tiếng "Tick" siêu thực tế.
- [ ] Xây dựng `PackageValidator.js`: Kiểm tra tính toàn vẹn của file cấu hình theme, ngăn chặn tấn công XSS hoặc crash hệ thống.

### Giai đoạn 3: Xây dựng Giao diện TV Shell & Sileo Store (Interactive UI)
- [ ] Thiết kế Bezel và Header kính theo đúng chuẩn Liquid Glass (token `--glass-bg`, `--glass-border`, `--accent: #FF7A1A`).
- [ ] Xây dựng App Grid mượt mà hỗ trợ cuộn trang (virtual scroll / smooth paging) 60 FPS.
- [ ] Xây dựng màn hình **Mod & Theme Store (Sileo TV)** hiển thị danh mục: Nổi bật, Mới cập nhật, Theme Kính, Theme Tối, Gói Icon, Gói Âm thanh.
- [ ] Xây dựng bảng điều khiển Tùy biến sâu (Deep Customization Panel) cho phép chỉnh tay từng token màu sắc, bo góc, độ mờ.

### Giai đoạn 4: Đóng gói Theme Mẫu & Kho Demo Cộng Đồng
- [ ] Tạo theme mẫu 1: `Liquid Glass Orange` (Theme chuẩn MiTV HyperOS gốc).
- [ ] Tạo theme mẫu 2: `Hyper OLED Cyan` (Phong cách Cyberpunk neon trên nền kính tối).
- [ ] Tạo mock repo JSON máy chủ với 5 gói mod demo sẵn sàng cài đặt.

### Giai đoạn 5: Tích hợp Kênh Phân Phối, Kiểm thử & Đẩy Lên Git
- [ ] Kiểm tra toàn bộ mã nguồn không có lỗi cú pháp JS, đảm bảo an toàn tuyệt đối.
- [ ] Chuẩn hóa mã cài đặt Downloader `6372800` và shortlink `is.gd/mitv25`.
- [ ] Tự động commit và đẩy toàn bộ mã nguồn lên nhánh `main` của repository GitHub.
