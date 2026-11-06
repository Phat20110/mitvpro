# Danh Mục Rule CSS Cũ Đã Được Tối Ưu Hóa & Thay Thế

Dưới đây là các rule CSS cũ dạng khối nền phẳng / xanh đen đặc (`rgba(22, 22, 34, 0.65)`) đã được thay thế hoàn toàn bằng hệ thống Liquid Glass siêu trong suốt:

1. `.tv-dock`: Nền tối cũ `rgba(12, 12, 20, 0.65)` đã chuyển sang `--glass-bg: rgba(255, 255, 255, 0.045)` với bọt nước hữu cơ lồi 3D `.droplet-bulge-bubble`.
2. `.tv-card`: Nền cũ đặc thay bằng kính trong suốt squircle bo 22px, vệt lóa cong trên `::before` và viền tán sắc quang sai cầu vồng.
3. `.hero-banner`: Nền phẳng thay bằng khối kính nổi 245px bo 28px với dải quang phổ `#ff0055`, `#ffe600`, `#00e5ff`, `#9d00ff`.
4. `dock-item.active`: Đã bỏ khối màu cam đặc, thay bằng bọt nước lồi 3D trong suốt trượt theo vị trí focus.
5. `#tvHud`: Hộp đen góc dưới chuyển thành viên thuốc pha lê bo tròn nổi ở giữa màn hình.
