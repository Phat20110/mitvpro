# LITEOSTV — HỆ ĐIỀU HÀNH & LAUNCHER TV TÙY BIẾN SÂU (HYPEROS EDITION)

[![Style: Liquid Glass](https://img.shields.io/badge/Style-Liquid_Glass-orange.svg)](docs/design-tokens.md)
[![Agents: 93 Parallel](https://img.shields.io/badge/Agents-93_Active-brightgreen.svg)](ROADMAP_93_AGENTS.md)
[![Downloader Code](https://img.shields.io/badge/AFTVnews-6372800-blue.svg)](https://is.gd/mitv25)
[![Shortlink](https://img.shields.io/badge/Install-is.gd%2Fmitv25-orange.svg)](https://is.gd/mitv25)

---

## 🌟 TỔNG QUAN HỆ ĐIỀU HÀNH
**LITEOSTV** là sự kết hợp đột phá giữa:
1. **Nền tảng mã nguồn mở tối giản**: Dựa trên AOSP & LineageOS for TV, gỡ bỏ 100% bloatware, tối ưu ZRAM và bộ nhớ đệm cho chip TV RAM 1GB - 2GB.
2. **Ngôn ngữ thiết kế Liquid Glass + Xiaomi HyperOS**: Giao diện kính mờ tán xạ (backdrop-filter blur <= 24px), viền highlight 1px, phối màu động tự thích ứng HyperOS Monet Color.
3. **Kiến trúc Tweak Engine & Community Mod Store kiểu Cydia/Sileo**: Tùy biến sâu từng thành phần (Dock, App Grid, Icon Pack, Focus Animation, Sound FX) và cho phép cộng đồng modder đóng gói dạng `.ltpack` chia sẻ qua kho repo phi tập trung.

---

## 📂 CẤU TRÚC DỰ ÁN
```
LITEOSTV/
├── MASTER_PLAN.md              # Bản kế hoạch tổng thể & chi tiết kỹ thuật
├── ROADMAP_93_AGENTS.md        # Bảng phân bổ 93 Agent song song & đầu việc
├── THEME_ENGINE_SPEC.md        # Đặc tả chuẩn file gói Theme/Mod (.ltpack)
├── COMMUNITY_REPO_SPEC.md      # Chuẩn API & giao thức máy chủ Repo (Sileo TV)
├── index.html                  # Giao diện TV Interactive Showcase & Sandbox
└── src/
    ├── core/
    │   ├── ThemeEngine.js      # Bộ nạp runtime, hot-reload & inject biến CSS
    │   ├── RemoteNavigator.js  # Bộ điều hướng D-Pad TV 10-foot, sound effect
    │   └── PackageValidator.js # Bộ giải mã & thẩm định an toàn gói theme
    ├── themes/
    │   ├── liquid-glass-orange.json  # Theme mặc định Liquid Glass Xiaomi
    │   └── hyper-cyan-oled.json      # Theme OLED Cyberpunk Cyan
    └── repo/
        └── mock-repo.json            # Mock database máy chủ Repo cộng đồng
```

---

## 🚀 CÁC TÍNH NĂNG ĐỘC BẢN CHỈ CÓ TRÊN LITEOSTV

1. **Hyper Color Dynamic Engine (Monet for TV)**:
   - Tự động trích xuất màu chủ đạo từ hình nền hoặc poster phim đang chiếu để đổi màu toàn bộ hệ thống kính trong 0.05 giây.
2. **Sileo TV Tweak & Theme Store**:
   - Kho modder cộng đồng mở hoàn toàn: Thêm bất kỳ link Repo GitHub Pages nào để tải theme, widget và icon packs.
   - Cài đặt 1-chạm không cần khởi động lại máy hay launcher.
3. **100% Thuần Remote TV (Zero Virtual Widgets)**:
   - Tối ưu hoàn toàn cho D-Pad vật lý: Lên, Xuống, Trái, Phải, Enter, Back.
   - Hiệu ứng âm thanh Spatial Focus Tick sống động.
4. **Kênh Cài Đặt Siêu Tốc**:
   - Tải nhanh qua Downloader mã: `6372800`
   - Shortlink: `is.gd/mitv25`
