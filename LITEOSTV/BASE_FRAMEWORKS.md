# BỘ KHUNG NGUỒN MỞ TỐI ƯU TRÊN GITHUB DÀNH CHO LITEOSTV
> **Tiêu chí**: Thuần không quảng cáo (100% Zero Ads) • Thuần nhẹ (RAM 20MB - 35MB) • Thuần hiệu năng 60 FPS • Dễ dàng xào nấu tùy biến

Sau khi khảo sát và phân tích toàn diện mã nguồn mở trên GitHub, chúng ta chọn ra **bộ khung 3 tầng có sẵn mạnh nhất** để làm bệ phóng cho LITEOSTV:

---

## 1. TẦNG ROM & FIRMWARE HỆ THỐNG: `LineageOS for TV (Amlogic Common)`
- **Repository chính**:
  - Device Tree Amlogic: [`LineageOS/android_device_amlogic_common`](https://github.com/LineageOS/android_device_amlogic_common)
  - TV SystemUI: [`LineageOS/android_packages_apps_TvSystemUI`](https://github.com/LineageOS/android_packages_apps_TvSystemUI)
  - Hardware Kernel Modules: [`LineageOS/android_hardware_amlogic_kernel-modules_media-5.4`](https://github.com/LineageOS/android_hardware_amlogic_kernel-modules_media-5.4)
- **Ưu điểm vượt trội**:
  - Hỗ trợ trực tiếp các dòng chip Amlogic (S905X, S905W, S905X3, S905W2, GXL, GXM) — vốn là dòng vi xử lý phổ biến trên 90% TV Xiaomi, Mi Box, Onn TV, TX3, Tanix.
  - Sạch 100% mã theo dõi, không có Google Play Services ép buộc (có thể chạy độc lập hoặc với microG).
  - Tối ưu hóa pipeline hiển thị SurfaceFlinger 60 FPS không drop frame.

---

## 2. TẦNG BỘ LỌC DEBLOAT: `CleanYourTV Framework`
- **Repository**: [`CleanYourTV/CleanYourTV`](https://github.com/CleanYourTV)
- **Cơ chế**:
  - Bộ script can thiệp cấp ADB / root loại bỏ tận gốc các lớp quảng cáo đề xuất (`com.google.android.tvrecommendations`, `com.android.providers.partnerbookmarks`).
  - Đóng băng triệt để các dịch vụ rác ngốn RAM ngầm, giúp TV khởi động ngay lập tức và giải phóng hơn 400MB RAM.

---

## 3. TẦNG LAUNCHER SHELL & HIỆU NĂNG: `FLauncher` & `Lite TV Launcher`
- **Bộ đôi khung nguồn mở tham chiếu**:
  1. **`FLauncher`** ([`leanbitlab-org/LtvLauncher`](https://github.com/leanbitlab-org/LtvLauncher)):
     - Bộ launcher mở hoàn toàn, không quảng cáo, tối ưu D-Pad cực nhạy, hỗ trợ phân loại danh mục ứng dụng trực quan.
  2. **`Lite TV Launcher`** ([`anujmv/lite-tv-launcher`](https://github.com/anujmv/lite-tv-launcher)):
     - Cực kỳ nhẹ: Kích thước APK chỉ **44 KB**, RAM tiêu thụ lúc hoạt động chỉ **~22 MB** (thay vì 150MB+ như Android TV Launcher gốc).
     - Thuần hiệu năng: Không background worker, không kết nối server ngầm, mở app tức thì trong 10ms.
  3. **`Plume Launcher`** ([`aradhyas8/Plume_Launcher`](https://github.com/aradhyas8/Plume_Launcher)):
     - Kiến trúc giao diện kính mờ Liquid Glass, kích thước chỉ 0.4MB, không phụ thuộc thư viện bên thứ 3.

---

## 4. CHIẾN LƯỢC "XÀO NẤU" ĐỘC BẢN CỦA LITEOSTV

```
[Base LineageOS TV + CleanYourTV] ──> Nhân ROM sạch 0% Bloatware (ZRAM 3:1)
             +
[Base Lite TV Launcher Engine]    ──> Shell siêu nhẹ (22MB RAM, 44KB Core)
             +
[CÔNG NGHỆ ĐỘC QUYỀN LITEOSTV]:
 ├── 1. Liquid Glass Renderer      ──> Kính tán xạ mờ 24px + viền sáng 1px
 ├── 2. HyperOS Monet Color Engine ──> Trích xuất dải màu thích ứng động
 ├── 3. Sileo TV Mod Store         ──> Kho theme & tweak mở định dạng .ltpack
 └── 4. Kênh cài đặt siêu tốc      ──> Downloader mã 6372800 / is.gd/mitv25
```
