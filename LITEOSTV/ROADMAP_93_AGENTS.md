# BẢNG MA TRẬN ĐIỀU PHỐI 93 AGENT SONG SONG (LITEOSTV)

Dự án LITEOSTV tuân thủ nghiêm ngặt quy chế **Multi-Task & Phân chia 93 Agent song song** (Phụ lục D - GEMINI.md). Toàn bộ 93 Agent được phân bổ đồng loạt vào 10 cụm tác chiến:

```
[Agent 01-10: ROM & Kernel] ──┐
[Agent 11-20: LiteCore HAL]  ──┼──> [Agent 81-88: Distribution & Downloader 6372800]
[Agent 21-30: Liquid Glass]  ──┤
[Agent 31-40: HyperOS Color] ──┼──> [Agent 89-93: Verification & Git Main Push]
[Agent 41-50: D-Pad Remote]  ──┤
[Agent 51-60: Tweak Engine]  ──┤
[Agent 61-70: Community Repo]──┤
[Agent 71-80: Theme Packs]   ──┘
```

---

### PHÂN ĐOÀN 1: ROM, KERNEL & PERFORMANCE OPTIMIZATION (Agent 01 - 10)
- **Agent 01**: Phân tích cây mã nguồn LineageOS for TV 20 / Android 13 TV, lập danh sách debloat.
- **Agent 02**: Cấu hình `init.rc` và `lowmemorykiller` tăng ngưỡng dọn dẹp RAM nền.
- **Agent 03**: Kích hoạt nhân `zRAM LZO-RLE` nén RAM tỉ lệ 3:1 cho TV RAM 1GB-1.5GB.
- **Agent 04**: Tối ưu cờ biên dịch GPU Mali & OpenGL ES 3.2 để loại bỏ hiện tượng rớt khung hình (Jank/Stutter).
- **Agent 05**: Tách bỏ dịch vụ quảng cáo Google TV Ad Services & Telemetry nền.
- **Agent 06**: Tích hợp tùy chọn microG Core siêu nhẹ (thay thế bộ Google Play Services nặng 600MB).
- **Agent 07**: Tối ưu hóa chu kỳ Wake Lock để máy thức dậy từ Sleep chỉ trong 0.25 giây.
- **Agent 08**: Xây dựng script build ROM tự động cho chip SoC Amlogic S905X3, S905W2, Allwinner H616.
- **Agent 09**: Thiết lập phân vùng `/vendor` và `/system_ext` độc lập cho LiteOS Subsystem.
- **Agent 10**: Viết tài liệu hướng dẫn flash qua USB Burning Tool và Fastboot TV.

### PHÂN ĐOÀN 2: LITECORE & SYSTEM DAEMON (Agent 11 - 20)
- **Agent 11**: Thiết kế `LiteThemeManagerService` chạy quyền hệ thống (System Privilege).
- **Agent 12**: Xây dựng cơ chế Dynamic RRO (Runtime Resource Overlay) nạp theme trực tiếp vào SystemUI.
- **Agent 13**: Lập trình API can thiệp Boot Animation và Wallpaper động không giật lag.
- **Agent 14**: Xây dựng bộ nhớ đệm SQLite tốc độ cao lưu trữ các tùy chọn tweak của người dùng.
- **Agent 15**: Thiết lập cơ chế Sandbox bảo vệ hệ thống: Tweak lỗi tự động fallback về theme mặc định sau 5 giây.
- **Agent 16**: Tạo IPC (Inter-Process Communication) Binder service kết nối giữa Launcher và ROM Core.
- **Agent 17**: Viết trình giám sát FPS và RAM tiêu thụ thời gian thực (Performance HUD toggled by remote).
- **Agent 18**: Quản lý phân quyền file `.ltpack` trong thư mục an toàn `/data/system/liteostv/themes/`.
- **Agent 19**: Cấu hình SELinux policy cho phép LiteCore inject CSS/styles mà không vi phạm bảo mật.
- **Agent 20**: Tự động dọn dẹp cache rác và thumbnail video định kỳ.

