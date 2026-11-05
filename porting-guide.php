<?php
$pageTitle = 'Hướng Dẫn Port App Điện Thoại Sang Tivi Xiaomi & Android TV - MiTV Pro';
$pageDesc = 'Cẩm nang kỹ thuật chuyển đổi ứng dụng Android Mobile sang Android TV / Google TV. Khắc phục lỗi ẩn icon, hỗ trợ remote D-pad, giao diện Leanback 10-foot UI.';
$currentPage = 'porting';
require_once __DIR__ . '/header.php';
?>

<div class="legal-page">
    <div class="container">
        <div class="legal-box" style="max-width: 1080px;">
            <!-- Header Section -->
            <div style="text-align:center; margin-bottom: 36px;">
                <span class="card-tag" style="background:rgba(255,103,0,0.15); color:var(--primary); font-weight:800;">
                    <i class="fas fa-tv"></i> ANDROID TV LEANBACK ENGINEERING
                </span>
                <h1 style="font-size:2.3rem; margin: 12px 0 10px; line-height:1.3;">
                    Hướng Dẫn Chuyển Đổi (Port) App Điện Thoại Lên Tivi Xiaomi & Android TV
                </h1>
                <p style="color:var(--text-muted); max-width:760px; margin:0 auto; font-size:1.02rem; line-height:1.6;">
                    Toàn bộ quy trình chuẩn kỹ thuật để đưa một ứng dụng Android Mobile hoạt động mượt mà trên Tivi: Tự động hiển thị icon trên màn hình chính, điều khiển bằng Remote D-Pad, khóa xoay ngang màn hình và tối ưu hiệu năng cho Tivi RAM 1GB - 2GB.
                </p>
            </div>

            <!-- Quick Alert / Case Study Spotlight -->
            <div style="background:linear-gradient(135deg, rgba(255,23,68,0.12), rgba(255,103,0,0.08)); border:1px solid rgba(255,23,68,0.3); border-radius:14px; padding:20px 24px; margin-bottom:36px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px;">
                <div style="display:flex; align-items:center; gap:16px;">
                    <div style="width:48px; height:48px; border-radius:12px; background:#FF1744; display:flex; align-items:center; justify-content:center; color:#fff; font-size:1.5rem; flex-shrink:0;">
                        <i class="fab fa-youtube"></i>
                    </div>
                    <div>
                        <h4 style="margin:0 0 4px; font-size:1.15rem; color:#fff;">Dự Án Điển Hình: YTXTube (Bản v2.2.0 Liquid Glass)</h4>
                        <p style="margin:0; font-size:0.9rem; color:var(--text-muted);">
                            Mã nguồn mở bởi <strong>Koustubh12345</strong> &bull; Dung lượng chỉ 4.1 MB &bull; Giao diện kính mờ Liquid Glass chạy mượt trên cả điện thoại và Tivi.
                        </p>
                    </div>
                </div>
                <div style="display:flex; gap:10px;">
                    <a href="downloads/YTXTube-v2.2.0.apk" download class="btn-primary" style="padding:8px 18px; font-size:0.88rem;">
                        <i class="fas fa-download"></i> Tải APK
                    </a>
                    <a href="https://github.com/Koustubh12345/YTXTube" target="_blank" class="btn-outline" style="padding:8px 18px; font-size:0.88rem;">
                        <i class="fab fa-github"></i> GitHub Repo
                    </a>
                </div>
            </div>

            <!-- Why Mobile Apps Fail on TV -->
            <h2 style="font-size:1.5rem; margin-bottom:16px; border-left:4px solid var(--primary); padding-left:12px;">
                1. Tại Sao App Điện Thoại Cài Lên Tivi Thường Bị Lỗi Hoặc Ẩn Icon?
            </h2>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:18px; margin-bottom:32px;">
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:18px;">
                    <div style="color:#FF3D3D; font-size:1.2rem; margin-bottom:8px;"><i class="fas fa-eye-slash"></i> Không Hiện Icon Ở Màn Hình Home</div>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.5; margin:0;">
                        Android TV sử dụng Leanback Launcher. Nếu file <code>AndroidManifest.xml</code> thiếu khai báo <code>android.intent.category.LEANBACK_LAUNCHER</code>, tivi sẽ giấu app trong phần "Cài đặt &rarr; Ứng dụng" chứ không hiện ngoài trang chủ.
                    </p>
                </div>
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:18px;">
                    <div style="color:#FF9100; font-size:1.2rem; margin-bottom:8px;"><i class="fas fa-hand-pointer"></i> Không Thể Điều Khiển Bằng Remote D-Pad</div>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.5; margin:0;">
                        App điện thoại thiết kế cho cảm ứng tay (Touch Event). Khi lên tivi, các nút không có thuộc tính <code>focusable="true"</code> khiến người dùng bấm phím mũi tên Lên/Xuống/Trái/Phải không di chuyển con trỏ được.
                    </p>
                </div>
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:18px;">
                    <div style="color:#2196F3; font-size:1.2rem; margin-bottom:8px;"><i class="fas fa-mobile-screen"></i> Bị Xoay Dọc (Portrait) Màn Hình</div>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.5; margin:0;">
                        Nhiều app mobile cố định chiều dọc. Khi hiển thị trên màn hình tivi 43 - 75 inch tỷ lệ 16:9, giao diện bị méo, quay ngang 90 độ hoặc hiển thị 2 dải đen khổng lồ ở 2 bên.
                    </p>
                </div>
            </div>

            <!-- The Technical Core (Manifest Modification) -->
            <h2 style="font-size:1.5rem; margin-bottom:16px; border-left:4px solid #00C853; padding-left:12px;">
                2. Bốn Thay Đổi Cốt Lõi Trong AndroidManifest.xml
            </h2>
            <p style="color:var(--text-muted); font-size:0.92rem; line-height:1.6; margin-bottom:16px;">
                Dù bạn lập trình từ mã nguồn hay decompile chỉnh sửa file APK có sẵn, đây là cấu hình bắt buộc để ứng dụng được Android TV công nhận:
            </p>

            <div style="background:#0F141C; border:1px solid rgba(255,255,255,0.1); border-radius:12px; padding:20px; margin-bottom:28px; overflow-x:auto;">
                <pre style="margin:0; font-family:'Courier New', monospace; font-size:0.85rem; color:#E0E0E0; line-height:1.6;"><code><span style="color:#7C4DFF;">&lt;manifest</span> <span style="color:#2196F3;">xmlns:android=</span><span style="color:#00C853;">"http://schemas.android.com/apk/res/android"</span><span style="color:#7C4DFF;">&gt;</span>

    <span style="color:#888;">&lt;!-- 1. Khai báo không bắt buộc màn hình cảm ứng (BẮT BUỘC để không bị Google Play / TV từ chối) --&gt;</span>
    <span style="color:#FF9100;">&lt;uses-feature</span> <span style="color:#2196F3;">android:name=</span><span style="color:#00C853;">"android.hardware.touchscreen"</span> <span style="color:#2196F3;">android:required=</span><span style="color:#00C853;">"false"</span> <span style="color:#FF9100;">/&gt;</span>
    <span style="color:#FF9100;">&lt;uses-feature</span> <span style="color:#2196F3;">android:name=</span><span style="color:#00C853;">"android.software.leanback"</span> <span style="color:#2196F3;">android:required=</span><span style="color:#00C853;">"false"</span> <span style="color:#FF9100;">/&gt;</span>
    <span style="color:#FF9100;">&lt;uses-feature</span> <span style="color:#2196F3;">android:name=</span><span style="color:#00C853;">"android.hardware.telephony"</span> <span style="color:#2196F3;">android:required=</span><span style="color:#00C853;">"false"</span> <span style="color:#FF9100;">/&gt;</span>
    <span style="color:#FF9100;">&lt;uses-feature</span> <span style="color:#2196F3;">android:name=</span><span style="color:#00C853;">"android.hardware.camera"</span> <span style="color:#2196F3;">android:required=</span><span style="color:#00C853;">"false"</span> <span style="color:#FF9100;">/&gt;</span>

    <span style="color:#7C4DFF;">&lt;application</span>
        <span style="color:#2196F3;">android:icon=</span><span style="color:#00C853;">"@mipmap/ic_launcher"</span>
        <span style="color:#2196F3;">android:label=</span><span style="color:#00C853;">"@string/app_name"</span>
        <span style="color:#888;">&lt;!-- 2. Khai báo Banner chữ nhật tỷ lệ 16:9 (320x180 px) cho màn hình chính Android TV --&gt;</span>
        <span style="color:#FF9100;">android:banner=</span><span style="color:#00C853;">"@drawable/tv_banner"</span><span style="color:#7C4DFF;">&gt;</span>

        <span style="color:#7C4DFF;">&lt;activity</span>
            <span style="color:#2196F3;">android:name=</span><span style="color:#00C853;">".MainActivity"</span>
            <span style="color:#888;">&lt;!-- 3. Cố định màn hình ngang (Landscape) --&gt;</span>
            <span style="color:#FF9100;">android:screenOrientation=</span><span style="color:#00C853;">"sensorLandscape"</span>
            <span style="color:#2196F3;">android:exported=</span><span style="color:#00C853;">"true"</span><span style="color:#7C4DFF;">&gt;</span>
            
            <span style="color:#7C4DFF;">&lt;intent-filter&gt;</span>
                <span style="color:#7C4DFF;">&lt;action</span> <span style="color:#2196F3;">android:name=</span><span style="color:#00C853;">"android.intent.action.MAIN"</span> <span style="color:#7C4DFF;">/&gt;</span>
                <span style="color:#888;">&lt;!-- Icon cho điện thoại thường --&gt;</span>
                <span style="color:#7C4DFF;">&lt;category</span> <span style="color:#2196F3;">android:name=</span><span style="color:#00C853;">"android.intent.category.LAUNCHER"</span> <span style="color:#7C4DFF;">/&gt;</span>
                <span style="color:#888;">&lt;!-- 4. Icon chuẩn cho Android TV / Xiaomi PatchWall --&gt;</span>
                <span style="color:#FF9100;">&lt;category</span> <span style="color:#2196F3;">android:name=</span><span style="color:#00C853;">"android.intent.category.LEANBACK_LAUNCHER"</span> <span style="color:#FF9100;">/&gt;</span>
            <span style="color:#7C4DFF;">&lt;/intent-filter&gt;</span>
        <span style="color:#7C4DFF;">&lt;/activity&gt;</span>
    <span style="color:#7C4DFF;">&lt;/application&gt;</span>
