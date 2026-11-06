# PHỤ LỤC D. 100 TASK LIQUID GLASS

| Task ID | Nhóm | Trạng thái | Nội dung |
|---|---|---|---|
| T1 | G1 | TODO | Thêm :root chứa toàn bộ token (docs/design-tokens.md), chuyển màu hard-code sang token, chưa đổi giao diện. |
| T2 | G1 | TODO | Nền toàn trang: gradient mesh tối nhiều lớp (tím than, xanh đen, chút cam ấm). |
| T3 | G1 | TODO | Thêm 2 đến 3 orb mờ cố định phía sau (radial-gradient trên pseudo-element, cam và cyan, đậm thấp), không dùng ảnh. |
| T4 | G1 | TODO | Lớp noise rất nhẹ (SVG data-URI, opacity khoảng 3%) lên nền. |
| T5 | G1 | TODO | Chuẩn hóa font bằng system-ui; thang cỡ chữ TV bằng biến CSS (body từ 18px, tiêu đề từ 28px). |
| T6 | G1 | TODO | Tiêu đề section: font-weight 700, letter-spacing nhẹ, text-shadow mềm, giữ nội dung. |
| T7 | G1 | TODO | Token màu chữ --text-primary/secondary/tertiary, áp dụng cho toàn bộ chữ. |
| T8 | G1 | TODO | Token spacing 4/8/12/16/24/32px, áp dụng cho padding và gap chính. |
| T9 | G1 | TODO | Tạo class .glass (nền, blur, viền, shadow, highlight) bằng token, bọc @supports kèm fallback. Chưa áp dụng. |
| T10 | G1 | TODO | Tạo .glass--strong, .glass--subtle, .glass-sheen (::before highlight chéo). Chưa áp dụng. |
| T11 | G2 | TODO | Bezel TV dùng .glass, bo xl, giữ kích thước. |
| T12 | G2 | TODO | Viền ngoài bezel gradient 1px sáng trên-trái, mờ dần dưới-phải, kèm shadow ngoài mềm. |
| T13 | G2 | TODO | Header thành thanh kính ngang, padding rộng, bo lớn. |
| T14 | G2 | TODO | Logo header squircle, viền kính, bóng nhẹ. |
| T15 | G2 | TODO | h1 giảm độ đậm, gradient chữ trắng sang xám nhạt, không tràn. |
| T16 | G2 | TODO | Mô tả phụ dùng --text-secondary, line-height 1.5, giới hạn độ rộng. |
| T17 | G2 | TODO | Badge 10-FOOT LEANBACK: pill kính viền cam mảnh, chữ cam sáng, glow nhẹ. |
| T18 | G2 | TODO | Badge Chuẩn Giao Diện TV: pill kính viền xanh lá, chấm xanh glow nhấp nháy chậm. |
| T19 | G2 | TODO | Footer XIAOMI • MITV PRO OFFICIAL EDITION: dải kính mỏng, chữ nhỏ, letter-spacing rộng, --text-tertiary. |
| T20 | G2 | TODO | Phân cách header/nội dung bằng gradient ngang mờ hai đầu. |
| T21 | G3 | TODO | Sidebar thành cột kính dọc (.glass--subtle), bo lớn, padding đều. |
| T22 | G3 | TODO | Logo đầu sidebar có vòng kính, kích thước ổn định. |
| T23 | G3 | TODO | Icon menu emoji thành SVG inline nét 1.75px (sao, bóng đá, vệ tinh, rạp phim), cỡ 28px. |
| T24 | G3 | TODO | Item mặc định nền trong suốt, icon --text-secondary, vùng bấm tối thiểu 56x56px. |
| T25 | G3 | TODO | Item đang chọn: viên thuốc kính highlight cam bên trong, viền sáng, thay khối cam đặc. |
| T26 | G3 | TODO | Nền kính trượt mượt giữa các item khi đổi tab (transform 300ms). |
| T27 | G3 | TODO | Hover/focus: .glass--strong nhẹ, icon sáng, scale 1.05. |
| T28 | G3 | TODO | Nhãn chữ nhỏ bằng kính bên phải icon khi focus (opacity và translate). |
| T29 | G3 | TODO | Khoảng cách item theo token, căn giữa dọc, không bị cắt khi màn thấp. |
| T30 | G3 | TODO | Viền sáng mảnh bên phải sidebar và bóng nhẹ sang vùng nội dung. |
| T31 | G4 | TODO | Hero dùng .glass--strong, bo xl, padding rộng. |
| T32 | G4 | TODO | Ánh sáng cam rất nhẹ ở góc phải-dưới (radial-gradient sau lớp kính). |
| T33 | G4 | TODO | Mô tả hero --text-secondary; từ khóa (VTV1 HD, VTV5, VTV3) --text-primary đậm. |
| T34 | G4 | TODO | Nút CÀI ĐẶT 1-CHẠM NGAY: kính sáng (nền trắng khoảng 85%, blur, highlight trên), chữ tối, bo pill. |
| T35 | G4 | TODO | Emoji trong nút thành SVG download cùng cỡ. |
| T36 | G4 | TODO | Nhấn nút: scale 0.97 và vệt sáng chạy ngang một lần (400ms). |
| T37 | G4 | TODO | Logo VTV Go bên phải trong thẻ kính squircle, phản chiếu nhẹ ở nửa trên. |
| T38 | G4 | TODO | Logo bên phải nổi nhẹ translateY ±4px, 6s; tắt khi prefers-reduced-motion. |
| T39 | G4 | TODO | Màn hẹp: hero một cột, logo xuống dưới, không tràn. |
| T40 | G4 | TODO | Chữ hero đạt tương phản 4.5:1; thêm lớp tối rất nhẹ sau chữ nếu cần. |
| T41 | G5 | TODO | Thẻ app (SmartTube, Monster TV, VTV Go...) dùng .glass, bo lg, padding đều, thay nền xanh đen đặc. |
| T42 | G5 | TODO | Logo app squircle 16px, viền kính mảnh, bóng nhẹ, cỡ 56px. |
| T43 | G5 | TODO | Tên app --text-primary weight 700; mô tả --text-secondary, ellipsis nếu dài. |
| T44 | G5 | TODO | Tag chip màu: chip kính viền cùng tông, chữ sáng, không tô kín. |
| T45 | G5 | TODO | Nút Cài Đặt: kính viền cam mảnh, chữ cam sáng, full-width, bo md. |
| T46 | G5 | TODO | Emoji trong nút Cài Đặt thành SVG download 18px. |
| T47 | G5 | TODO | ::before sheen cho mỗi thẻ: gradient chéo trắng 10% sang trong suốt ở nửa trên. |
| T48 | G5 | TODO | Thẻ đang focus: viền gradient cam-trắng, scale 1.04, glow cam nhẹ phía dưới, thay viền cam đặc. |
| T49 | G5 | TODO | Highlight chạy theo vị trí focus/hover bằng --mx/--my (JS tối thiểu, không đụng handler cũ). |
| T50 | G5 | TODO | Thẻ cùng hàng cùng chiều cao, gap theo token, hàng cuộn ngang có scroll-snap. |
| T51 | G6 | TODO | Icon emoji ở tiêu đề section thành SVG cùng cỡ. |
| T52 | G6 | TODO | Chip cạnh tiêu đề (Logo gốc 100%, Dolby Atmos): pill kính nhỏ, chữ --text-secondary. |
| T53 | G6 | TODO | Khoảng cách section theo token, gradient mờ phân tách nhẹ. |
| T54 | G6 | TODO | Hàng cuộn ngang: mask-image làm mờ hai mép. |
| T55 | G6 | TODO | Ẩn thanh cuộn mặc định, dùng thanh mảnh dạng kính hoặc chỉ báo vị trí nhỏ. |
| T56 | G6 | TODO | Tiêu đề section sticky dạng thanh kính mỏng khi cuộn dọc. |
| T57 | G6 | TODO | Thẻ xuất hiện: fade-in và translateY 12px, stagger 40ms, chạy một lần. |
| T58 | G6 | TODO | Skeleton shimmer kiểu kính cho thẻ khi đang tải. |
| T59 | G6 | TODO | Logo lỗi tải: placeholder kính với chữ cái đầu tên app. |
| T60 | G6 | TODO | Liệt kê (chưa xóa) các rule CSS cũ đã thừa vào docs/css-cleanup.md. |
| T61 | G7 | TODO | :focus-visible cho mọi phần tử tương tác: viền kính sáng 2px và glow cam, không được làm mất focus ring. |
| T62 | G7 | TODO | Khi focus: thẻ scale 1.04 và translateY(-2px), nút icon scale 1.08, transition 200ms. |
| T63 | G7 | TODO | Phần tử đang focus luôn nằm trong vùng nhìn (scrollIntoView, căn giữa, smooth); chỉ thêm, không đổi logic điều hướng. |
| T64 | G7 | TODO | Focus glow lớn sau thẻ đang focus (pseudo-element radial-gradient, opacity chuyển mượt). |
| T65 | G7 | TODO | Nhấn OK/Enter: pulse (scale 0.98 về 1.0) và vệt sáng ngang, 250ms. |
| T66 | G7 | TODO | Rà thứ tự focus trái sang phải, trên xuống dưới; chỉ sửa tabindex khi cần, ghi chỗ sai vào docs/focus-notes.md. |
| T67 | G7 | TODO | Phím Back/Esc: đóng popup và trả focus về phần tử trước. |
| T68 | G7 | TODO | Nhớ item cuối được focus trong mỗi tab sidebar, khôi phục khi quay lại. |
| T69 | G7 | TODO | Trạng thái đang cài: nút kính mờ và spinner nhỏ, không nhận thao tác trùng. |
| T70 | G7 | TODO | Viết docs/remote-test-checklist.md: 10 bước thử bằng remote (lên/xuống/trái/phải/OK/Back). Không đổi code. |
| T71 | G8 | TODO | Panel ĐIỀU KHIỂN REMOTE TV dùng .glass, bo xl, tiêu đề --text-tertiary letter-spacing rộng. |
| T72 | G8 | TODO | D-pad tròn thành đĩa kính (blur, viền sáng, highlight trên), inset shadow tạo cảm giác lõm nhẹ. |
| T73 | G8 | TODO | Nút mũi tên: ký tự thành SVG chevron, vùng bấm tối thiểu 48px, hover/active sáng lên. |
| T74 | G8 | TODO | Nút OK giữa: kính tròn, viền sáng, chữ đậm, active scale 0.94. |
| T75 | G8 | TODO | Nếu có nút remote phụ (Home, Back, Menu): pill kính và icon SVG; chưa có thì bỏ qua. |
| T76 | G8 | TODO | Nút nổi cam góc dưới trái (tia chớp): nút kính tròn viền cam, icon SVG, glow nhẹ, giữ vị trí. |
| T77 | G8 | TODO | Nút nổi: ripple kính khi nhấn, không đổi chức năng. |
| T78 | G8 | TODO | Nút cuộn xuống ở đáy: nút kính tròn nhỏ, mũi tên SVG, nhịp thở nhẹ. |
| T79 | G8 | TODO | Thanh cam ở đáy panel remote: thanh kính mảnh, phần fill gradient cam, bo pill. |
| T80 | G8 | TODO | Panel remote không che nội dung, thu gọn được bằng animation mượt trên màn hẹp. |
| T81 | G9 | TODO | .glass-modal cho hộp thoại xác nhận cài đặt: kính đậm, bo xl, lớp mờ toàn màn hình phía sau. |
| T82 | G9 | TODO | Mở/đóng modal: scale 0.96 sang 1 và opacity, 250ms. |
| T83 | G9 | TODO | Nút trong modal: nút chính (kính cam), nút phụ (kính trung tính), cao 56px. |
| T84 | G9 | TODO | Toast: pill kính nổi dưới giữa, tự ẩn sau 3s, icon SVG trạng thái. |
| T85 | G9 | TODO | Thanh tiến độ tải: kính mỏng, fill gradient cam sang vàng, shimmer nhẹ, hiện %. |
| T86 | G9 | TODO | Trạng thái Đã cài: chip kính xanh lá và icon check, nút thành Mở dạng kính trung tính. |
| T87 | G9 | TODO | Trạng thái lỗi: chip kính đỏ dịu và nút Thử lại. |
| T88 | G9 | TODO | Màn hình trống/mất kết nối: minh họa SVG đơn giản trong thẻ kính kèm hướng dẫn ngắn. |
| T89 | G9 | TODO | Thanh gợi ý phím remote ở góc dưới (OK = Chọn, Back = Quay lại): kính nhỏ và icon SVG. |
| T90 | G9 | TODO | Banner cập nhật: dải kính trên cùng, đóng được bằng nút X focus được. |
| T91 | G10 | TODO | @supports not (backdrop-filter): nền rgba(20,22,35,0.85) cho mọi class glass. |
| T92 | G10 | TODO | Class .perf-lite trên body: blur 8px, tắt orb, noise và animation phụ; tự bật khi máy yếu (navigator.hardwareConcurrency từ 4 trở xuống hoặc deviceMemory từ 2 trở xuống). |
| T93 | G10 | TODO | Giảm backdrop-filter lồng nhau: thẻ con trong panel kính không dùng blur riêng. |
| T94 | G10 | TODO | will-change: transform chỉ cho phần tử đang animate/focus, gỡ khi xong. |
| T95 | G10 | TODO | prefers-reduced-motion: tắt float, shimmer, sweep. |
| T96 | G10 | TODO | Responsive: kiểm tra 1920x1080, 1280x720, mobile 390px; sửa tràn và chồng chữ bằng clamp() và grid. |
| T97 | G10 | TODO | Overscan TV: padding an toàn 3 đến 5% quanh mép màn hình. |
| T98 | G10 | TODO | Kiểm tra tương phản toàn bộ chữ trên kính (từ 4.5:1), liệt kê chỗ không đạt và sửa bằng token. |
| T99 | G10 | TODO | Rà đồng nhất: radius, shadow, blur, spacing, accent đều dùng token; thay chỗ còn hard-code. |
| T100 | G10 | TODO | Tổng kết vào docs/liquid-glass-report.md: file đã sửa, class mới, token, 5 gợi ý cải thiện tiếp theo. Không sửa code. |
| G2-merge | G2 | TODO | Merge nhánh agent/g2 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
| G3-merge | G3 | TODO | Merge nhánh agent/g3 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
| G4-merge | G4 | TODO | Merge nhánh agent/g4 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
| G5-merge | G5 | TODO | Merge nhánh agent/g5 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
| G6-merge | G6 | TODO | Merge nhánh agent/g6 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
| G7-merge | G7 | TODO | Merge nhánh agent/g7 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
| G8-merge | G8 | TODO | Merge nhánh agent/g8 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
| G9-merge | G9 | TODO | Merge nhánh agent/g9 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
| G10-merge | G10 | TODO | Merge nhánh agent/g10 vào liquid-glass theo quy trình bước 6 ở phụ lục B. |
