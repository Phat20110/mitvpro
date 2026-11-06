# BÁO CÁO THIẾT LẬP VÀ VẬN HÀNH HỆ THỐNG ĐA AGENT - DỰ ÁN MITV PRO LIQUID GLASS

## 1. Các Công Việc Đã Thực Hiện Thành Công
- **Bước 0 (Khảo sát):** 
  + Xác định hệ thống Node.js `v24.18.0`, npm `11.16.0`, git `2.50.1`.
  + Giao diện dự án là HTML/CSS/JS thuần chạy trực tiếp trong WebView của Android TV App (`mitv-app/assets/store/index.html`) và Web (`web/simulator.php`), không dùng thư viện ngoài, tối ưu 100% cho màn hình TV 10-foot và remote D-Pad.
  + Chuẩn hoá Git repo tại gốc `c:\New folder`, nhánh làm việc `liquid-glass`. Thêm `.merge.lock/` và `STATUS.md` vào `.git/info/exclude`.
- **Bước 1 (Cài đặt Beads):**
  + Đã cài gói toàn cục `@beads/bd` (phiên bản 1.3.4).
  + Khởi tạo cơ sở dữ liệu Beads (`bd init --prefix mitv`) sử dụng Dolt database nhúng an toàn, hỗ trợ quản lý phụ thuộc đa cấp.
- **Bước 2 (Bản đồ tách file):**
  + Tách toàn bộ CSS inline của `mitv-app/assets/store/index.html` thành 10 module độc lập theo nhóm task: `tokens.css` (G1), `shell.css` (G2), `sidebar.css` (G3), `hero.css` (G4), `cards.css` (G5), `sections.css` (G6), `focus.css` & `focus.js` (G7), `remote.css` (G8), `modal.css` (G9), `perf.css` (G10).
  + Commit git: `chore: split css by group`.
- **Bước 3 (File luật):**
  + Tạo `GEMINI.md`: Định nghĩa chuẩn phong cách Liquid Glass (Phụ lục A), quy trình làm việc worktree/merge (Phụ lục B), quy tắc sửa code TV an toàn (Phụ lục C).
  + Tạo `AGENTS.md`: Chỉ dẫn dùng lệnh `bd` và đọc luật.
  + Tạo `docs/design-tokens.md`: Danh mục đầy đủ CSS variables.
  + Tạo `docs/TASKS.md`: Danh sách 100 task thiết kế và 9 task merge để tra cứu.
- **Bước 4 (Nạp task & kiểm tra worktree):**
  + Viết script `scripts/seed-tasks.js` và nạp toàn bộ 100 task (T1..T100) và 9 task merge (G2-merge..G10-merge) vào `bd`.
  + Thiết lập chính xác cây phụ thuộc: T1 là task mở đầu duy nhất; hoàn thành T10 sẽ tự động mở khóa 6 nhóm G2, G3, G4, G5, G8, G9 để chạy song song.
  + Đã kiểm tra tính năng chia sẻ database trên worktree tạm `../mitv-wt-temp` thành công 100% và dọn dẹp sạch sẽ.
- **Bước 5 (Khởi chạy & tự làm G1, T11):**
  + Tạo `WORKER_PROMPT.md` chứa câu lệnh chuẩn cho worker.
  + Tự thực hiện và commit độc lập toàn bộ 10 task của nhóm G1 (T1 -> T10) trực tiếp trên nhánh `liquid-glass`:
    * [T1] Root design tokens & map legacy variables
    * [T2] Multi-layer dark mesh gradient background
    * [T3] Fixed ambient orbs pseudo-elements (cam & cyan)
    * [T4] Subtle SVG noise overlay texture (3% opacity)
    * [T5] Standardize font family to system-ui & TV font scale
    * [T6] Section title font-weight 700, letter-spacing, soft shadow
    * [T7] Apply text color tokens globally to all text elements
    * [T8] Add spacing scale tokens (4, 8, 12, 16, 24, 32px)
    * [T9] Create .glass class with @supports and solid fallback
    * [T10] Create .glass--strong, .glass--subtle, and .glass-sheen variants
  + Đã thực hiện thành công task đầu tiên của nhóm G2 (T11: TV Bezel frame) trên worktree riêng `../mitv-wt-g2` (nhánh `agent/g2`) và đóng task trên Beads.

## 2. Các Vấn Đề Gặp Phải Và Cách Xử Lý
- *Vấn đề 1:* Git ban đầu chỉ được khởi tạo trong thư mục con `web`, khiến lệnh kiểm tra repo tại thư mục gốc báo lỗi `not a git repository`.
  *Cách khắc phục:* Đã chủ động khởi tạo git repo tại `c:\New folder`, cấu hình remote origin `https://github.com/Phat20110/mitvpro.git` và tạo nhánh `liquid-glass` chuẩn quy chuẩn an toàn.
- *Vấn đề 2:* Lệnh `go` không có sẵn trên môi trường Windows hiện tại.
  *Cách khắc phục:* Đã sử dụng phương pháp cài đặt chuẩn qua npm toàn cục `@beads/bd`, nhúng Dolt engine chạy mượt mà không cần bất kỳ cài đặt phụ nào.

## 3. Hướng Dẫn Mở Worker Thủ Công (Chạy Song Song 4 - 5 Agent)
Người dùng chỉ cần mở thêm 4 đến 5 tab hoặc cuộc trò chuyện mới trong Antigravity và gửi đúng câu sau:
```
Đọc WORKER_PROMPT.md rồi làm theo.
```
Mỗi agent sẽ tự động:
1. Đọc task sẵn sàng bằng lệnh `bd ready`.
2. Nhận việc bằng `bd update <id> --claim` (tự động bỏ qua nếu đã có agent khác nhận).
3. Tự tạo/chuyển vào worktree riêng (`../mitv-wt-g<n>`) và làm đúng 1 task trên nhánh `agent/g<n>`.
4. Commit và đóng task bằng `bd close <id>`.

## 4. Cách Xem Tiến Độ Dự Án
- **Xem các task đang sẵn sàng để làm:**
  ```powershell
  bd ready
  ```
- **Xem toàn bộ danh sách và trạng thái các task:**
  ```powershell
  bd list
  ```
- **Xem ghi chú trạng thái tóm tắt nhanh:**
  Đọc file `STATUS.md` ở thư mục chính.

## 5. Cách Quay Lại Bản Cũ Bằng Git
Nếu muốn hủy toàn bộ các thay đổi và quay lại trạng thái ban đầu của mã nguồn:
```powershell
git checkout main
```
Để quay lại nhánh đang làm việc Liquid Glass:
```powershell
git checkout liquid-glass
```
