package com.mitvpro.engine;

/**
 * MiTV Pro Native Core Engine - Java Native Interface (JNI) Bridge
 * Kết nối trực tiếp tầng ứng dụng Android TV tới lõi C++20 và Rust
 */
public class NativeCore {

    static {
        try {
            System.loadLibrary("mitv_core");
        } catch (UnsatisfiedLinkError e) {
            // Khi chạy trên môi trường test không có .so, sử dụng fallback an toàn
            System.err.println("[MiTV Pro] Lưu ý: Đang chạy chế độ mô phỏng (Simulation Mode)");
        }
    }

    /**
     * Lấy chuỗi phiên bản từ mã nguồn C++ native
     */
    public static native String getVersion();

    /**
     * Chụp nhanh bức tranh bộ nhớ RAM từ nhân Linux /proc/meminfo
     * Trả về mảng 6 phần tử: [Total, Free, Available, Cached, Buffers, UsedPercentage]
     */
    public static native double[] getMemorySnapshot();

    /**
     * Yêu cầu dọn dẹp cache kernel cấp hệ thống
     * Trả về số byte RAM đã được thu hồi
     */
    public static native long purgeKernelCaches();

    /**
     * Đóng băng (Disable) danh sách bloatware quảng cáo của Xiaomi
     * Trả về số lượng gói dịch vụ đã bị vô hiệu hóa
     */
    public static native int freezeBloatwareServices();

    /**
     * Đo độ trễ kết nối TCP Socket tới máy chủ phát sóng VTV1, K+ Sport, HBO
     * Trả về độ trễ tính bằng mili-giây (ms)
     */
    public static native double measureIptvPing(String host, int port);

    // ==========================================
    // CÁC HÀM TIỆN ÍCH DÀNH CHO GIAO DIỆN TIVI
    // ==========================================

    public static String formatMemorySize(long kb) {
        if (kb >= 1024 * 1024) {
            return String.format("%.2f GB", (double) kb / (1024 * 1024));
        } else if (kb >= 1024) {
            return String.format("%.1f MB", (double) kb / 1024);
        }
        return kb + " KB";
    }
}
