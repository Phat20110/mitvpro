const { execSync } = require('child_process');

const tasks = [
  // G1
  { id: 'mitv-t1', group: 'G1', num: 1, title: 'T1: Thêm :root chứa toàn bộ token (docs/design-tokens.md), chuyển màu hard-code sang token, chưa đổi giao diện.' },
  { id: 'mitv-t2', group: 'G1', num: 2, title: 'T2: Nền toàn trang: gradient mesh tối nhiều lớp (tím than, xanh đen, chút cam ấm).' },
  { id: 'mitv-t3', group: 'G1', num: 3, title: 'T3: Thêm 2 đến 3 orb mờ cố định phía sau (radial-gradient trên pseudo-element, cam và cyan, đậm thấp), không dùng ảnh.' },
  { id: 'mitv-t4', group: 'G1', num: 4, title: 'T4: Lớp noise rất nhẹ (SVG data-URI, opacity khoảng 3%) lên nền.' },
  { id: 'mitv-t5', group: 'G1', num: 5, title: 'T5: Chuẩn hóa font bằng system-ui; thang cỡ chữ TV bằng biến CSS (body từ 18px, tiêu đề từ 28px).' },
  { id: 'mitv-t6', group: 'G1', num: 6, title: 'T6: Tiêu đề section: font-weight 700, letter-spacing nhẹ, text-shadow mềm, giữ nội dung.' },
  { id: 'mitv-t7', group: 'G1', num: 7, title: 'T7: Token màu chữ --text-primary/secondary/tertiary, áp dụng cho toàn bộ chữ.' },
  { id: 'mitv-t8', group: 'G1', num: 8, title: 'T8: Token spacing 4/8/12/16/24/32px, áp dụng cho padding và gap chính.' },
  { id: 'mitv-t9', group: 'G1', num: 9, title: 'T9: Tạo class .glass (nền, blur, viền, shadow, highlight) bằng token, bọc @supports kèm fallback. Chưa áp dụng.' },
  { id: 'mitv-t10', group: 'G1', num: 10, title: 'T10: Tạo .glass--strong, .glass--subtle, .glass-sheen (::before highlight chéo). Chưa áp dụng.' },

  // G2
  { id: 'mitv-t11', group: 'G2', num: 11, title: 'T11: Bezel TV dùng .glass, bo xl, giữ kích thước.' },
  { id: 'mitv-t12', group: 'G2', num: 12, title: 'T12: Viền ngoài bezel gradient 1px sáng trên-trái, mờ dần dưới-phải, kèm shadow ngoài mềm.' },
  { id: 'mitv-t13', group: 'G2', num: 13, title: 'T13: Header thành thanh kính ngang, padding rộng, bo lớn.' },
  { id: 'mitv-t14', group: 'G2', num: 14, title: 'T14: Logo header squircle, viền kính, bóng nhẹ.' },
  { id: 'mitv-t15', group: 'G2', num: 15, title: 'T15: h1 giảm độ đậm, gradient chữ trắng sang xám nhạt, không tràn.' },
  { id: 'mitv-t16', group: 'G2', num: 16, title: 'T16: Mô tả phụ dùng --text-secondary, line-height 1.5, giới hạn độ rộng.' },
  { id: 'mitv-t17', group: 'G2', num: 17, title: 'T17: Badge 10-FOOT LEANBACK: pill kính viền cam mảnh, chữ cam sáng, glow nhẹ.' },
  { id: 'mitv-t18', group: 'G2', num: 18, title: 'T18: Badge Chuẩn Giao Diện TV: pill kính viền xanh lá, chấm xanh glow nhấp nháy chậm.' },
  { id: 'mitv-t19', group: 'G2', num: 19, title: 'T19: Footer XIAOMI • MITV PRO OFFICIAL EDITION: dải kính mỏng, chữ nhỏ, letter-spacing rộng, --text-tertiary.' },
  { id: 'mitv-t20', group: 'G2', num: 20, title: 'T20: Phân cách header/nội dung bằng gradient ngang mờ hai đầu.' },

  // G3
  { id: 'mitv-t21', group: 'G3', num: 21, title: 'T21: Sidebar thành cột kính dọc (.glass--subtle), bo lớn, padding đều.' },
  { id: 'mitv-t22', group: 'G3', num: 22, title: 'T22: Logo đầu sidebar có vòng kính, kích thước ổn định.' },
  { id: 'mitv-t23', group: 'G3', num: 23, title: 'T23: Icon menu emoji thành SVG inline nét 1.75px (sao, bóng đá, vệ tinh, rạp phim), cỡ 28px.' },
  { id: 'mitv-t24', group: 'G3', num: 24, title: 'T24: Item mặc định nền trong suốt, icon --text-secondary, vùng bấm tối thiểu 56x56px.' },
  { id: 'mitv-t25', group: 'G3', num: 25, title: 'T25: Item đang chọn: viên thuốc kính highlight cam bên trong, viền sáng, thay khối cam đặc.' },
  { id: 'mitv-t26', group: 'G3', num: 26, title: 'T26: Nền kính trượt mượt giữa các item khi đổi tab (transform 300ms).' },
  { id: 'mitv-t27', group: 'G3', num: 27, title: 'T27: Hover/focus: .glass--strong nhẹ, icon sáng, scale 1.05.' },
  { id: 'mitv-t28', group: 'G3', num: 28, title: 'T28: Nhãn chữ nhỏ bằng kính bên phải icon khi focus (opacity và translate).' },
  { id: 'mitv-t29', group: 'G3', num: 29, title: 'T29: Khoảng cách item theo token, căn giữa dọc, không bị cắt khi màn thấp.' },
  { id: 'mitv-t30', group: 'G3', num: 30, title: 'T30: Viền sáng mảnh bên phải sidebar và bóng nhẹ sang vùng nội dung.' },

  // G4
  { id: 'mitv-t31', group: 'G4', num: 31, title: 'T31: Hero dùng .glass--strong, bo xl, padding rộng.' },
  { id: 'mitv-t32', group: 'G4', num: 32, title: 'T32: Ánh sáng cam rất nhẹ ở góc phải-dưới (radial-gradient sau lớp kính).' },
  { id: 'mitv-t33', group: 'G4', num: 33, title: 'T33: Mô tả hero --text-secondary; từ khóa (VTV1 HD, VTV5, VTV3) --text-primary đậm.' },
  { id: 'mitv-t34', group: 'G4', num: 34, title: 'T34: Nút CÀI ĐẶT 1-CHẠM NGAY: kính sáng (nền trắng khoảng 85%, blur, highlight trên), chữ tối, bo pill.' },
  { id: 'mitv-t35', group: 'G4', num: 35, title: 'T35: Emoji trong nút thành SVG download cùng cỡ.' },
  { id: 'mitv-t36', group: 'G4', num: 36, title: 'T36: Nhấn nút: scale 0.97 và vệt sáng chạy ngang một lần (400ms).' },
  { id: 'mitv-t37', group: 'G4', num: 37, title: 'T37: Logo VTV Go bên phải trong thẻ kính squircle, phản chiếu nhẹ ở nửa trên.' },
  { id: 'mitv-t38', group: 'G4', num: 38, title: 'T38: Logo bên phải nổi nhẹ translateY ±4px, 6s; tắt khi prefers-reduced-motion.' },
  { id: 'mitv-t39', group: 'G4', num: 39, title: 'T39: Màn hẹp: hero một cột, logo xuống dưới, không tràn.' },
  { id: 'mitv-t40', group: 'G4', num: 40, title: 'T40: Chữ hero đạt tương phản 4.5:1; thêm lớp tối rất nhẹ sau chữ nếu cần.' },

  // G5
  { id: 'mitv-t41', group: 'G5', num: 41, title: 'T41: Thẻ app (SmartTube, Monster TV, VTV Go...) dùng .glass, bo lg, padding đều, thay nền xanh đen đặc.' },
  { id: 'mitv-t42', group: 'G5', num: 42, title: 'T42: Logo app squircle 16px, viền kính mảnh, bóng nhẹ, cỡ 56px.' },
  { id: 'mitv-t43', group: 'G5', num: 43, title: 'T43: Tên app --text-primary weight 700; mô tả --text-secondary, ellipsis nếu dài.' },
  { id: 'mitv-t44', group: 'G5', num: 44, title: 'T44: Tag chip màu: chip kính viền cùng tông, chữ sáng, không tô kín.' },
  { id: 'mitv-t45', group: 'G5', num: 45, title: 'T45: Nút Cài Đặt: kính viền cam mảnh, chữ cam sáng, full-width, bo md.' },
  { id: 'mitv-t46', group: 'G5', num: 46, title: 'T46: Emoji trong nút Cài Đặt thành SVG download 18px.' },
  { id: 'mitv-t47', group: 'G5', num: 47, title: 'T47: ::before sheen cho mỗi thẻ: gradient chéo trắng 10% sang trong suốt ở nửa trên.' },
  { id: 'mitv-t48', group: 'G5', num: 48, title: 'T48: Thẻ đang focus: viền gradient cam-trắng, scale 1.04, glow cam nhẹ phía dưới, thay viền cam đặc.' },
  { id: 'mitv-t49', group: 'G5', num: 49, title: 'T49: Highlight chạy theo vị trí focus/hover bằng --mx/--my (JS tối thiểu, không đụng handler cũ).' },
  { id: 'mitv-t50', group: 'G5', num: 50, title: 'T50: Thẻ cùng hàng cùng chiều cao, gap theo token, hàng cuộn ngang có scroll-snap.' },

  // G6
  { id: 'mitv-t51', group: 'G6', num: 51, title: 'T51: Icon emoji ở tiêu đề section thành SVG cùng cỡ.' },
  { id: 'mitv-t52', group: 'G6', num: 52, title: 'T52: Chip cạnh tiêu đề (Logo gốc 100%, Dolby Atmos): pill kính nhỏ, chữ --text-secondary.' },
  { id: 'mitv-t53', group: 'G6', num: 53, title: 'T53: Khoảng cách section theo token, gradient mờ phân tách nhẹ.' },
  { id: 'mitv-t54', group: 'G6', num: 54, title: 'T54: Hàng cuộn ngang: mask-image làm mờ hai mép.' },
  { id: 'mitv-t55', group: 'G6', num: 55, title: 'T55: Ẩn thanh cuộn mặc định, dùng thanh mảnh dạng kính hoặc chỉ báo vị trí nhỏ.' },
  { id: 'mitv-t56', group: 'G6', num: 56, title: 'T56: Tiêu đề section sticky dạng thanh kính mỏng khi cuộn dọc.' },
  { id: 'mitv-t57', group: 'G6', num: 57, title: 'T57: Thẻ xuất hiện: fade-in và translateY 12px, stagger 40ms, chạy một lần.' },
  { id: 'mitv-t58', group: 'G6', num: 58, title: 'T58: Skeleton shimmer kiểu kính cho thẻ khi đang tải.' },
  { id: 'mitv-t59', group: 'G6', num: 59, title: 'T59: Logo lỗi tải: placeholder kính với chữ cái đầu tên app.' },
  { id: 'mitv-t60', group: 'G6', num: 60, title: 'T60: Liệt kê (chưa xóa) các rule CSS cũ đã thừa vào docs/css-cleanup.md.' },

  // G7
  { id: 'mitv-t61', group: 'G7', num: 61, title: 'T61: :focus-visible cho mọi phần tử tương tác: viền kính sáng 2px và glow cam, không được làm mất focus ring.' },
  { id: 'mitv-t62', group: 'G7', num: 62, title: 'T62: Khi focus: thẻ scale 1.04 và translateY(-2px), nút icon scale 1.08, transition 200ms.' },
  { id: 'mitv-t63', group: 'G7', num: 63, title: 'T63: Phần tử đang focus luôn nằm trong vùng nhìn (scrollIntoView, căn giữa, smooth); chỉ thêm, không đổi logic điều hướng.' },
  { id: 'mitv-t64', group: 'G7', num: 64, title: 'T64: Focus glow lớn sau thẻ đang focus (pseudo-element radial-gradient, opacity chuyển mượt).' },
  { id: 'mitv-t65', group: 'G7', num: 65, title: 'T65: Nhấn OK/Enter: pulse (scale 0.98 về 1.0) và vệt sáng ngang, 250ms.' },
  { id: 'mitv-t66', group: 'G7', num: 66, title: 'T66: Rà thứ tự focus trái sang phải, trên xuống dưới; chỉ sửa tabindex khi cần, ghi chỗ sai vào docs/focus-notes.md.' },
  { id: 'mitv-t67', group: 'G7', num: 67, title: 'T67: Phím Back/Esc: đóng popup và trả focus về phần tử trước.' },
  { id: 'mitv-t68', group: 'G7', num: 68, title: 'T68: Nhớ item cuối được focus trong mỗi tab sidebar, khôi phục khi quay lại.' },
  { id: 'mitv-t69', group: 'G7', num: 69, title: 'T69: Trạng thái đang cài: nút kính mờ và spinner nhỏ, không nhận thao tác trùng.' },
  { id: 'mitv-t70', group: 'G7', num: 70, title: 'T70: Viết docs/remote-test-checklist.md: 10 bước thử bằng remote (lên/xuống/trái/phải/OK/Back). Không đổi code.' },

  // G8
  { id: 'mitv-t71', group: 'G8', num: 71, title: 'T71: Panel ĐIỀU KHIỂN REMOTE TV dùng .glass, bo xl, tiêu đề --text-tertiary letter-spacing rộng.' },
  { id: 'mitv-t72', group: 'G8', num: 72, title: 'T72: D-pad tròn thành đĩa kính (blur, viền sáng, highlight trên), inset shadow tạo cảm giác lõm nhẹ.' },
  { id: 'mitv-t73', group: 'G8', num: 73, title: 'T73: Nút mũi tên: ký tự thành SVG chevron, vùng bấm tối thiểu 48px, hover/active sáng lên.' },
  { id: 'mitv-t74', group: 'G8', num: 74, title: 'T74: Nút OK giữa: kính tròn, viền sáng, chữ đậm, active scale 0.94.' },
  { id: 'mitv-t75', group: 'G8', num: 75, title: 'T75: Nếu có nút remote phụ (Home, Back, Menu): pill kính và icon SVG; chưa có thì bỏ qua.' },
  { id: 'mitv-t76', group: 'G8', num: 76, title: 'T76: Nút nổi cam góc dưới trái (tia chớp): nút kính tròn viền cam, icon SVG, glow nhẹ, giữ vị trí.' },
  { id: 'mitv-t77', group: 'G8', num: 77, title: 'T77: Nút nổi: ripple kính khi nhấn, không đổi chức năng.' },
  { id: 'mitv-t78', group: 'G8', num: 78, title: 'T78: Nút cuộn xuống ở đáy: nút kính tròn nhỏ, mũi tên SVG, nhịp thở nhẹ.' },
  { id: 'mitv-t79', group: 'G8', num: 79, title: 'T79: Thanh cam ở đáy panel remote: thanh kính mảnh, phần fill gradient cam, bo pill.' },
  { id: 'mitv-t80', group: 'G8', num: 80, title: 'T80: Panel remote không che nội dung, thu gọn được bằng animation mượt trên màn hẹp.' },

  // G9
  { id: 'mitv-t81', group: 'G9', num: 81, title: 'T81: .glass-modal cho hộp thoại xác nhận cài đặt: kính đậm, bo xl, lớp mờ toàn màn hình phía sau.' },
  { id: 'mitv-t82', group: 'G9', num: 82, title: 'T82: Mở/đóng modal: scale 0.96 sang 1 và opacity, 250ms.' },
  { id: 'mitv-t83', group: 'G9', num: 83, title: 'T83: Nút trong modal: nút chính (kính cam), nút phụ (kính trung tính), cao 56px.' },
  { id: 'mitv-t84', group: 'G9', num: 84, title: 'T84: Toast: pill kính nổi dưới giữa, tự ẩn sau 3s, icon SVG trạng thái.' },
  { id: 'mitv-t85', group: 'G9', num: 85, title: 'T85: Thanh tiến độ tải: kính mỏng, fill gradient cam sang vàng, shimmer nhẹ, hiện %..' },
  { id: 'mitv-t86', group: 'G9', num: 86, title: 'T86: Trạng thái Đã cài: chip kính xanh lá và icon check, nút thành Mở dạng kính trung tính.' },
  { id: 'mitv-t87', group: 'G9', num: 87, title: 'T87: Trạng thái lỗi: chip kính đỏ dịu và nút Thử lại.' },
  { id: 'mitv-t88', group: 'G9', num: 88, title: 'T88: Màn hình trống/mất kết nối: minh họa SVG đơn giản trong thẻ kính kèm hướng dẫn ngắn.' },
  { id: 'mitv-t89', group: 'G9', num: 89, title: 'T89: Thanh gợi ý phím remote ở góc dưới (OK = Chọn, Back = Quay lại): kính nhỏ và icon SVG.' },
  { id: 'mitv-t90', group: 'G9', num: 90, title: 'T90: Banner cập nhật: dải kính trên cùng, đóng được bằng nút X focus được.' },

  // G10
  { id: 'mitv-t91', group: 'G10', num: 91, title: 'T91: @supports not (backdrop-filter): nền rgba(20,22,35,0.85) cho mọi class glass.' },
  { id: 'mitv-t92', group: 'G10', num: 92, title: 'T92: Class .perf-lite trên body: blur 8px, tắt orb, noise và animation phụ; tự bật khi máy yếu (navigator.hardwareConcurrency từ 4 trở xuống hoặc deviceMemory từ 2 trở xuống).' },
  { id: 'mitv-t93', group: 'G10', num: 93, title: 'T93: Giảm backdrop-filter lồng nhau: thẻ con trong panel kính không dùng blur riêng.' },
  { id: 'mitv-t94', group: 'G10', num: 94, title: 'T94: will-change: transform chỉ cho phần tử đang animate/focus, gỡ khi xong.' },
  { id: 'mitv-t95', group: 'G10', num: 95, title: 'T95: prefers-reduced-motion: tắt float, shimmer, sweep.' },
  { id: 'mitv-t96', group: 'G10', num: 96, title: 'T96: Responsive: kiểm tra 1920x1080, 1280x720, mobile 390px; sửa tràn và chồng chữ bằng clamp() và grid.' },
  { id: 'mitv-t97', group: 'G10', num: 97, title: 'T97: Overscan TV: padding an toàn 3 đến 5% quanh mép màn hình.' },
  { id: 'mitv-t98', group: 'G10', num: 98, title: 'T98: Kiểm tra tương phản toàn bộ chữ trên kính (từ 4.5:1), liệt kê chỗ không đạt và sửa bằng token.' },
  { id: 'mitv-t99', group: 'G10', num: 99, title: 'T99: Rà đồng nhất: radius, shadow, blur, spacing, accent đều dùng token; thay chỗ còn hard-code.' },
  { id: 'mitv-t100', group: 'G10', num: 100, title: 'T100: Tổng kết vào docs/liquid-glass-report.md: file đã sửa, class mới, token, 5 gợi ý cải thiện tiếp theo. Không sửa code.' },
];

