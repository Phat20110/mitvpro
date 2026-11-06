# ĐẶC TẢ KỸ THUẬT GÓI MOD & THEME (.ltpack)
> **Phiên bản chuẩn**: `1.0.0`  
> **Áp dụng cho**: LITEOSTV Launcher & Subsystem

---

## 1. CẤU TRÚC GÓI `.ltpack` (LITEOSTV PACKAGE)
Một gói theme hoặc mod của LITEOSTV là một file nén chuẩn ZIP đổi đuôi thành `.ltpack`, có cấu trúc thư mục như sau:

```
my-theme.ltpack (zip archive)
├── manifest.json              # Thông tin meta, tên, tác giả, phiên bản
├── config.json                # Biến cấu hình CSS và thông số giao diện
├── preview.png                # Ảnh chụp màn hình mẫu (1920x1080)
├── assets/
│   ├── wallpaper.jpg          # Hình nền tĩnh hoặc video mp4
│   └── icons/                 # Bộ icon ứng dụng thay thế (SVG hoặc PNG)
│       ├── com.google.android.youtube.tv.svg
│       └── vn.vtv.vtvgo.svg
└── sounds/                    # Gói âm thanh phản hồi remote (tuỳ chọn)
    ├── focus.wav              # Âm thanh khi chuyển ô D-Pad
    ├── select.wav             # Âm thanh khi bấm Enter
    └── edge.wav               # Âm thanh khi chạm mép màn hình
```

---

## 2. ĐẶC TẢ `manifest.json` (JSON SCHEMA)

```json
{
  "$schema": "https://liteostv.dev/schemas/theme-v1.json",
  "id": "com.modder.hyperglass.orange",
  "name": "HyperGlass Orange Pro",
  "version": "1.2.0",
  "author": {
    "name": "MiTV Modding Team",
    "contact": "mod@liteostv.dev",
    "website": "https://is.gd/mitv25"
  },
  "description": "Theme Liquid Glass phong cách Xiaomi HyperOS với hiệu ứng tán xạ quang học và phản xạ 1px siêu mịn.",
  "category": "liquid-glass",
  "minEngineVersion": "1.0.0",
  "tags": ["xiaomi", "hyperos", "glass", "orange", "oled"],
  "preview": "preview.png",
  "features": {
    "hasSounds": true,
    "hasCustomIcons": true,
    "hasLiveWallpaper": false,
    "supportsOledMode": true
  }
}
```

---

## 3. ĐẶC TẢ `config.json` (INJECT BIẾN CSS & TWEAK)

```json
{
  "tokens": {
    "--glass-bg": "rgba(255, 255, 255, 0.08)",
    "--glass-bg-strong": "rgba(255, 255, 255, 0.14)",
    "--glass-border": "rgba(255, 255, 255, 0.20)",
    "--glass-blur": "24px",
    "--glass-saturate": "180%",
    "--glass-shadow": "0 8px 32px rgba(0, 0, 0, 0.35)",
    "--glass-highlight": "inset 0 1px 0 rgba(255, 255, 255, 0.35), inset 0 -1px 0 rgba(255, 255, 255, 0.05)",
    "--accent": "#FF7A1A",
    "--accent-glow": "rgba(255, 122, 26, 0.45)",
    "--radius-xl": "28px",
    "--radius-lg": "20px",
    "--radius-md": "14px",
    "--radius-pill": "999px",
    "--font-family": "'Inter', system-ui, sans-serif"
  },
  "layout": {
    "dockPosition": "bottom",
    "dockVisible": true,
    "appGridColumns": 5,
    "appCardScaleOnFocus": 1.05,
    "enableSheenEffect": true
  },
  "audio": {
    "focusVolume": 0.35,
    "selectVolume": 0.50
  }
}
```

---

## 4. CƠ CHẾ HOT-RELOAD VÀ BẢO VỆ AN TOÀN
1. **Kiểm tra chữ ký số và Schema**: File `.ltpack` khi tải về được giải nén trong sandbox bộ nhớ RAM, thẩm định cấu trúc JSON hợp lệ.
2. **Inject CSS Variables động**: Runtime duyệt qua mảng `tokens` và gán trực tiếp lên `document.documentElement.style.setProperty(key, value)`. Toàn bộ giao diện TV thay đổi diện mạo ngay tức thì mà không gián đoạn video hay âm thanh.
3. **Cơ chế Watchdog phục hồi tự động**: Nếu sau khi nạp theme có lỗi cú pháp hoặc FPS giảm dưới 20 FPS kéo dài quá 3 giây, hệ thống tự động rollback về theme mặc định để bảo vệ trải nghiệm của người dùng.
