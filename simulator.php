<?php
$pageTitle = 'Trình Mô Phỏng Trực Tiếp Giao Diện Tivi Xiaomi (MiTV Pro Live Demo)';
$pageDesc = 'Mô phỏng 1:1 màn hình Tivi Xiaomi với điều khiển remote D-Pad, trải nghiệm YTXTube, SmartTube, VTV Go và dọn RAM tức thì.';
$currentPage = 'simulator';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .tv-focused {
      transform: scale(1.05);
      border-color: #FF6700 !important;
      box-shadow: 0 10px 25px rgba(255, 103, 0, 0.5) !important;
      z-index: 20;
    }
    .glass-card {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .remote-btn:active {
      transform: scale(0.92);
      background-color: #FF6700 !important;
      color: #fff !important;
    }
  </style>
</head>
<body class="bg-slate-950 text-slate-100 font-sans p-4 min-h-screen flex flex-col items-center justify-center">

  <div class="max-w-6xl w-full">
    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
      <div class="flex items-center gap-3">
        <a href="index.php" class="w-10 h-10 rounded-xl bg-orange-600 flex items-center justify-center shadow-lg shadow-orange-600/40 font-black text-xl text-white">
          MI
        </a>
        <div>
          <h1 class="text-xl font-bold flex items-center gap-2">
            Mô Phỏng Trực Tiếp Tivi Xiaomi <span class="text-xs px-2 py-0.5 rounded-full bg-orange-500/20 text-orange-400 border border-orange-500/30 font-semibold">MiTV Pro 2.5</span>
          </h1>
          <p class="text-xs text-slate-400">Trải nghiệm tương tác 1:1 như trên màn hình Smart TV 65-inch thật với Remote D-Pad</p>
        </div>
      </div>
      <div class="flex items-center gap-2">
        <a href="store.php" class="text-xs px-3 py-1.5 rounded-lg bg-orange-600 hover:bg-orange-500 text-white font-bold transition">
          <i class="fas fa-cubes mr-1"></i> Mở Kho App Store
        </a>
        <a href="index.php" class="text-xs px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 transition">
          <i class="fas fa-home mr-1"></i> Trang chủ
        </a>
      </div>
    </div>

    <!-- Main Container: TV + Remote -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 items-start">
      
      <!-- TV Screen (3 cols) -->
      <div class="lg:col-span-3">
        <!-- TV Bezel -->
        <div class="relative bg-slate-900 p-3 rounded-2xl border-4 border-slate-700 shadow-2xl shadow-black/80">
          
          <!-- Screen Display (16:9 feel) -->
          <div id="tvScreen" class="relative bg-gradient-to-br from-slate-950 via-slate-900 to-[#0e1626] rounded-xl overflow-hidden aspect-[16/9] flex flex-col justify-between border border-slate-800 select-none">
            
            <!-- TV Top Status Bar -->
            <div class="px-6 py-3 bg-black/40 backdrop-blur-md border-b border-white/5 flex items-center justify-between text-xs text-slate-300 z-10">
              <div class="flex items-center gap-4">
                <span class="font-bold text-orange-400 flex items-center gap-1.5">
                  <i class="fas fa-tv"></i> Xiaomi TV 4K HDR
                </span>
                <span class="text-slate-500">|</span>
                <span id="ramWidget" class="flex items-center gap-1.5 text-emerald-400 font-mono">
                  <i class="fas fa-microchip"></i> RAM: <strong id="ramText">648 MB / 2048 MB</strong> (31%)
                </span>
              </div>
              <div class="flex items-center gap-4">
                <span class="text-emerald-400 flex items-center gap-1">
                  <i class="fas fa-shield-halved"></i> AdBlock: Bật (Chặn 50k domain)
                </span>
                <span class="flex items-center gap-1"><i class="fas fa-wifi text-emerald-400"></i> Wi-Fi 5GHz</span>
                <span id="tvClock" class="font-mono font-bold text-white">22:15</span>
              </div>
            </div>

            <!-- Main TV Viewport -->
            <div class="p-6 flex-1 flex flex-col justify-between overflow-hidden">
              
              <!-- Spotlight Banner -->
              <div id="heroBanner" class="p-4 rounded-xl bg-gradient-to-r from-orange-600/20 via-slate-800/40 to-transparent border border-orange-500/20 flex items-center justify-between mb-4">
                <div>
                  <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-orange-500 text-white inline-block mb-1">
                    ĐANG CHẠY TRÊN TIVI
                  </span>
                  <h2 id="activeAppName" class="text-lg font-bold text-white flex items-center gap-2">
                    YTXTube TV - Bản Kính Mờ Liquid Glass 4K
                  </h2>
                  <p id="activeAppDesc" class="text-xs text-slate-300 max-w-lg mt-0.5 line-clamp-1">
                    YouTube mã nguồn mở tối ưu cho Remote TV Xiaomi: Sạch 100% quảng cáo, xem video 4K 60fps HDR, lyrics đồng bộ Apple Music.
                  </p>
                </div>
                <div class="text-right">
                  <span class="text-xs text-slate-400 block">Mã Downloader</span>
                  <span class="text-xl font-black text-orange-400 font-mono tracking-wider">6372800</span>
                </div>
              </div>

              <!-- Categories Pills -->
              <div class="flex items-center gap-2 mb-3">
                <button class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-600 text-white">Tất Cả App</button>
                <button class="px-3 py-1 rounded-full text-xs font-medium text-slate-400 hover:text-white bg-white/5">⚽ Bóng Đá Trực Tiếp</button>
                <button class="px-3 py-1 rounded-full text-xs font-medium text-slate-400 hover:text-white bg-white/5">📺 Truyền Hình VTV</button>
                <button class="px-3 py-1 rounded-full text-xs font-medium text-slate-400 hover:text-white bg-white/5">🎬 Rạp Phim 4K</button>
                <button class="px-3 py-1 rounded-full text-xs font-medium text-slate-400 hover:text-white bg-white/5">⚡ Dọn Dẹp RAM</button>
              </div>

              <!-- Apps Grid (6 items) -->
              <div class="grid grid-cols-3 gap-3" id="appGrid">
                
                <!-- Card 0: YTXTube -->
                <div class="app-item tv-focused glass-card p-3 rounded-xl border border-white/10 cursor-pointer transition-all duration-200" data-index="0" data-name="YTXTube TV (Liquid Glass)" data-desc="Mã nguồn mở GitHub Koustubh12345: Giao diện kính mờ Liquid Glass, không quảng cáo, cuộn Shorts mượt mà." data-action="ytxtube">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-red-600/20 text-red-500 flex items-center justify-center text-lg flex-shrink-0">
                      <i class="fab fa-youtube"></i>
                    </div>
                    <div class="overflow-hidden">
                      <h4 class="text-xs font-bold text-white truncate">YTXTube TV (v2.2.0)</h4>
                      <p class="text-[11px] text-slate-400 truncate">Liquid Glass &bull; 4.1MB</p>
                    </div>
                  </div>
                  <div class="mt-2 flex items-center justify-between text-[10px]">
                    <span class="text-orange-400 font-medium">Bấm OK để mở</span>
                    <span class="text-emerald-400"><i class="fas fa-check"></i> Sẵn sàng</span>
                  </div>
                </div>

                <!-- Card 1: SmartTube -->
                <div class="app-item glass-card p-3 rounded-xl border border-white/10 cursor-pointer transition-all duration-200" data-index="1" data-name="SmartTube Next 4K" data-desc="Trình phát YouTube chuyên dụng Android TV: Bỏ qua đoạn tài trợ SponsorBlock, 4K HDR 60fps." data-action="smarttube">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-600/20 text-orange-500 flex items-center justify-center text-lg flex-shrink-0">
                      <i class="fas fa-play-circle"></i>
                    </div>
                    <div class="overflow-hidden">
                      <h4 class="text-xs font-bold text-white truncate">SmartTube Next 4K</h4>
                      <p class="text-[11px] text-slate-400 truncate">SponsorBlock &bull; Chặn 100% QC</p>
                    </div>
                  </div>
                  <div class="mt-2 flex items-center justify-between text-[10px]">
                    <span class="text-slate-400">Xem video 4K</span>
                    <span class="text-emerald-400"><i class="fas fa-check"></i> Sẵn sàng</span>
                  </div>
                </div>

                <!-- Card 2: Monster TV -->
                <div class="app-item glass-card p-3 rounded-xl border border-white/10 cursor-pointer transition-all duration-200" data-index="2" data-name="Monster TV & Xôi Lạc" data-desc="Trực tiếp Ngoại Hạng Anh, Cúp C1, La Liga: Tốc độ cao, bình luận tiếng Việt không delay." data-action="football">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-600/20 text-emerald-500 flex items-center justify-center text-lg flex-shrink-0">
                      <i class="fas fa-futbol"></i>
                    </div>
                    <div class="overflow-hidden">
                      <h4 class="text-xs font-bold text-white truncate">Monster TV Sports</h4>
                      <p class="text-[11px] text-slate-400 truncate">Bóng đá Full HD &bull; BLV TV</p>
                    </div>
                  </div>
                  <div class="mt-2 flex items-center justify-between text-[10px]">
                    <span class="text-slate-400">Trực tiếp Ngoại Hạng Anh</span>
                    <span class="text-emerald-400"><i class="fas fa-bolt"></i> Live</span>
                  </div>
                </div>

                <!-- Card 3: VTV Go & TiviMate -->
                <div class="app-item glass-card p-3 rounded-xl border border-white/10 cursor-pointer transition-all duration-200" data-index="3" data-name="VTV Go & TiviMate IPTV" data-desc="Trọn bộ kênh truyền hình quốc gia VTV1 đến VTV9 và 250 kênh truyền hình trong nước, quốc tế." data-action="tvmate">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-600/20 text-blue-500 flex items-center justify-center text-lg flex-shrink-0">
                      <i class="fas fa-satellite-dish"></i>
                    </div>
                    <div class="overflow-hidden">
                      <h4 class="text-xs font-bold text-white truncate">VTV Go & TiviMate</h4>
                      <p class="text-[11px] text-slate-400 truncate">250+ Kênh VTV & K+ Sport</p>
                    </div>
                  </div>
                  <div class="mt-2 flex items-center justify-between text-[10px]">
                    <span class="text-slate-400">Mở kênh 0.2s</span>
                    <span class="text-emerald-400"><i class="fas fa-signal"></i> Ổn định</span>
                  </div>
                </div>

                <!-- Card 4: Stremio 4K Cinema -->
                <div class="app-item glass-card p-3 rounded-xl border border-white/10 cursor-pointer transition-all duration-200" data-index="4" data-name="Stremio 4K Cinema" data-desc="Kho phim chiếu rạp bom tấn 4K Dolby Vision, phụ đề tiếng Việt tự động chuẩn rạp tại gia." data-action="stremio">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-purple-600/20 text-purple-400 flex items-center justify-center text-lg flex-shrink-0">
                      <i class="fas fa-film"></i>
                    </div>
                    <div class="overflow-hidden">
                      <h4 class="text-xs font-bold text-white truncate">Stremio 4K Cinema</h4>
                      <p class="text-[11px] text-slate-400 truncate">Phim bom tấn &bull; Dolby Vision</p>
                    </div>
                  </div>
                  <div class="mt-2 flex items-center justify-between text-[10px]">
                    <span class="text-slate-400">Rạp phim tại gia</span>
                    <span class="text-purple-400"><i class="fas fa-crown"></i> 4K HDR</span>
                  </div>
                </div>

                <!-- Card 5: RAM Booster -->
                <div class="app-item glass-card p-3 rounded-xl border border-white/10 cursor-pointer transition-all duration-200" data-index="5" data-name="MiTV RAM Optimizer (C++20)" data-desc="Tối ưu bộ nhớ đệm, đóng băng quảng cáo Xiaomi MSA, giảm RAM từ 1.8GB về 580MB tức thì." data-action="ramclean">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-600/20 text-emerald-400 flex items-center justify-center text-lg flex-shrink-0">
                      <i class="fas fa-gauge-high"></i>
                    </div>
                    <div class="overflow-hidden">
                      <h4 class="text-xs font-bold text-white truncate">Dọn RAM Tức Thì</h4>
                      <p class="text-[11px] text-slate-400 truncate">C++ Core &bull; Giảm về 580MB</p>
                    </div>
                  </div>
                  <div class="mt-2 flex items-center justify-between text-[10px]">
                    <span class="text-emerald-400 font-bold">Bấm OK để dọn ngay</span>
                    <span class="text-orange-400"><i class="fas fa-bolt"></i> Turbo</span>
                  </div>
                </div>

              </div>

            </div>

            <!-- TV Bottom Navigation Bar -->
            <div class="px-6 py-2 bg-black/60 backdrop-blur-sm border-t border-white/5 flex items-center justify-between text-[11px] text-slate-400 z-10">
              <span>Điều khiển bằng Remote hoặc phím mũi tên: <kbd class="px-1.5 py-0.5 bg-slate-800 rounded border border-slate-700 text-slate-200">▲</kbd> <kbd class="px-1.5 py-0.5 bg-slate-800 rounded border border-slate-700 text-slate-200">▼</kbd> <kbd class="px-1.5 py-0.5 bg-slate-800 rounded border border-slate-700 text-slate-200">◄</kbd> <kbd class="px-1.5 py-0.5 bg-slate-800 rounded border border-slate-700 text-slate-200">►</kbd> và <kbd class="px-2 py-0.5 bg-orange-600 text-white rounded font-bold">Enter</kbd></span>
              <span class="text-orange-400 font-medium"><i class="fas fa-download mr-1"></i> Mã Downloader: <strong>6372800</strong></span>
            </div>

            <!-- TV App Pop-up Overlay (Modal) -->
            <div id="tvModal" class="absolute inset-0 bg-black/85 backdrop-blur-md z-30 flex items-center justify-center p-6 hidden">
              <div class="bg-slate-900 border border-slate-700 rounded-2xl max-w-lg w-full p-6 text-center shadow-2xl relative">
                <div id="modalIcon" class="w-16 h-16 rounded-2xl bg-orange-500/20 text-orange-400 mx-auto flex items-center justify-center text-3xl mb-4">
                  <i class="fab fa-youtube"></i>
                </div>
                <h3 id="modalTitle" class="text-lg font-bold text-white mb-2">Đang Khởi Chạy Ứng Dụng</h3>
                <p id="modalBody" class="text-xs text-slate-300 leading-relaxed mb-6">
                  Nội dung chi tiết của ứng dụng...
                </p>
                <div class="flex items-center justify-center gap-3">
                  <button onclick="closeModal()" class="px-5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold">
                    <i class="fas fa-arrow-left mr-1"></i> Quay lại (Back)
                  </button>
                  <button id="modalActionBtn" onclick="runAppFeature()" class="px-5 py-2 rounded-xl bg-orange-600 hover:bg-orange-500 text-white text-xs font-bold shadow-lg shadow-orange-600/30">
                    <i class="fas fa-play mr-1"></i> Trải Nghiệm Thử
                  </button>
                </div>
              </div>
            </div>

          </div>

          <!-- Xiaomi TV Chin Logo -->
          <div class="text-center pt-2">
            <span class="text-[11px] font-bold text-slate-500 tracking-widest uppercase">mi</span>
          </div>
        </div>
      </div>

      <!-- Xiaomi TV Remote Control (1 col) -->
      <div class="lg:col-span-1 flex flex-col items-center">
        <div class="bg-gradient-to-b from-slate-900 to-slate-950 p-4 rounded-3xl border-2 border-slate-700 shadow-2xl w-48 flex flex-col items-center select-none">
          
          <!-- Remote Top: Power & Mic -->
          <div class="w-full flex justify-between items-center px-2 mb-4">
            <button onclick="pressPower()" class="remote-btn w-8 h-8 rounded-full bg-red-600/30 text-red-500 flex items-center justify-center text-xs transition">
              <i class="fas fa-power-off"></i>
            </button>
            <div class="w-2 h-2 rounded-full bg-slate-600" id="remoteLed"></div>
            <button class="remote-btn w-8 h-8 rounded-full bg-slate-800 text-slate-300 flex items-center justify-center text-xs transition">
              <i class="fas fa-microphone"></i>
            </button>
          </div>

          <!-- D-Pad (Directional Pad) -->
          <div class="relative w-36 h-36 rounded-full bg-slate-800/90 border border-slate-700 p-2 shadow-inner flex items-center justify-center my-2">
            <!-- Up -->
            <button onclick="moveFocus('up')" class="remote-btn absolute top-1 left-1/2 -translate-x-1/2 w-10 h-8 rounded-t-full text-slate-300 hover:text-white flex items-center justify-center text-sm">
              <i class="fas fa-chevron-up"></i>
            </button>
            <!-- Down -->
            <button onclick="moveFocus('down')" class="remote-btn absolute bottom-1 left-1/2 -translate-x-1/2 w-10 h-8 rounded-b-full text-slate-300 hover:text-white flex items-center justify-center text-sm">
              <i class="fas fa-chevron-down"></i>
            </button>
            <!-- Left -->
            <button onclick="moveFocus('left')" class="remote-btn absolute left-1 top-1/2 -translate-y-1/2 w-8 h-10 rounded-l-full text-slate-300 hover:text-white flex items-center justify-center text-sm">
              <i class="fas fa-chevron-left"></i>
            </button>
            <!-- Right -->
            <button onclick="moveFocus('right')" class="remote-btn absolute right-1 top-1/2 -translate-y-1/2 w-8 h-10 rounded-r-full text-slate-300 hover:text-white flex items-center justify-center text-sm">
              <i class="fas fa-chevron-right"></i>
            </button>
            <!-- Center OK -->
            <button onclick="pressOk()" class="remote-btn w-14 h-14 rounded-full bg-slate-700 hover:bg-orange-600 text-white font-bold text-xs shadow-md flex items-center justify-center transition">
              OK
            </button>
          </div>

          <!-- Function Buttons (Back, Home, Menu) -->
          <div class="w-full grid grid-cols-3 gap-2 px-2 my-4">
            <button onclick="closeModal()" class="remote-btn w-10 h-10 rounded-full bg-slate-800 text-slate-300 flex items-center justify-center text-xs transition" title="Back">
              <i class="fas fa-arrow-left"></i>
            </button>
            <button onclick="closeModal(); setFocusIndex(0);" class="remote-btn w-10 h-10 rounded-full bg-slate-800 text-slate-300 flex items-center justify-center text-xs transition" title="Home">
              <i class="fas fa-house"></i>
            </button>
            <button onclick="runRamClean();" class="remote-btn w-10 h-10 rounded-full bg-slate-800 text-slate-300 flex items-center justify-center text-xs transition" title="RAM Turbo">
              <i class="fas fa-bolt text-orange-400"></i>
            </button>
          </div>

          <!-- Volume +/- -->
          <div class="w-full flex justify-between px-4 my-2">
            <button class="remote-btn w-10 h-10 rounded-xl bg-slate-800 text-slate-300 text-xs font-bold">-</button>
            <button class="remote-btn w-10 h-10 rounded-xl bg-slate-800 text-slate-300 text-xs font-bold">+</button>
          </div>

          <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-2">
            XIAOMI REMOTE
          </div>
        </div>

        <div class="text-center mt-3 text-xs text-slate-400">
          <p>Mã Downloader TV:</p>
          <span class="text-orange-400 font-mono font-bold text-sm">6372800</span>
        </div>
      </div>

    </div>
  </div>

  <script>
    let currentIndex = 0;
    const totalApps = 6;
    const cols = 3;

    function updateFocus() {
      const items = document.querySelectorAll('.app-item');
      items.forEach((item, idx) => {
        if (idx === currentIndex) {
          item.classList.add('tv-focused');
          item.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
          
          const name = item.getAttribute('data-name');
          const desc = item.getAttribute('data-desc');
          document.getElementById('activeAppName').innerText = name;
          document.getElementById('activeAppDesc').innerText = desc;
        } else {
          item.classList.remove('tv-focused');
        }
      });
      blinkLed();
    }

    function setFocusIndex(idx) {
      currentIndex = idx;
      updateFocus();
    }

    function moveFocus(dir) {
      if (dir === 'left') {
        if (currentIndex % cols > 0) currentIndex--;
      } else if (dir === 'right') {
        if (currentIndex % cols < cols - 1 && currentIndex < totalApps - 1) currentIndex++;
      } else if (dir === 'up') {
        if (currentIndex - cols >= 0) currentIndex -= cols;
      } else if (dir === 'down') {
        if (currentIndex + cols < totalApps) currentIndex += cols;
      }
      updateFocus();
    }

    function blinkLed() {
      const led = document.getElementById('remoteLed');
      led.classList.remove('bg-slate-600');
      led.classList.add('bg-orange-500');
      setTimeout(() => {
        led.classList.remove('bg-orange-500');
        led.classList.add('bg-slate-600');
      }, 150);
    }

    function pressOk() {
      blinkLed();
      const item = document.querySelectorAll('.app-item')[currentIndex];
      const action = item.getAttribute('data-action');
      const name = item.getAttribute('data-name');
      const desc = item.getAttribute('data-desc');

      if (action === 'ramclean') {
        runRamClean();
        return;
      }

      const modal = document.getElementById('tvModal');
      const title = document.getElementById('modalTitle');
      const body = document.getElementById('modalBody');
      const icon = document.getElementById('modalIcon');

      title.innerText = name;
      body.innerText = desc + " - Đã tối ưu hoàn hảo cho màn hình lớn Xiaomi TV và Remote điều khiển.";
      
      if (action === 'ytxtube') {
        icon.innerHTML = '<i class="fab fa-youtube text-red-500"></i>';
      } else if (action === 'smarttube') {
        icon.innerHTML = '<i class="fas fa-play-circle text-orange-500"></i>';
      } else if (action === 'football') {
        icon.innerHTML = '<i class="fas fa-futbol text-emerald-500"></i>';
      } else if (action === 'tvmate') {
        icon.innerHTML = '<i class="fas fa-satellite-dish text-blue-500"></i>';
      } else if (action === 'stremio') {
        icon.innerHTML = '<i class="fas fa-film text-purple-500"></i>';
      }

      modal.classList.remove('hidden');
    }

    function closeModal() {
      blinkLed();
      document.getElementById('tvModal').classList.add('hidden');
    }

    function runAppFeature() {
      alert("Đang phát luồng video 4K HDR siêu nét không quảng cáo trên Tivi Xiaomi!");
      closeModal();
    }

    function runRamClean() {
      blinkLed();
      const ramText = document.getElementById('ramText');
      ramText.innerText = "Đang tối ưu...";
      setTimeout(() => {
        ramText.innerText = "578 MB / 2048 MB (28%)";
        alert("⚡ MiTV Turbo RAM Optimizer (C++20):\n- Đã dọn dẹp cache rác: -320 MB\n- Đã đóng băng 6 dịch vụ quảng cáo ngầm Xiaomi MSA\n- RAM hiện tại: 578 MB (Cực nhẹ mượt)");
      }, 600);
    }

    function pressPower() {
      blinkLed();
      const screen = document.getElementById('tvScreen');
      if (screen.style.opacity === '0.1') {
        screen.style.opacity = '1';
      } else {
        screen.style.opacity = '0.1';
      }
    }

    window.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowUp') { e.preventDefault(); moveFocus('up'); }
      else if (e.key === 'ArrowDown') { e.preventDefault(); moveFocus('down'); }
      else if (e.key === 'ArrowLeft') { e.preventDefault(); moveFocus('left'); }
      else if (e.key === 'ArrowRight') { e.preventDefault(); moveFocus('right'); }
      else if (e.key === 'Enter') { e.preventDefault(); pressOk(); }
      else if (e.key === 'Escape') { e.preventDefault(); closeModal(); }
    });

    function updateClock() {
      const now = new Date();
      const hours = String(now.getHours()).padStart(2, '0');
      const mins = String(now.getMinutes()).padStart(2, '0');
      document.getElementById('tvClock').innerText = `${hours}:${mins}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

    document.querySelectorAll('.app-item').forEach((card, idx) => {
      card.addEventListener('click', () => {
        setFocusIndex(idx);
        pressOk();
      });
    });
  </script>
</body>
</html>