<span style="color:#7C4DFF;">&lt;/manifest&gt;</span></code></pre>
            </div>

            <!-- Remote Navigation (D-Pad) Handling -->
            <h2 style="font-size:1.5rem; margin-bottom:16px; border-left:4px solid #2196F3; padding-left:12px;">
                3. Xử Lý Điều Khiển Remote (D-Pad Focus & Key Event)
            </h2>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:32px;">
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:20px;">
                    <h4 style="margin:0 0 10px; font-size:1.05rem; color:#2196F3;"><i class="fas fa-bullseye"></i> 1. Kích Hoạt Focus Cho View (XML)</h4>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.5;">
                        Mọi thành phần người dùng có thể nhấp vào (Card phim, Nút play, Menu) đều phải gắn 3 thuộc tính:
                    </p>
                    <pre style="background:#0B0E14; padding:12px; border-radius:8px; font-size:0.8rem; color:#A5D6A7; margin:0;"><code>android:focusable="true"
android:clickable="true"
android:focusableInTouchMode="false"
android:background="@drawable/tv_item_selector"</code></pre>
                </div>
                <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:20px;">
                    <h4 style="margin:0 0 10px; font-size:1.05rem; color:#2196F3;"><i class="fas fa-gamepad"></i> 2. Bắt Phím Remote (Java/Kotlin)</h4>
                    <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.5;">
                        Lắng nghe các sự kiện phím điều hướng và phím Enter/OK của Remote Tivi:
                    </p>
                    <pre style="background:#0B0E14; padding:12px; border-radius:8px; font-size:0.8rem; color:#80D8FF; margin:0;"><code>@Override
