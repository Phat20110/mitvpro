#include "mitv_core.h"
#include <iostream>
#include <iomanip>
#include <string>

void print_banner() {
    std::cout << "\033[1;33m"
              << "======================================================================\n"
              << "   📺 MiTV PRO NATIVE CORE ENGINE v3.0 (C++20 / JNI Architecture)   \n"
              << "        Hệ Thống Tối Ưu Hóa & Giải Phóng RAM Chuyên Biệt Xiaomi TV    \n"
              << "======================================================================\n"
              << "\033[0m";
}

void print_memory_status(const mitv::MemoryStats& stats) {
    std::cout << "\n[+] THỐNG KÊ BỘ NHỚ NHÂN HỆ THỐNG:\n"
              << "  - Tổng dung lượng RAM   : " << (stats.total_kb / 1024) << " MB (" << stats.total_kb << " KB)\n"
              << "  - RAM Khả dụng (Avail)  : " << (stats.available_kb / 1024) << " MB\n"
              << "  - RAM Còn trống (Free)  : " << (stats.free_kb / 1024) << " MB\n"
              << "  - Bộ nhớ đệm (Cached)   : " << (stats.cached_kb / 1024) << " MB\n"
              << "  - Tỷ lệ sử dụng         : \033[1;" 
              << (stats.used_percentage > 80.0 ? "31m" : (stats.used_percentage > 60.0 ? "33m" : "32m"))
              << std::fixed << std::setprecision(1) << stats.used_percentage << "%\033[0m\n";
}

void run_iptv_diagnostics() {
    std::cout << "\n[+] KIỂM TRA ĐỘ TRỄ MẠNG TRUYỀN HÌNH & BÓNG ĐÁ (TCP SOCKETS):\n";
    std::vector<std::pair<std::string, std::pair<std::string, int>>> targets = {
        {"VTV1 HD Streaming CDN (Hà Nội)", {"vtv.vn", 80}},
        {"K+ Sport Live CDN (TP.HCM)", {"fptplay.vn", 80}},
        {"Cloudflare Anycast DNS (1.1.1.1)", {"1.1.1.1", 80}},
        {"Google Primary DNS (8.8.8.8)", {"8.8.8.8", 53}}
    };

    for (const auto& t : targets) {
        auto res = mitv::test_iptv_latency(t.first, t.second.first, t.second.second);
        std::cout << "  * " << std::left << std::setw(34) << res.server_name << " -> ";
        if (res.is_reachable) {
            std::cout << "\033[1;32m" << std::fixed << std::setprecision(1) << res.latency_ms << " ms\033[0m (" 
                      << res.quality_rating << ")\n";
        } else {
            std::cout << "\033[1;31mTIMEOUT / KHÔNG KẾT NỐI ĐƯỢC\033[0m\n";
        }
    }
}

int main(int argc, char* argv[]) {
    print_banner();

    std::string mode = (argc > 1) ? argv[1] : "--auto";

    if (mode == "--status") {
        auto stats = mitv::get_memory_stats();
        print_memory_status(stats);
    } else if (mode == "--iptv") {
        run_iptv_diagnostics();
    } else if (mode == "--freeze") {
        std::cout << "\n[+] ĐANG ĐÓNG BĂNG TIẾN TRÌNH QUẢNG CÁO XIAOMI...\n";
        auto report = mitv::freeze_xiaomi_bloatware();
        std::cout << "  -> " << report.message << "\n";
        std::cout << "  -> Ước tính thu hồi: " << (report.ram_freed_kb / 1024) << " MB RAM.\n";
    } else if (mode == "--top") {
        std::cout << "\n[+] TOP 8 TIẾN TRÌNH TIÊU THỤ RAM NHIỀU NHẤT:\n";
        auto procs = mitv::get_top_memory_processes(8);
        for (const auto& p : procs) {
            std::cout << "  - [PID " << std::setw(5) << p.pid << "] " 
                      << std::left << std::setw(28) << p.name 
                      << " : " << (p.vm_rss_kb / 1024) << " MB "
                      << (p.is_bloatware ? " \033[1;31m[BLOATWARE]\033[0m" : "") << "\n";
        }
    } else {
        // Full auto optimize
        std::cout << "\n[>>> BẮT ĐẦU QUY TRÌNH TỐI ƯU HÓA TOÀN DIỆN TIVI XIAOMI <<<]\n";

        std::cout << "\n[1/4] Đọc thông số bộ nhớ hiện tại...";
        auto before = mitv::get_memory_stats();
        std::cout << " Đang dùng: " << std::fixed << std::setprecision(1) << before.used_percentage << "%\n";

        std::cout << "[2/4] Dọn dẹp cache phân vùng kernel hệ thống...";
        auto trimReport = mitv::trim_system_memory();
        std::cout << " Thu hồi: " << (trimReport.ram_freed_kb / 1024) << " MB\n";

        std::cout << "[3/4] Đóng băng toàn bộ dịch vụ quảng cáo ngầm Xiaomi...";
        auto freezeReport = mitv::freeze_xiaomi_bloatware();
        std::cout << " Đã khóa " << freezeReport.bloatware_disabled << " gói dịch vụ.\n";

        std::cout << "[4/4] Đo lường đường truyền IPTV xem bóng đá & VTV1...\n";
        run_iptv_diagnostics();

        auto after = mitv::get_memory_stats();
        std::cout << "\n\033[1;32m======================================================================\n"
                  << "   [THÀNH CÔNG] TIVI ĐÃ ĐƯỢC TỐI ƯU HÓA HOÀN HẢO!                   \n"
                  << "   - RAM Giải Phóng Tổng Cộng : ~" << ((trimReport.ram_freed_kb + freezeReport.ram_freed_kb) / 1024) << " MB\n"
                  << "   - Trạng Thái Tivi          : MƯỢT MÀ, SẴN SÀNG XEM PHIM 4K & BÓNG ĐÁ\n"
                  << "======================================================================\033[0m\n";
    }

    return 0;
}