### PHÂN ĐOÀN 3: LIQUID GLASS RENDER ENGINE (Agent 21 - 30)
- **Agent 21**: Triển khai toàn bộ bộ CSS Token theo đúng `docs/design-tokens.md`.
- **Agent 22**: Tạo lớp nền kính trong suốt `--glass-bg: rgba(255,255,255,0.08)` và `--glass-bg-strong: 0.14`.
- **Agent 23**: Lập trình bộ đổ bóng đa lớp `--glass-shadow: 0 8px 32px rgba(0,0,0,0.35)`.
- **Agent 24**: Viền kính phản xạ 1px `--glass-border: rgba(255,255,255,0.20)` sáng trên-trái, mờ dưới-phải.
- **Agent 25**: Hiệu ứng highlight bên trong: `inset 0 1px 0 rgba(255,255,255,0.35)`.
- **Agent 26**: Bọc điều kiện `@supports (backdrop-filter: blur(24px))` với cơ chế fallback nền tối đặc cho chip TV cổ.
- **Agent 27**: Tạo lớp nền gradient mesh 3 lớp với 2-3 quầng sáng (orbs) cam và cyan di chuyển êm dịu.
- **Agent 28**: Bo góc lớn đồng tâm: `--radius-xl: 28px`, `--radius-lg: 20px`, `--radius-md: 14px`, `--radius-pill: 999px`.
- **Agent 29**: Lớp sheen phản chiếu ánh sáng chéo (`::before`) nghiêng 25 độ khi thẻ được focus.
- **Agent 30**: Kiểm soát hiệu năng GPU shader, đảm bảo tải GPU luôn dưới 35% trên TV 4K.

### PHÂN ĐOÀN 4: HYPEROS COLOR & MONET ENGINE (Agent 31 - 40)
- **Agent 31**: Viết thuật toán trích xuất bảng màu (Color Quantization) từ hình nền TV hoặc poster phim.
- **Agent 32**: Tạo 6 gam màu biến thiên Monet: Dominant, Vibrant, Muted, Accent, Surface, OnSurface.
- **Agent 33**: Đồng bộ biến CSS `--accent` thời gian thực từ `#FF7A1A` sang các tông màu được chọn.
- **Agent 34**: Xây dựng thuật toán tính độ tương phản WCAG 2.1 AAA (đảm bảo chữ luôn sắc nét trên nền kính).
- **Agent 35**: Tạo bảng chọn màu tự do phong cách Xiaomi HyperOS Color Palette (16 preset + hex picker).
- **Agent 36**: Tính năng Ambient Glow: Đèn hắt kính phía sau tự thay đổi màu theo từng icon ứng dụng.
- **Agent 37**: Tạo bộ chuyển màu mượt mà (Color Morphing Transition) trong 300ms với đường cong `ease-out`.
- **Agent 38**: Chế độ Pure OLED Black: Tự động tắt phát sáng nền kính cho các TV OLED giúp tiết kiệm điện.
- **Agent 39**: Tùy chỉnh độ bão hòa màu `--glass-saturate: 180%` thích ứng với độ tương phản màn hình TV.
- **Agent 40**: Cơ chế lưu preset màu yêu thích của người dùng vào LocalStorage/ROM.

### PHÂN ĐOÀN 5: REMOTE & FOCUS NAVIGATION 10-FOOT LEANBACK (Agent 41 - 50)
- **Agent 41**: Xây dựng bộ điều hướng không gian 2D (Spatial Navigation Engine) bắt trọn 4 hướng `ArrowUp`, `ArrowDown`, `ArrowLeft`, `ArrowRight`.
- **Agent 42**: Bắt sự kiện phím `Enter` (Select / Open) và phím `Escape / BrowserBack` (Go Back / Exit).
- **Agent 43**: Đảm bảo 100% không bật bất kỳ widget chuột ảo, con trỏ ảo nào trên màn hình TV (quy tắc bắt buộc).
- **Agent 44**: Tích hợp âm thanh phản hồi UI: Web Audio Synthesizer tạo tiếng "Tick" ấm khi chuyển đổi ô.
- **Agent 45**: Tích hợp âm thanh "Pop" khi bấm phím chọn và "Thud" khi chạm mép viền màn hình (Edge Hit).
- **Agent 46**: Cơ chế Focus Trapping thông minh: Khi mở Modal/Drawer cài đặt, khóa focus trong phạm vi cửa sổ kính.
- **Agent 47**: Ghi nhớ phần tử được focus gần nhất khi chuyển qua lại giữa thanh Dock và Lưới App.
- **Agent 48**: Tối ưu hóa kích thước vùng bấm tối thiểu đạt chuẩn TV 10-foot: tối thiểu 56x56px, chữ tối thiểu 18px.
- **Agent 49**: Hiệu ứng thẻ khi focus: Scale 1.05 kết hợp viền gradient cam-trắng và bóng phát sáng nhẹ bên dưới.
- **Agent 50**: Xử lý mượt mà khi người dùng giữ lì phím D-Pad (Key Repeat Throttle ở 120ms).

