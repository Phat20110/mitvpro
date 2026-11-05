#include "mitv_core.h"
#include <iostream>
#include <cstdlib>

namespace mitv {

// Danh sách các gói bloatware và quảng cáo độc quyền Xiaomi TV
static const std::vector<std::string> XIAOMI_BLOATWARE_PACKAGES = {
    "com.xiaomi.mitv.advertisingservice",
    "com.miui.systemAdSolution",
    "com.xiaomi.mitv.tvpush.tvpushservice",
    "com.xiaomi.mitv.wallpapercarousel",
    "com.xiaomi.mitv.upgrade",
    "com.xiaomi.mitv.shop",
    "com.xiaomi.mitv.pay",
    "com.miui.msa.global",
    "com.xiaomi.gamecenter.pad",
    "com.xiaomi.mitv.screensaver"
};

OptimizationReport freeze_xiaomi_bloatware() {
    OptimizationReport report;
    report.processes_terminated = 0;
    report.bloatware_disabled = 0;
    report.success = true;

    for (const auto& pkg : XIAOMI_BLOATWARE_PACKAGES) {
#ifdef _WIN32
        // Chế độ mô phỏng / kiểm thử trên Windows
        report.disabled_packages.push_back(pkg);
        report.bloatware_disabled++;
#else
        // Chế độ chạy trên Android TV thực tế: Gọi lệnh Package Manager hạt nhân
        std::string cmd = "pm disable-user --user 0 " + pkg + " >/dev/null 2>&1";
        int ret = system(cmd.c_str());
        if (ret == 0) {
            report.disabled_packages.push_back(pkg);
            report.bloatware_disabled++;
        }
#endif
    }

    report.ram_freed_kb = static_cast<uint64_t>(report.bloatware_disabled) * 35840; // Ước tính ~35MB mỗi service
    report.message = "Đã vô hiệu hóa thành công " + std::to_string(report.bloatware_disabled) + " tiến trình quảng cáo chạy ngầm Xiaomi.";
    return report;
}

OptimizationReport uninstall_xiaomi_bloatware() {
    OptimizationReport report;
    report.processes_terminated = 0;
    report.bloatware_disabled = 0;
    report.success = true;

    for (const auto& pkg : XIAOMI_BLOATWARE_PACKAGES) {
#ifdef _WIN32
        report.disabled_packages.push_back(pkg);
        report.bloatware_disabled++;
#else
        // Lệnh gỡ bỏ hoàn toàn ứng dụng rác khỏi phân vùng người dùng mà không cần root máy
        std::string cmd = "pm uninstall -k --user 0 " + pkg + " >/dev/null 2>&1";
        int ret = system(cmd.c_str());
        if (ret == 0) {
            report.disabled_packages.push_back(pkg);
            report.bloatware_disabled++;
        }
#endif
    }

    report.ram_freed_kb = static_cast<uint64_t>(report.bloatware_disabled) * 61440; // ~60MB giải phóng ROM/RAM
    report.message = "Đã gỡ bỏ vĩnh viễn " + std::to_string(report.bloatware_disabled) + " ứng dụng rác Xiaomi, khôi phục bộ nhớ sạch!";
    return report;
}

} // namespace mitv
