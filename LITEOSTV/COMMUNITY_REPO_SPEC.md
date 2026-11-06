# ĐẶC TẢ GIAO THỨC MÁY CHỦ REPO CỘNG ĐỒNG (SILEO TV STYLE)
> **Phiên bản giao thức**: `v1.0`  
> **Cơ chế**: Phi tập trung (Decentralized Community Sources)

---

## 1. CƠ CHẾ HOẠT ĐỘNG
Người dùng có thể thêm bất kỳ nguồn Repo nào vào LITEOSTV bằng cách nhập URL (hoặc quét mã QR qua ứng dụng điện thoại). Mọi máy chủ hỗ trợ HTTPS (như GitHub Pages, Vercel, Cloudflare Pages, Nginx) đều có thể trở thành một Community Repo.

```
[TV User] ──(Quét QR / Nhập URL)──> [LITEOSTV Client]
                                           │
                                  Tải repo.json & icons
                                           ▼
                                 [Community Repo CDN]
                                 ├── repo.json
                                 ├── packages.json
                                 └── download/
                                     ├── theme-oled.ltpack
                                     └── sound-pack.ltpack
```

---

## 2. ĐẶC TẢ `repo.json` (THÔNG TIN NGUỒN)

```json
{
  "name": "MiTV Community Official Repo",
  "identifier": "org.mitvpro.community",
  "description": "Kho theme, widget và tweak được tuyển chọn kỹ lưỡng dành cho LITEOSTV.",
  "icon": "https://is.gd/mitv25/repo-icon.png",
  "website": "https://is.gd/mitv25",
  "api_version": "1.0",
  "packages_url": "packages.json",
  "maintainer": {
    "name": "MiTV Pro Core Team",
    "downloader_code": "6372800"
  }
}
```

---

## 3. ĐẶC TẢ `packages.json` (DANH SÁCH GÓI MOD)

```json
{
  "packages": [
    {
      "id": "com.modder.hyperglass.orange",
      "name": "HyperGlass Orange Pro",
      "version": "1.2.0",
      "category": "Liquid Glass",
      "author": "MiTV Pro Team",
      "size_bytes": 1048576,
      "sha256": "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855",
      "download_url": "https://is.gd/mitv25/themes/hyperglass-orange.ltpack",
      "banner_url": "https://is.gd/mitv25/banners/hyperglass-orange.jpg",
      "rating": 4.9,
      "downloads_count": 89400,
      "changelog": "Tối ưu hóa phản xạ viền kính 1px, tăng độ mượt mà cho D-Pad lên 60 FPS."
    },
    {
      "id": "com.modder.oled.cyan",
      "name": "Cyber OLED Cyan 4K",
      "version": "2.0.1",
      "category": "Dark & Neon",
      "author": "HyperModder",
      "size_bytes": 839210,
      "sha256": "4b227777d4dd1fc61c6f884f48641d02b4d121d3fd328cb08b5531fcacdabf8a",
      "download_url": "https://is.gd/mitv25/themes/cyber-oled-cyan.ltpack",
      "banner_url": "https://is.gd/mitv25/banners/cyber-oled-cyan.jpg",
      "rating": 4.8,
      "downloads_count": 52100,
      "changelog": "Tiết kiệm 30% điện năng cho màn hình TV OLED với màu đen tuyệt đối."
    }
  ]
}
```

---

## 4. BẢO MẬT VÀ PHÂN QUYỀN
- **Không thực thi mã máy tùy tiện**: Gói `.ltpack` chỉ chứa tài nguyên tĩnh và biến cấu hình JSON; tuyệt đối không cho phép chạy nhị phân native ELF hay APK trái phép nhằm tránh nguy cơ malware trên TV.
- **Xác thực SHA-256**: Hệ thống đối chiếu hash SHA-256 trước khi giải nén.
- **Hỗ trợ sao lưu đám mây**: Danh sách Repo và Theme đã cài được lưu trữ đồng bộ hoặc xuất ra file backup nhanh chóng.
