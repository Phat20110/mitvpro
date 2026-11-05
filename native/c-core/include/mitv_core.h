#ifndef MITV_CORE_H
#define MITV_CORE_H

#include <string>
#include <vector>
#include <cstdint>

namespace mitv {

/**
 * Thống kê chi tiết bộ nhớ RAM từ nhân hệ điều hành Linux / Android Kernel
 */
struct MemoryStats {
    uint64_t total_kb;
    uint64_t free_kb;
    uint64_t available_kb;
    uint64_t cached_kb;
    uint64_t buffers_kb;
    double used_percentage;
};

/**
 * Thông tin tiến trình đang tiêu thụ tài nguyên trên TV
 */
struct ProcessInfo {
    int pid;
    std::string name;
    uint64_t vm_rss_kb;
    int oom_score;
    bool is_bloatware;
};

/**
 * Báo cáo kết quả tối ưu hệ thống
 */
struct OptimizationReport {
    uint64_t ram_freed_kb;
    int processes_terminated;
    int bloatware_disabled;
    std::vector<std::string> disabled_packages;
    bool success;
    std::string message;
};

/**
 * Kết quả đo độ trễ mạng tới máy chủ truyền hình & bóng đá
 */
struct IptvLatencyReport {
    std::string server_name;
    std::string host;
    int port;
    double latency_ms;
    std::string quality_rating; // "XUẤT SẮC (<20ms)", "MƯỢT MÀ (<60ms)", "BÌNH THƯỜNG", "LAG/TRỄ"
    bool is_reachable;
};

// ==========================================
// CÁC HÀM CỐT LÕI NATIVE (CORE API)
// ==========================================

/**
 * Đọc trực tiếp từ /proc/meminfo để lấy số liệu RAM chính xác không qua máy ảo Java
 */
MemoryStats get_memory_stats();

/**
 * Thực thi dọn dẹp bộ nhớ đệm phân vùng hệ thống (drop_caches & trim-caches)
 */
OptimizationReport trim_system_memory();

/**
 * Quét danh sách các tiến trình chạy ngầm ngốn RAM nhất trên Tivi
 */
std::vector<ProcessInfo> get_top_memory_processes(size_t limit = 10);

/**
 * Đóng băng (Disable) danh sách các ứng dụng quảng cáo và thu thập dữ liệu ngầm của Xiaomi
 */
OptimizationReport freeze_xiaomi_bloatware();

/**
 * Kiểm tra tốc độ kết nối socket TCP tới các CDN phát sóng VTV1, K+, HBO
 */
IptvLatencyReport test_iptv_latency(const std::string& server_name, const std::string& host, int port = 80);

/**
 * Lấy chuỗi phiên bản của Native Core Engine
 */
std::string get_engine_version();

} // namespace mitv

#endif // MITV_CORE_H
