# BÁO CÁO THIẾT LẬP HỆ THỐNG ĐIỀU PHỐI ĐA AGENT - MITV PRO LIQUID GLASS

## 1. Khảo Sát Hệ Thống & Hiện Trạng Dự Án (Bước 0)
- **Thư mục dự án:** `c:\New folder`
- **Môi trường kỹ thuật:**
  + Node.js: `v24.18.0`
  + npm: `11.16.0`
  + Git: `git version 2.50.1.windows.1`
- **Công nghệ UI:** HTML/CSS/JS thuần (Vanilla Web UI) chạy trực tiếp trong WebView của Android TV App (`mitv-app/assets/store/index.html`) và mô phỏng TV Web (`web/simulator.php`). Không dùng React hay framework ngoài -> hoàn toàn tương thích và giữ nguyên 100% logic cũ.
- **Git Repository:** Đã khởi tạo Git tại thư mục gốc `c:\New folder`, cấu hình remote origin `https://github.com/Phat20110/mitvpro.git`.
- **Nhánh thực thi:** Đã tạo và chuyển sang nhánh `liquid-glass`. Đã thêm `.merge.lock/` và `STATUS.md` vào `.git/info/exclude`.

## 2. Cài Đặt Hệ Thống Quản Lý Task Beads (bd) (Bước 1)
- Đã cài đặt thành công package toàn cục: `@beads/bd` (version 1.3.4).
- Đã khởi tạo cơ sở dữ liệu Beads (`bd init --prefix mitv`) sử dụng Dolt database nhúng.

## 3. Bản Đồ Chia File Tách CSS (Bước 2)
Đã tách toàn bộ CSS inline trong `mitv-app/assets/store/index.html` thành 10 module độc lập theo nhóm task:
- `css/tokens.css` (Nhóm G1: Design Tokens)
- `css/shell.css` (Nhóm G2: Khung TV & Header)
- `css/sidebar.css` (Nhóm G3: Left Rail Dock)
- `css/hero.css` (Nhóm G4: Spotlight Hero Banner)
- `css/cards.css` (Nhóm G5: App Cards)
- `css/sections.css` (Nhóm G6: Shelves & Rails)
- `css/focus.css` & `js/focus.js` (Nhóm G7: D-Pad Focus Engine)
- `css/remote.css` (Nhóm G8: Virtual Remote)
- `css/modal.css` (Nhóm G9: Modal HUD)
- `css/perf.css` (Nhóm G10: TV Performance)
Đã liên kết đúng thứ tự và commit: `chore: split css by group`.

## 4. File Luật & Cấu Hình Agent (Bước 3)
- `GEMINI.md`: Chứa Phụ lục A (phong cách Liquid Glass), Phụ lục B (quy trình làm việc worktree/merge), Phụ lục C (quy tắc code an toàn).
- `AGENTS.md`: Hướng dẫn agent sử dụng bd.
- `docs/design-tokens.md`: Danh mục đầy đủ CSS variables theo chuẩn Liquid Glass.
- `docs/TASKS.md`: Bảng theo dõi 100 task Liquid Glass và 9 merge task.
- `WORKER_PROMPT.md`: Prompt tiêu chuẩn cho các worker agent tự hành.

## 5. Nạp Task & Phụ Thuộc (Bước 4)
- Đang tiến hành nạp 100 task (T1..T100) và 9 task merge (G2-merge..G10-merge) vào `bd`.
- Phụ thuộc:
  + Tuần tự trong từng nhóm G1..G10.
  + T10 hoàn thành sẽ mở khóa G2, G3, G4, G5, G8, G9 chạy song song.
  + G2..G9 merge xong sẽ mở khóa G6.
  + G6 merge xong mở khóa G7.
  + G7 merge xong mở khóa G10.
  + Trạng thái ban đầu: chỉ duy nhất T1 sẵn sàng (`bd ready`).

## 6. Hướng Dẫn Vận Hành Cho Người Dùng
- **Cách xem danh sách task:**
  ```powershell
  bd list
  bd ready
  ```
- **Cách chạy worker thủ công:**
  Mở thêm 4 đến 5 cuộc trò chuyện mới trong Antigravity và dán đúng câu sau:
  > Đọc WORKER_PROMPT.md rồi làm theo.
- **Cách quay lại bản cũ nếu cần:**
  ```powershell
  git checkout main
  ```
