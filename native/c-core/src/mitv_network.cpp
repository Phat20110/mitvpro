#include "mitv_core.h"
#include <chrono>
#include <cstring>

#ifdef _WIN32
#include <winsock2.h>
#include <ws2tcpip.h>
#pragma comment(lib, "ws2_32.lib")
#else
#include <sys/types.h>
#include <sys/socket.h>
#include <netdb.h>
#include <unistd.h>
#include <fcntl.h>
#endif

namespace mitv {

IptvLatencyReport test_iptv_latency(const std::string& server_name, const std::string& host, int port) {
    IptvLatencyReport report;
    report.server_name = server_name;
    report.host = host;
    report.port = port;
    report.is_reachable = false;
    report.latency_ms = 999.0;
    report.quality_rating = "MẤT KẾT NỐI";

#ifdef _WIN32
    WSADATA wsaData;
    if (WSAStartup(MAKEWORD(2, 2), &wsaData) != 0) {
        return report;
    }
#endif

    struct addrinfo hints, *res;
    std::memset(&hints, 0, sizeof(hints));
    hints.ai_family = AF_INET;
    hints.ai_socktype = SOCK_STREAM;

    std::string portStr = std::to_string(port);
    auto startResolve = std::chrono::high_resolution_clock::now();

    if (getaddrinfo(host.c_str(), portStr.c_str(), &hints, &res) != 0) {
#ifdef _WIN32
        WSACleanup();
#endif
        return report;
    }

#ifdef _WIN32
    SOCKET sock = socket(res->ai_family, res->ai_socktype, res->ai_protocol);
    if (sock == INVALID_SOCKET) {
        freeaddrinfo(res);
        WSACleanup();
        return report;
    }
    // Set non-blocking
    u_long mode = 1;
    ioctlsocket(sock, FIONBIO, &mode);
#else
    int sock = socket(res->ai_family, res->ai_socktype, res->ai_protocol);
    if (sock < 0) {
        freeaddrinfo(res);
        return report;
    }
    int flags = fcntl(sock, F_GETFL, 0);
    fcntl(sock, F_SETFL, flags | O_NONBLOCK);
#endif

    auto startConnect = std::chrono::high_resolution_clock::now();
    connect(sock, res->ai_addr, (int)res->ai_addrlen);

    fd_set fdwrite;
    FD_ZERO(&fdwrite);
    FD_SET(sock, &fdwrite);

    struct timeval tv;
    tv.tv_sec = 2; // Timeout 2s
    tv.tv_usec = 0;

    int sel = select((int)sock + 1, nullptr, &fdwrite, nullptr, &tv);
    auto endConnect = std::chrono::high_resolution_clock::now();

    if (sel > 0 && FD_ISSET(sock, &fdwrite)) {
        std::chrono::duration<double, std::milli> duration = endConnect - startConnect;
        report.latency_ms = duration.count();
        report.is_reachable = true;

        if (report.latency_ms < 30.0) {
            report.quality_rating = "XUẤT SẮC (4K 60FPS mượt mà)";
        } else if (report.latency_ms < 75.0) {
            report.quality_rating = "TỐT (Full HD ổn định)";
        } else if (report.latency_ms < 150.0) {
            report.quality_rating = "TRUNG BÌNH";
        } else {
            report.quality_rating = "ĐỘ TRỄ CAO (Dễ xoay vòng)";
        }
    }

#ifdef _WIN32
    closesocket(sock);
    freeaddrinfo(res);
    WSACleanup();
#else
    close(sock);
    freeaddrinfo(res);
#endif

    return report;
}

} // namespace mitv
