# LUẬT DỰ ÁN MITV PRO - LIQUID GLASS

@./docs/design-tokens.md

## PHỤ LỤC A. PHONG CÁCH LIQUID GLASS
1. Kính: nền trong suốt nhẹ + backdrop-filter blur + saturate, không dùng màu đặc phẳng cho thẻ/panel.
2. Viền sáng mảnh 1px, sáng ở cạnh trên-trái, mờ dần dưới-phải.
3. Highlight bên trong: inset box-shadow và lớp ::before gradient chéo rất nhẹ.
4. Bo góc lớn và đồng tâm (radius con = radius cha trừ padding).
5. Bóng đổ mềm, rộng, đậm thấp.
6. Màu cam chỉ làm điểm nhấn (nút chính, focus), không tô kín khối.
7. Chữ sáng trên kính, tương phản tối thiểu 4.5:1, cỡ lớn cho TV.
8. Chuyển động mượt, ease-out, 200 đến 350ms.
Token: --glass-bg: rgba(255,255,255,0.08); --glass-bg-strong: rgba(255,255,255,0.14); --glass-border: rgba(255,255,255,0.20); --glass-blur: 24px; --glass-saturate: 180%; --glass-shadow: 0 8px 32px rgba(0,0,0,0.35); --glass-highlight: inset 0 1px 0 rgba(255,255,255,0.35), inset 0 -1px 0 rgba(255,255,255,0.05); --accent: #FF7A1A; --radius-xl: 28px; --radius-lg: 20px; --radius-md: 14px; --radius-pill: 999px.

## PHỤ LỤC B. QUY TRÌNH LÀM VIỆC (mọi agent theo, kể cả lead)
1. Chạy bd ready. Ưu tiên task kế tiếp trong nhóm bạn vừa làm, nếu không có thì lấy task số nhỏ nhất.
2. Chạy bd update <id> --claim. Nếu báo đã có người nhận, quay lại bước 1.
3. Xác định nhóm Gn của task. Từ G2 trở đi làm trong worktree riêng của nhóm: thư mục ../mitv-wt-gn, nhánh agent/gn. Chưa có thì tạo bằng: git worktree add ../mitv-wt-gn -b agent/gn liquid-glass. Đã có thì dùng lại (git status phải sạch). G1 làm trực tiếp ở thư mục chính. Sau khi G1 xong, thư mục chính chỉ dùng để merge, không ai sửa file trực tiếp ở đó.
4. Chỉ sửa file thuộc nhóm theo bản đồ file, cộng đúng phần HTML liên quan. Làm đúng MỘT task, không sửa gì khác.
5. Commit: [T<số>] mô tả ngắn. Rồi bd close <id>.
6. Với task Gn-merge: lấy khóa bằng cách tạo thư mục .merge.lock ở thư mục chính (dùng lệnh tạo thư mục không có cờ force để báo lỗi nếu đã tồn tại; lỗi thì đợi 15 giây, thử lại tối đa 40 lần). Có khóa thì chạy git -C <thư mục chính> merge --no-edit agent/gn. Nếu xung đột: git merge --abort, ghi vào STATUS.md, để task mở, nhả khóa rồi dừng. Merge xong thì xóa .merge.lock và bd close.
7. Hết task sẵn sàng thì ghi một dòng vào STATUS.md (ở thư mục chính, không commit) rồi dừng.

## PHỤ LỤC C. QUY TẮC SỬA CODE
- Giữ nguyên HTML structure, id, class có sẵn, data-attribute và toàn bộ JS cũ (kể cả focus, remote, nút cài đặt). Cần class mới thì thêm, không đổi tên class cũ.
- Không thêm thư viện, framework hay font ngoài. Giữ nguyên nội dung chữ tiếng Việt, kể cả dấu.
- Hiệu năng TV: blur tối đa 24px, không lồng backdrop-filter, chỉ animate transform và opacity. Bọc backdrop-filter bằng @supports và có fallback nền đặc hơn.
- Màu, bo góc, bóng, khoảng cách luôn lấy từ token.
