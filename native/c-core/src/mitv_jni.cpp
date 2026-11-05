#include "mitv_core.h"
#include <jni.h>
#include <string>

extern "C" {

JNIEXPORT jstring JNICALL
Java_com_mitvpro_engine_NativeCore_getVersion(JNIEnv* env, jclass /* clazz */) {
    return env->NewStringUTF(mitv::get_engine_version().c_str());
}

JNIEXPORT jdoubleArray JNICALL
Java_com_mitvpro_engine_NativeCore_getMemorySnapshot(JNIEnv* env, jclass /* clazz */) {
    auto stats = mitv::get_memory_stats();
    jdouble buf[6];
    buf[0] = static_cast<jdouble>(stats.total_kb);
    buf[1] = static_cast<jdouble>(stats.free_kb);
    buf[2] = static_cast<jdouble>(stats.available_kb);
    buf[3] = static_cast<jdouble>(stats.cached_kb);
    buf[4] = static_cast<jdouble>(stats.buffers_kb);
    buf[5] = stats.used_percentage;

    jdoubleArray result = env->NewDoubleArray(6);
    env->SetDoubleArrayRegion(result, 0, 6, buf);
    return result;
}

JNIEXPORT jlong JNICALL
Java_com_mitvpro_engine_NativeCore_purgeKernelCaches(JNIEnv* env, jclass /* clazz */) {
    auto report = mitv::trim_system_memory();
    return static_cast<jlong>(report.ram_freed_kb);
}

JNIEXPORT jint JNICALL
Java_com_mitvpro_engine_NativeCore_freezeBloatwareServices(JNIEnv* env, jclass /* clazz */) {
    auto report = mitv::freeze_xiaomi_bloatware();
    return static_cast<jint>(report.bloatware_disabled);
}

JNIEXPORT jdouble JNICALL
Java_com_mitvpro_engine_NativeCore_measureIptvPing(JNIEnv* env, jclass /* clazz */, jstring hostStr, jint port) {
    const char* host = env->GetStringUTFChars(hostStr, nullptr);
    auto report = mitv::test_iptv_latency("IPTV Probe", host, port);
    env->ReleaseStringUTFChars(hostStr, host);
    return report.is_reachable ? report.latency_ms : -1.0;
}

} // extern "C"