public boolean onKeyDown(int keyCode, KeyEvent event) {
    if (keyCode == KeyEvent.KEYCODE_DPAD_CENTER || 
        keyCode == KeyEvent.KEYCODE_ENTER) {
        // Thực hiện hành động bấm OK
        return true;
    }
    return super.onKeyDown(keyCode, event);
}</code></pre>
                </div>
            </div>

            <!-- Modding Existing APK Method -->
            <h2 style="font-size:1.5rem; margin-bottom:16px; border-left:4px solid #AB47BC; padding-left:12px;">
                4. Quy Trình Mod Trực Tiếp File APK Bằng Apktool (Không Cần Mã Nguồn)
            </h2>
            <p style="color:var(--text-muted); font-size:0.92rem; line-height:1.6; margin-bottom:16px;">
                Nếu bạn chỉ có file cài đặt <code>.apk</code> của ứng dụng điện thoại (như app xem bóng đá, app đọc truyện, app nghe nhạc), bạn có thể dùng bộ công cụ dòng lệnh để convert sang chuẩn Tivi qua 5 bước:
            </p>

            <div style="background:var(--bg-main); border:1px solid var(--border-subtle); border-radius:12px; padding:20px; margin-bottom:32px;">
                <ol style="margin:0; padding-left:20px; line-height:1.8; font-size:0.92rem; color:var(--text-main);">
                    <li>
                        <strong>Bước 1: Bung file APK (Decompile)</strong>
                        <div style="background:#0F141C; padding:10px 14px; border-radius:8px; margin:6px 0 12px; font-family:monospace; color:#80D8FF;">
                            apktool d my_app_mobile.apk -o my_app_tv
                        </div>
                    </li>
                    <li>
                        <strong>Bước 2: Mở file <code>my_app_tv/AndroidManifest.xml</code> và chèn các thẻ sau:</strong>
                        <ul style="color:var(--text-muted); font-size:0.85rem; margin-top:4px;">
                            <li>Chèn <code>&lt;uses-feature android:name="android.software.leanback" android:required="false" /&gt;</code></li>
                            <li>Chèn <code>&lt;uses-feature android:name="android.hardware.touchscreen" android:required="false" /&gt;</code></li>
                            <li>Tìm thẻ <code>&lt;activity&gt;</code> có chứa <code>android.intent.action.MAIN</code>, thêm vào trong <code>&lt;intent-filter&gt;</code> dòng:
                                <br><code style="color:var(--primary);">&lt;category android:name="android.intent.category.LEANBACK_LAUNCHER" /&gt;</code>
                            </li>
                            <li>Thêm thuộc tính <code>android:banner="@drawable/tv_banner"</code> vào thẻ <code>&lt;application&gt;</code></li>
                        </ul>
                    </li>
                    <li>
                        <strong>Bước 3: Chuẩn bị ảnh Banner Android TV</strong>
                        <p style="color:var(--text-muted); font-size:0.85rem; margin:4px 0;">
                            Tạo một tấm ảnh PNG kích thước chuẩn <strong>320 x 180 pixel</strong> (tỷ lệ 16:9), đặt tên là <code>tv_banner.png</code> rồi chép vào thư mục <code>my_app_tv/res/drawable-xhdpi/</code>.
                        </p>
                    </li>
                    <li>
                        <strong>Bước 4: Đóng gói lại file APK (Recompile)</strong>
                        <div style="background:#0F141C; padding:10px 14px; border-radius:8px; margin:6px 0 12px; font-family:monospace; color:#80D8FF;">
                            apktool b my_app_tv -o my_app_tv_unsigned.apk
                        </div>
                    </li>
                    <li>
                        <strong>Bước 5: Căn chỉnh 4-byte (Zipalign) & Ký số (Sign)</strong>
                        <div style="background:#0F141C; padding:10px 14px; border-radius:8px; margin:6px 0 12px; font-family:monospace; color:#80D8FF;">
                            zipalign -v -p 4 my_app_tv_unsigned.apk my_app_tv_aligned.apk<br>
                            apksigner sign --ks release.keystore --ks-pass pass:123456 my_app_tv_aligned.apk
                        </div>
                        <span style="font-size:0.85rem; color:#00C853;"><i class="fas fa-check-circle"></i> File <code>my_app_tv_aligned.apk</code> đã sẵn sàng cài lên Tivi Xiaomi bằng mã Downloader <strong>6372800</strong> hoặc USB!</span>
                    </li>
                </ol>
            </div>

            <!-- Automated Script Download -->
            <div style="background:rgba(255,103,0,0.06); border:1px dashed var(--primary); border-radius:14px; padding:24px; text-align:center;">
                <h3 style="margin:0 0 10px; font-size:1.25rem;">Công Cụ Tự Động Hóa Port TV (MiTV Converter Script)</h3>
                <p style="color:var(--text-muted); font-size:0.9rem; max-width:650px; margin:0 auto 18px;">
                    Đội ngũ MiTV Pro đã viết sẵn file kịch bản tự động hóa (PowerShell & Batch script). Bạn chỉ cần kéo thả file APK điện thoại vào script, hệ thống sẽ tự động chèn Leanback, xoay ngang và xuất file TV hoàn chỉnh!
                </p>
                <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                    <a href="tools/convert_mobile_to_tv.bat" download class="btn-primary" style="padding:10px 22px;">
                        <i class="fas fa-file-code"></i> Tải Script Batch (.bat)
                    </a>
                    <a href="store.php" class="btn-outline" style="padding:10px 22px;">
                        <i class="fas fa-cubes"></i> Khám Phá Kho App Tivi Đã Tối Ưu
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