### PHÂN ĐOÀN 6: TWEAK ENGINE & PACKAGE RUNTIME (Agent 51 - 60)
- **Agent 51**: Thiết kế định dạng file gói nén `.ltpack` (LiteOS TV Package) chuẩn ZIP.
- **Agent 52**: Lập trình bộ giải mã `PackageValidator.js`: kiểm tra JSON schema, phiên bản tương thích và chữ ký số.
- **Agent 53**: Cơ chế Hot-Reload Theme: Cập nhật CSS Rule và Asset tức thì trong 50ms mà không làm đứt kết nối stream.
- **Agent 54**: Quản lý thứ tự ưu tiên Tweak: `User Override > Custom Mod Theme > System Default Liquid Glass`.
- **Agent 55**: Tùy chỉnh bố cục thanh Dock: Dock kính ngang dưới đáy, Dock dọc bên trái, hoặc Dock tự ẩn thông minh.
- **Agent 56**: Tùy biến hình dạng Icon Pack: Squircle Xiaomi 16px, Tròn cổ điển, Bo góc vuông, Viền kính nổi 3D.
- **Agent 57**: Tùy chỉnh Font chữ hiển thị: Hỗ trợ nạp webfont / OTF / TTF cục bộ không cần kết nối mạng.
- **Agent 58**: Cơ chế Snapshot & Reset khẩn cấp: Bấm giữ phím Back 3 giây để khôi phục theme mặc định nếu gặp lỗi.
- **Agent 59**: Bộ quản lý bộ nhớ đệm Asset (Image/SVG/Audio Cache) để không gây tràn RAM TV.
- **Agent 60**: Hỗ trợ export/import cấu hình Tweak thành file JSON qua cổng USB hoặc quét QR code.

### PHÂN ĐOÀN 7: COMMUNITY MOD & THEME STORE API (Agent 61 - 70)
- **Agent 61**: Thiết kế kiến trúc máy chủ Repo phi tập trung (Decentralized Sileo / APT style for TV).
- **Agent 62**: Xây dựng chuẩn định dạng chỉ mục kho `repo.json` (tên kho, tác giả, icon, danh sách package, hash SHA256).
- **Agent 63**: Viết module quản lý Sources: Cho phép người dùng thêm, xóa, làm mới danh sách máy chủ repo.
- **Agent 64**: Thiết kế giao diện kho Store trên TV: Banner kính trượt, bảng xếp hạng Top Mod, danh mục chủ đề.
- **Agent 65**: Tính năng tìm kiếm nhanh bằng remote (bàn phím số T9 hoặc nhận diện giọng nói TV).
- **Agent 66**: Cơ chế đánh giá và bình luận cộng đồng (Star Rating & Community Badges).
- **Agent 67**: Xây dựng hệ thống CDN Mirror phân tán tải nhanh tại Việt Nam và Đông Nam Á.
- **Agent 68**: Tự động kiểm tra bản cập nhật mới của các Theme đã cài đặt và hiện huy hiệu thông báo nhẹ.
- **Agent 69**: Cung cấp SDK và CLI tool cho modder: `liteos-pack build` để đóng gói theme chỉ bằng 1 dòng lệnh.
- **Agent 70**: Lập trang web tài liệu mở Portal hướng dẫn cộng đồng tự chế tạo mod và đưa lên Store.