const mergeTasks = [
  { id: 'mitv-g2-merge', group: 'G2', title: 'G2-merge: merge nhánh agent/g2 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
  { id: 'mitv-g3-merge', group: 'G3', title: 'G3-merge: merge nhánh agent/g3 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
  { id: 'mitv-g4-merge', group: 'G4', title: 'G4-merge: merge nhánh agent/g4 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
  { id: 'mitv-g5-merge', group: 'G5', title: 'G5-merge: merge nhánh agent/g5 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
  { id: 'mitv-g6-merge', group: 'G6', title: 'G6-merge: merge nhánh agent/g6 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
  { id: 'mitv-g7-merge', group: 'G7', title: 'G7-merge: merge nhánh agent/g7 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
  { id: 'mitv-g8-merge', group: 'G8', title: 'G8-merge: merge nhánh agent/g8 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
  { id: 'mitv-g9-merge', group: 'G9', title: 'G9-merge: merge nhánh agent/g9 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
  { id: 'mitv-g10-merge', group: 'G10', title: 'G10-merge: merge nhánh agent/g10 vào liquid-glass theo quy trình bước 6 ở phụ lục B' },
];

function run(cmd) {
  try {
    return execSync(cmd, { stdio: ['pipe', 'pipe', 'pipe'] }).toString().trim();
  } catch (err) {
    console.error(`Error executing: ${cmd}\n`, err.stderr ? err.stderr.toString() : err.message);
    throw err;
  }
}

console.log('--- Creating 100 tasks ---');
for (const t of tasks) {
  const safeTitle = t.title.replace(/"/g, '\\"');
  run(`bd create "${safeTitle}" --id ${t.id} -l "${t.group}" --silent`);
}

console.log('--- Creating 9 merge tasks ---');
for (const m of mergeTasks) {
  const safeTitle = m.title.replace(/"/g, '\\"');
  run(`bd create "${safeTitle}" --id ${m.id} -l "${m.group}" --silent`);
}

console.log('--- Wiring dependencies ---');
// 1. Sequential dependencies within each group
const groups = {
  G1: [1, 10],
  G2: [11, 20],
  G3: [21, 30],
  G4: [31, 40],
  G5: [41, 50],
  G6: [51, 60],
  G7: [61, 70],
  G8: [71, 80],
  G9: [81, 90],
  G10: [91, 100],
};

for (const [grp, [start, end]] of Object.entries(groups)) {
  for (let n = start + 1; n <= end; n++) {
    const prev = `mitv-t${n - 1}`;
    const curr = `mitv-t${n}`;
    // curr depends on prev => prev blocks curr
    run(`bd dep add ${curr} ${prev}`);
  }
  // Gn-merge depends on task cuối của nhóm n
  const lastTask = `mitv-t${end}`;
  const mergeTask = `mitv-${grp.toLowerCase()}-merge`;
  if (grp !== 'G1') {
    run(`bd dep add ${mergeTask} ${lastTask}`);
  }
}

// 2. T11, T21, T31, T41, T71, T81 phụ thuộc T10
const postT10 = ['mitv-t11', 'mitv-t21', 'mitv-t31', 'mitv-t41', 'mitv-t71', 'mitv-t81'];
for (const id of postT10) {
  run(`bd dep add ${id} mitv-t10`);
}

// 3. T51 phụ thuộc G2-merge, G3-merge, G4-merge, G5-merge, G8-merge, G9-merge
const preG6 = ['mitv-g2-merge', 'mitv-g3-merge', 'mitv-g4-merge', 'mitv-g5-merge', 'mitv-g8-merge', 'mitv-g9-merge'];
for (const blocker of preG6) {
  run(`bd dep add mitv-t51 ${blocker}`);
}

// 4. T61 phụ thuộc G6-merge
run(`bd dep add mitv-t61 mitv-g6-merge`);

// 5. T91 phụ thuộc G7-merge
run(`bd dep add mitv-t91 mitv-g7-merge`);

console.log('--- ALL TASKS & DEPENDENCIES SEEDED SUCCESSFULLY ---');
