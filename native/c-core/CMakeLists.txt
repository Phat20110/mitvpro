cmake_minimum_required(VERSION 3.16)
project(mitv_native_core VERSION 3.0.0 LANGUAGES CXX)

set(CMAKE_CXX_STANDARD 20)
set(CMAKE_CXX_STANDARD_REQUIRED ON)

include_directories(include)

set(CORE_SOURCES
    src/mitv_memory.cpp
    src/mitv_pm.cpp
    src/mitv_network.cpp
)

# Thư viện lõi tĩnh
add_library(mitv_core_static STATIC ${CORE_SOURCES})

# Ứng dụng dòng lệnh CLI độc lập
add_executable(mitv-cli src/main_cli.cpp)
target_link_libraries(mitv-cli PRIVATE mitv_core_static)

if(WIN32)
    target_link_libraries(mitv-cli PRIVATE ws2_32 psapi)
    target_link_libraries(mitv_core_static PRIVATE ws2_32 psapi)
endif()