### PHÂN ĐOÀN 8: BỘ THEME MẪU TIÊU CHUẨN (Agent 71 - 80)
- **Agent 71**: Thiết kế Theme gốc 1: `Liquid Glass Orange` (Cam Xiaomi ấm áp, kính mờ tán xạ cao cấp).
- **Agent 72**: Thiết kế Theme 2: `Hyper OLED Cyan` (Xanh ngọc Cyberpunk trên nền đen tuyệt đối).
- **Agent 73**: Thiết kế Theme 3: `Lineage Pure Minimal` (Giao diện phẳng bán kính siêu nhẹ cho TV cấu hình yếu).
- **Agent 74**: Thiết kế Theme 4: `Retro Cinema 80s` (Màu hổ phách hoàng hôn ấm áp cho phòng chiếu phim gia đình).
- **Agent 75**: Thiết kế Theme 5: `Aurora Borealis` (Gradient tím than - xanh lục cực quang chuyển động nhẹ).
- **Agent 76**: Thiết kế Theme 6: `Frosted Glass Snow` (Kính mờ trắng băng tuyết phong cách Bắc Âu tối giản).
- **Agent 77**: Thiết kế Bộ Icon Pack 1: `HyperSquircle SVG 3D` (100 icon ứng dụng phổ biến nhất tại Việt Nam).
- **Agent 78**: Thiết kế Bộ Icon Pack 2: `GlassOutline Minimal` (Đường nét kính mờ 1.75px thanh mảnh, tinh tế).
- **Agent 79**: Soạn gói âm thanh UI Soundpack 1: `Xiaomi Haptic Sounds` (Tiếng gõ gỗ và giọt nước tinh tế).
- **Agent 80**: Soạn gói âm thanh UI Soundpack 2: `Sci-Fi Holo Sounds` (Tiếng laser vi phân và beep điện tử).

### PHÂN ĐOÀN 9: KÊNH PHÂN PHỐI & TÍCH HỢP DOWNLOADER (Agent 81 - 88)
- **Agent 81**: Chuẩn hóa mã cài đặt Downloader trên AFTVnews thành con số duy nhất: `6372800`.
- **Agent 82**: Cấu hình và duy trì shortlink chính thức `is.gd/mitv25` trỏ trực tiếp vào gói cài đặt chuẩn.
- **Agent 83**: Tích hợp quy trình cài đặt 1-chạm: Tải và cài đặt tự động không cần xác nhận phức tạp.
- **Agent 84**: Xây dựng cơ chế tải OTA (Over-The-Air Update) cho bản ROM và launcher.
- **Agent 85**: Đóng gói tệp tin cài đặt APK có chữ ký số hoàn chỉnh (V1, V2, V3 signature scheme).
- **Agent 86**: Tối ưu dung lượng gói APK tổng hợp dưới 25MB để TV tải về trong vòng chưa đầy 10 giây.
- **Agent 87**: Xây dựng landing page giới thiệu và hướng dẫn cài đặt trực quan chuẩn TV 10-foot.
- **Agent 88**: Thiết lập cơ chế tự kiểm tra tính toàn vẹn file sau khi tải (Checksum MD5/SHA256).

### PHÂN ĐOÀN 10: KIỂM THỬ TOÀN DIỆN, LINTING & ĐỒNG BỘ GIT (Agent 89 - 93)
- **Agent 89**: Quét kiểm tra toàn bộ lỗi cú pháp JavaScript, PHP, JSON, không để lại bất kỳ cảnh báo đỏ nào.
- **Agent 90**: Chạy thử nghiệm kiểm tra tương thích trên độ phân giải TV 720p, 1080p, 4K UHD.
- **Agent 91**: Đo đạc độ trễ điều khiển D-Pad (Latency dưới 16ms tương đương 60 FPS chuẩn eSports).
- **Agent 92**: Rà soát tuân thủ 100% các quy định trong `GEMINI.md` và `rules.md`.
- **Agent 93**: Tự động đóng gói commit sạch sẽ và đồng bộ mã nguồn lên nhánh `main` của GitHub.
