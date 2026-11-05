# <p align="center">📺 MiTV Pro - Hệ Sinh Thái Tối Ưu & Cài Đặt Tivi Xiaomi Chuyên Nghiệp 🚀</p>

<p align="center">
  <img src="https://img.shields.io/badge/Platform-Android%20TV%20%7C%20Google%20TV%20%7C%20PatchWall-FF6900?style=for-the-badge&logo=xiaomi&logoColor=white" alt="Platform">
  <img src="https://img.shields.io/badge/Native_Core-C%2B%2B20%20%7C%20Rust-DEA584?style=for-the-badge&logo=rust&logoColor=white" alt="Native Core">
  <img src="https://img.shields.io/badge/Downloader_Shortlink-is.gd%2Fmitv25-00B4D8?style=for-the-badge&logo=fastlane&logoColor=white" alt="Downloader Link">
  <img src="https://img.shields.io/badge/Security-OWASP%20Hardened-2EA44F?style=for-the-badge&logo=securityscorecard&logoColor=white" alt="Security">
  <img src="https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-Apache--2.0-blue?style=for-the-badge" alt="License">
</p>

---

## 📖 Mục Lục
1. [Cơ Chế Tải Trực Tiếp Không Qua Trang Web (Direct Auto-Download)](#-1-cơ-chế-tải-trực-tiếp-từ-github-qua-downloader)
2. [Hướng Dẫn Người Dùng: Tải & Cài Đặt Trên Tivi Xiaomi (A-Z)](#-2-hướng-dẫn-cài-đặt-trên-tivi-xiaomi-từng-bước)
3. [Cẩm Nang Kỹ Thuật Tối Ưu RAM & Gỡ Bỏ Ứng Dụng Rác (Bloatware)](#-3-cẩm-nang-tối-ưu-hóa-chuyên-sâu-xiaomi-tv)
4. [Hướng Dẫn Tắt 100% Quảng Cáo Khởi Động & MSA Xiaomi](#-4-cấu-hình-chặn-quảng-cáo-toàn-diện)
5. [Bảng Tra Cứu Model Tivi Xiaomi & Khuyến Nghị Tối Ưu](#-5-bảng-tra-cứu-model-tivi-xiaomi)
6. [Cẩm Nang Khắc Phục Sự Cố Kỹ Thuật (Troubleshooting FAQ)](#-6-cẩm-nang-khắc-phục-sự-cố-thường-gặp)
7. [Hướng Dẫn Tạo & Cập Nhật Mã Số Downloader Mới](#-7-hướng-dẫn-tạo-mã-downloader-trỏ-về-github)
8. [Cấu Trúc Mã Nguồn Dự Án](#-8-cấu-trúc-dự-án)

---

## ⚡ 1. Cơ Chế Tải Trực Tiếp Từ GitHub Qua Downloader

### 🎯 Quy trình tải tự động (Không cần mở trình duyệt web)
Thay vì bắt người dùng phải mở trình duyệt web trên TV (vốn rất khó điều khiển bằng remote), hệ thống MiTV Pro áp dụng giải pháp **GitHub Raw / GitHub Release Direct Stream**:

```
[Remote TV: Nhập Mã 6789 trên Downloader]
                   │
                   ▼
      [go.aftvnews.com Redirect]
                   │
                   ▼
  [GitHub Raw CDN / Direct Storage Link]
  https://raw.githubusercontent.com/Phat20110/mitvpro/main/downloads/MiTV-Optimizer-v2.5.apk
                   │
                   ▼
[Downloader tự động stream file APK về bộ nhớ TV]
                   │
                   ▼
   [Pop-up hệ thống TV xuất hiện ngay lập tức: "Bạn có muốn cài đặt ứng dụng này?"]
                   │
                   ▼
          [Bấm CÀI ĐẶT -> Xong!]
```

* **Ưu điểm vượt trội:**
  * Khách hàng **không cần nhập đường dẫn web dài dòng**.
  * **Không hiển thị giao diện web trung gian**, giảm 100% nguy cơ bấm nhầm trên remote.
  * Tốc độ tải trực tiếp từ mạng CDN máy chủ toàn cầu của GitHub (Fastly / Varnish), tải cực nhanh kể cả khi đường truyền quốc tế gặp sự cố.

---

## 📺 2. Hướng Dẫn Cài Đặt Trên Tivi Xiaomi Từng Bước

Áp dụng cho toàn bộ các dòng Tivi Xiaomi (EA series, A Pro, Redmi TV, Mi TV 4A/4S/5/6, Google TV, Android TV):

### Bước 1: Cài đặt ứng dụng Downloader
1. Trên màn hình chính của Tivi Xiaomi, mở ứng dụng **Google Play Store (CH Play)**.
2. Tại thanh tìm kiếm bằng giọng nói hoặc bàn phím ảo, gõ từ khóa: `Downloader`.
3. Chọn ứng dụng **Downloader by AFTVnews** (biểu tượng màu cam) và bấm **Cài đặt (Install)**.

### Bước 2: Cấp quyền cài đặt ứng dụng ngoài (Rất quan trọng)
*Đối với Google TV / Android TV 11, 12:*
1. Vào **Cài đặt (Settings)** (biểu tượng bánh răng) ➜ **Ứng dụng (Apps)** ➜ **Bảo mật và hạn chế (Security & Restrictions)**.
2. Chọn mục **Cài đặt ứng dụng không rõ nguồn gốc (Install Unknown Apps)**.
3. Tìm đến ứng dụng **Downloader** và gạt công tắc sang **Cho phép (Bật/ON)**.

*Đối với Android TV 9, 10:*
1. Vào **Cài đặt** ➜ **Tùy chọn thiết bị (Device Preferences)** ➜ **Bảo mật (Security)**.
2. Bật mục **Nguồn không xác định (Unknown Sources)**.

### Bước 3: Nhập mã số tải nhanh
1. Mở ứng dụng **Downloader** vừa cài đặt trên Tivi.
2. Di chuyển con trỏ chuột remote vào ô trống **"Enter a URL or Search Term"**.
3. Nhập mã số chính thức:
   <p align="center">
     <kbd style="font-size: 24px; padding: 10px 25px; font-weight: bold; background: #FF6900; color: white; border-radius: 8px;">6372800</kbd>
   </p>
4. Bấm nút **Go**. (Hoặc nhập shortlink trực tiếp: `is.gd/mitv25` hoặc `tinyurl.com/2dfjqgyy`)

### Bước 4: Cài đặt và sử dụng
- Downloader sẽ đếm ngược 3 giây và tự động tải trực tiếp gói `MiTV-Optimizer-v2.5.apk` từ kho GitHub về tivi.
- Khi tải xong, tivi sẽ tự động bung cửa sổ hỏi: *"Bạn có muốn cài đặt ứng dụng này không?"*.
- Dùng remote chọn **Cài đặt (Install)** ➜ Chờ 5 giây ➜ Chọn **Mở (Open)** để sử dụng ngay.

---

## 🛠️ 3. Cẩm Nang Tối Ưu Hóa Chuyên Sâu Xiaomi TV

Tivi Xiaomi (đặc biệt là bản nội địa hoặc máy RAM 1.5GB - 2GB) thường xuyên bị đầy bộ nhớ đệm và các ứng dụng quảng cáo chạy ngầm của Xiaomi làm chậm máy.

### Danh Sách Gói Cần Đóng Băng / Gỡ Bỏ (Bloatware List):
| Tên Gói Ứng Dụng (Package Name) | Tác Hại / Mô Tả | Mức Độ |
| :--- | :--- | :--- |
| `com.xiaomi.mitv.advertisingservice` | Chạy quảng cáo pop-up khi mở ứng dụng | 🔴 Cần tắt ngay |
| `com.miui.systemAdSolution` | Dịch vụ đẩy quảng cáo hệ thống MSA của Xiaomi | 🔴 Cần tắt ngay |
| `com.xiaomi.mitv.tvpush.tvpushservice`| Thông báo đẩy rác làm giật khung hình TV | 🔴 Cần tắt ngay |
| `com.xiaomi.mitv.wallpapercarousel` | Tải ngầm hình nền quảng cáo tốn băng thông | 🟡 Khuyên tắt |
| `com.xiaomi.mitv.upgrade` | Tự động tải bản cập nhật ngầm làm đơ máy | 🟡 Khuyên tắt |
| `com.xiaomi.mitv.shop` | Cửa hàng mua sắm nội địa Trung Quốc | 🟢 An toàn để xóa |

### Lệnh Tối Ưu Bằng Máy Tính Qua ADB (Dành cho Kỹ thuật viên):
Nếu kết nối Tivi và Máy tính chung mạng Wi-Fi (Bật chế độ gỡ lỗi USB/Network Debugging trong Tùy chọn nhà phát triển):
```bash
# 1. Kết nối đến địa chỉ IP của Tivi (Xem IP trong Cài đặt mạng của TV)
adb connect 192.168.1.xxx:5555

# 2. Vô hiệu hóa toàn bộ dịch vụ quảng cáo ngầm Xiaomi
adb shell pm disable-user --user 0 com.xiaomi.mitv.advertisingservice
adb shell pm disable-user --user 0 com.miui.systemAdSolution
adb shell pm disable-user --user 0 com.xiaomi.mitv.tvpush.tvpushservice
adb shell pm disable-user --user 0 com.xiaomi.mitv.wallpapercarousel

# 3. Tăng tốc độ hiển thị hình ảnh (Giảm hiệu ứng cửa sổ giúp mượt gấp đôi)
adb shell settings put global window_animation_scale 0.5
adb shell settings put global transition_animation_scale 0.5
adb shell settings put global animator_duration_scale 0.5

# 4. Giải phóng phân vùng RAM cache hệ thống
adb shell pm trim-caches 1000M
```

---

## 🛡️ 4. Cấu Hình Chặn Quảng Cáo Toàn Diện (Không Cần Root)

Chặn sạch quảng cáo banner, quảng cáo ứng dụng và các trình theo dõi hành vi người dùng trên Tivi Xiaomi thông qua Private DNS bảo mật:

1. **Bước 1:** Trên Tivi Xiaomi, vào **Cài đặt** ➜ **Mạng & Internet (Network & Internet)**.
2. **Bước 2:** Chọn mục **DNS Riêng tư (Private DNS)** (Nếu Tivi chạy Android 9 trở lên).
3. **Bước 3:** Chuyển từ chế độ *Tự động (Auto)* sang **Tên máy chủ của nhà cung cấp DNS riêng tư (Private DNS provider hostname)**.
4. **Bước 4:** Nhập chính xác địa chỉ:
   ```text
   dns.adguard-dns.com
   ```
5. **Bước 5:** Bấm **Lưu (Save)** và khởi động lại tivi. Tivi sẽ tự động lọc sạch 100% tên miền quảng cáo của Xiaomi và các bên thứ ba.

---

## 📊 5. Bảng Tra Cứu Model Tivi Xiaomi

| Dòng Tivi (Series) | Cấu Hình RAM / ROM | Tình Trạng Điển Hình | Khuyến Nghị Xử Lý |
| :--- | :--- | :--- | :--- |
| **Xiaomi EA (EA32, EA43, EA50, EA55, EA65)** | 1.5GB RAM / 8GB ROM | Dễ tràn RAM sau 30 phút xem video 4K | Cài MiTV Optimizer, giới hạn 2 tiến trình nền |
| **Xiaomi A Pro (43", 55", 65", 75")** | 2GB RAM / 16GB ROM | Google TV chạy mượt, đôi khi giật nhẹ menu | Tắt Wallpaper Carousel, giảm scale hiệu ứng về 0.5x |
| **Redmi MAX (86", 98", 100")** | 4GB RAM / 64GB ROM | Cấu hình rất mạnh, chủ yếu vướng app rác | Gỡ ứng dụng rác nội địa, cài Launcher thuần Việt |
| **Mi TV 4A / 4S / 4C Cũ** | 1GB hoặc 2GB RAM | Đơ lag nghiêm trọng khi mở YouTube | Dọn sạch cache phân vùng, dùng SmartTube Lite |

---

## ❓ 6. Cẩm Nang Khắc Phục Sự Cố Thường Gặp

### ⚠️ 1. Downloader báo lỗi: *"Error 403 Forbidden"* hoặc *"Cannot open file"*?
* **Nguyên nhân:** Ứng dụng Downloader chưa được cấp quyền truy cập bộ nhớ lưu trữ.
* **Cách khắc phục:** Vào **Cài đặt TV** ➜ **Ứng dụng** ➜ **Downloader** ➜ **Quyền (Permissions)** ➜ Bật quyền **Bộ nhớ / Tệp và phương tiện (Storage / Files and Media)** thành *Luôn cho phép*.

### ⚠️ 2. Khi cài xong tivi báo *"Lỗi cú pháp (Parse Error)"*?
* **Nguyên nhân:** File APK tải về bị đứt gãy do mạng Wi-Fi yếu, hoặc phiên bản Android TV quá cũ (Android 4.4, 5.0).
* **Cách khắc phục:** Mở Downloader, bấm nút **Delete** để xóa file lỗi tải dở, sau đó kiểm tra lại kết nối mạng và nhập lại mã `6789` để tải lại.

### ⚠️ 3. Tivi bị mất tiếng khi xem các ứng dụng bên ngoài?
* **Cách khắc phục:** Vào **Cài đặt** ➜ **Âm thanh (Sound)** ➜ **Đầu ra âm thanh kỹ thuật số (Digital Audio Output)** ➜ Đổi từ *Auto/Dolby* sang chế độ **PCM**.

---

## 🔗 7. Hướng Dẫn Tạo Mã Downloader Trỏ Về GitHub

Nếu anh muốn tạo thêm mã số mới hoặc trỏ đến bản cập nhật tiếp theo:
1. Copy đường dẫn tải file trực tiếp trên GitHub:
   ```text
   https://raw.githubusercontent.com/Phat20110/mitvpro/main/downloads/MiTV-Optimizer-v2.5.apk
   ```
2. Mở trình duyệt web và truy cập công cụ rút gọn chính thức của Downloader:
   👉 **[https://go.aftvnews.com/](https://go.aftvnews.com/)**
3. Dán link GitHub trực tiếp ở trên vào ô **Target URL**.
4. Bấm nút **Create Code**. Hệ thống sẽ cấp một mã số ngắn gọn gồm 4 đến 6 chữ số để khách hàng gõ trên remote tivi.

---

## 📂 8. Cấu Trúc Dự Án

```plaintext
mitvpro/
├── admin/                     # Bảng điều khiển quản trị viên
│   ├── index.php              # Quản lý đơn hẹn & số liệu thống kê
│   ├── login.php              # Đăng nhập bảo mật CSRF
│   └── logout.php             # Đăng xuất an toàn
├── api/                       # REST API nội bộ
│   ├── check-model.php        # API tra cứu cấu hình model TV
│   └── download.php           # API kiểm tra & bảo vệ luồng tải APK
├── assets/                    # Tài nguyên tĩnh
│   ├── css/style.css          # Giao diện responsive chuẩn Xiaomi Dark/Orange
│   ├── img/xiaomi-logo.svg    # Logo Xiaomi vector chuẩn Kenya Hara
│   └── js/main.js             # Xử lý AJAX, sao chép mã 1 chạm, kiểm tra model
├── data/                      # Lưu trữ cơ sở dữ liệu
│   └── mitv_database.sqlite   # SQLite CSDL tự động khởi tạo không cần cài đặt
├── downloads/                 # Kho chứa file APK cài đặt cho TV
│   └── MiTV-Optimizer-v2.5.apk# Ứng dụng tối ưu hóa TV Xiaomi chính thức
├── includes/                  # Bộ xử lý trung tâm
│   └── db.php                 # Kết nối PDO SQLite an toàn
├── booking.php                # Đặt lịch hỗ trợ cài đặt tivi từ xa
├── community.php              # Diễn đàn & bài viết chia sẻ mẹo dùng TV
├── config.php                 # Bộ lọc bảo mật OWASP, CSP, Headers, CSRF
├── disclaimer.php             # Tuyên bố miễn trừ trách nhiệm
├── downloader.php             # Cổng thông tin mã Downloader độc quyền (6789)
├── guide-adblock.php          # Hướng dẫn chặn quảng cáo Xiaomi TV
├── index.php                  # Trang chủ giới thiệu dịch vụ & công cụ
├── optimizer.php              # Giới thiệu & hướng dẫn dùng app MiTV Optimizer
├── privacy.php                # Chính sách bảo mật quyền riêng tư
├── speedtest.php              # Tiện ích đo tốc độ mạng & độ trễ IPTV
├── terms.php                  # Điều khoản dịch vụ & cam kết bảo hành
├── tool-check.php             # Giao diện tra cứu model TV Xiaomi
└── track.php                  # Tra cứu tiến độ đơn hẹn theo mã MTV-XXXXXX
```

---

## 📱 9. Kho Ứng Dụng Đỉnh Cao Cho Tivi Xiaomi (Bóng Đá, Phim 4K, VTV1 & Quốc Tế)

Hệ sinh thái MiTV Pro cung cấp sẵn danh sách mã tải trực tiếp cho các ứng dụng giải trí đỉnh cao nhất hiện nay, tương thích 100% với remote Tivi Xiaomi:

| Ứng Dụng (App Name) | Thể Loại | Tải Về / Mã Downloader | Tính Năng Nổi Bật |
| :--- | :--- | :---: | :--- |
| **MiTV Optimizer Pro** | Tối ưu hệ thống | `6372800` | Dọn RAM, giải phóng bộ nhớ, đóng băng quảng cáo ngầm Xiaomi |
| **YTXTube TV (Bản Liquid Glass)** | YouTube & Music TV | [v2.2.0 APK](downloads/YTXTube-v2.2.0.apk) | Giao diện kính mờ Liquid Glass, không quảng cáo, Shorts, lyric Apple Music |
| **SmartTube Next Stable** | YouTube 4K HDR | `28544` | Chặn sạch 100% quảng cáo, xem 4K 60fps HDR, bỏ qua đoạn tài trợ |
| **Monster TV Sports Live** | Trực tiếp Bóng đá | `88412` | Trực tiếp Ngoại Hạng Anh, Cúp C1, World Cup, bình luận tiếng Việt |
| **Xôi Lạc / Vebo TV** | Bóng đá TV Edition | `79234` | Bản chuyên biệt cho Remote Xiaomi TV, độ trễ thấp, không giật |
| **VTV Go TV (Bản Chuẩn TV)** | Truyền hình Quốc gia | `52410` | Ứng dụng chính thức của Đài THVN: VTV1 HD đến VTV9, xem lại 6 tháng |
| **TiviMate IPTV Player Pro** | 250+ Kênh VN & QT | `11281` | Đầy đủ VTV, HTV, Vĩnh Long THVL, K+ Sport, HBO, Cinemax, Discovery |
| **Stremio TV 4K Cinema** | Rạp phim bom tấn | `44921` | Xem phim chiếu rạp Netflix, HBO, Disney+ chuẩn 4K Dolby Vision Vietsub |
| **TV360 Smart TV** | Truyền hình tốc độ cao | `63219` | Server CDN Viettel tại VN, mở kênh 0.5s, miễn phí data |

---

## 🛠️ 10. Hướng Dẫn Kỹ Thuật: Chuyển Đổi (Port) App Điện Thoại Sang Android TV Leanback

Khi cài đặt ứng dụng Android điện thoại lên Tivi Xiaomi hoặc Android TV / Google TV, thường xảy ra 3 vấn đề lớn:
1. **Icon bị ẩn khỏi màn hình chính** (Chỉ tìm thấy trong Cài đặt &rarr; Ứng dụng).
2. **Không di chuyển được bằng Remote D-Pad** (Bấm phím mũi tên Lên/Xuống/Trái/Phải không ăn).
3. **Màn hình bị xoay dọc hoặc méo tỷ lệ**.

### A. Chỉnh Sửa Mã Nguồn `AndroidManifest.xml` (Dành cho Lập Trình Viên)
```xml
<manifest xmlns:android="http://schemas.android.com/apk/res/android">
    <!-- 1. Bỏ bắt buộc cảm ứng để không bị Play Store và TV OS từ chối cài đặt -->
    <uses-feature android:name="android.hardware.touchscreen" android:required="false" />
    <uses-feature android:name="android.software.leanback" android:required="false" />

    <!-- 2. Thêm Banner 16:9 (320x180 px) cho giao diện Home của Tivi -->
    <application android:banner="@drawable/tv_banner" ...>
        <activity android:name=".MainActivity"
            android:screenOrientation="sensorLandscape">
            <intent-filter>
                <action android:name="android.intent.action.MAIN" />
                <category android:name="android.intent.category.LAUNCHER" />
                <!-- 3. Đăng ký Leanback Launcher để hiện icon ngoài màn hình Tivi -->
                <category android:name="android.intent.category.LEANBACK_LAUNCHER" />
            </intent-filter>
        </activity>
    </application>
</manifest>
```

### B. Tự Động Hóa Chuyển Đổi File APK Bằng Script (Không Cần Mã Nguồn)
Sử dụng script có sẵn trong thư mục `tools/convert_mobile_to_tv.bat` của dự án:
```cmd
# Kéo thả file APK vào script hoặc chạy lệnh:
tools\convert_mobile_to_tv.bat app_dien_thoai.apk
```
Script sẽ tự động:
1. Dùng `apktool` bung file APK.
2. Tự động chèn thẻ `android.software.leanback` và `LEANBACK_LAUNCHER`.
3. Tắt yêu cầu cảm ứng `android.hardware.touchscreen = false`.
4. Đóng gói lại và căn chỉnh `zipalign -v -p 4` tạo file APK tương thích 100% với Tivi Xiaomi!

### C. Tham Khảo Dự Án Mẫu YTXTube
Kho mã nguồn mở: [Koustubh12345/YTXTube](https://github.com/Koustubh12345/YTXTube)
* Bản thiết kế giao diện kính mờ Liquid Glass siêu nhẹ (4MB).
* Hỗ trợ chuẩn remote D-Pad, cuộn Shorts và xem video 4K không quảng cáo.

---

<p align="center">
  <b>MiTV Pro &copy; 2026 - Giải Pháp Đỉnh Cao Dành Riêng Cho Tivi Xiaomi Tại Việt Nam</b><br>
  <i>Phát triển & Bảo trì bởi Phat20110</i>
</p>
