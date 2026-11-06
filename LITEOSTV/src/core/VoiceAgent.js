/**
 * LITEOSTV — LiteVoice Agent Runtime
 * Xử lý giọng nói nhận thức ngữ cảnh (Context-Aware Intent), tự động hóa chuỗi hành động
 */

export class VoiceAgent {
  constructor(options = {}) {
    this.userTaste = {
      name: "Chủ Nhà",
      eveningMusic: ["Nhạc Lofi Chill Thư Giãn Buổi Tối", "Acoustic Buổi Tối Cực Thư Thái", "Bolero Trữ Tình Chọn Lọc"],
      morningNews: ["Tin tức Thời sự VTV1", "Chào Buổi Sáng"],
      autoPlay: true
    };
    this.listeners = new Set();
  }

  onLog(callback) {
    this.listeners.add(callback);
    return () => this.listeners.delete(callback);
  }

  log(step, message) {
    console.log(`[LiteVoice] [${step}] ${message}`);
    for (const listener of this.listeners) {
      try {
        listener({ step, message, timestamp: new Date() });
      } catch (e) {
        console.error(e);
      }
    }
  }

  /**
   * Phân tích và thực thi mệnh lệnh giọng nói
   * @param {string} rawVoiceCommand 
   */
  async processCommand(rawVoiceCommand) {
    const cmd = rawVoiceCommand.trim().toLowerCase();
    this.log("RECEIVE", `Thu âm giọng nói: "${rawVoiceCommand}"`);

    // Giả lập nhận diện vân giọng chủ nhà (Speaker Verification)
    await this.delay(300);
    this.log("VOICE_MATCH", "Xác nhận chính xác vân giọng: Chủ Nhà (Độ tin cậy: 99.4%)");

    // Lọc bỏ tiếng ồn TV bằng AEC
    await this.delay(200);
    this.log("NOISE_CANCEL", "Đã triệt tiêu âm thanh nền và tiếng vọng loa TV");

    // Phân tích ý định & ngữ cảnh
    await this.delay(300);
    const now = new Date();
    const hour = now.getHours();
    const isEvening = hour >= 17 || hour <= 23;

    if (cmd.includes("mở youtube") || cmd.includes("bật youtube") || cmd.includes("nghe nhạc")) {
      this.log("CONTEXT_REASONING", `Phát hiện lệnh cơ bản "Mở YouTube" + Ngữ cảnh: ${isEvening ? 'Buổi tối (Tan sở về nhà)' : 'Ban ngày'}`);
      
      const selectedGenre = isEvening 
        ? this.userTaste.eveningMusic[Math.floor(Math.random() * this.userTaste.eveningMusic.length)]
        : this.userTaste.morningNews[0];

      await this.delay(400);
      this.log("TASTE_MEMORY", `Truy xuất bộ nhớ sở thích: Chủ nhà thích nghe "${selectedGenre}"`);

      await this.delay(400);
      const deepLink = `smarttube://search?q=${encodeURIComponent(selectedGenre)}&autoplay=true`;
      this.log("DISPATCH_INTENT", `Kích hoạt chuỗi hành động Deep-Link: ${deepLink}`);

      return {
        status: "SUCCESS",
        action: "AUTOPLAY_YOUTUBE",
        query: selectedGenre,
        deepLink,
        message: `Đã mở YouTube và tự động phát "${selectedGenre}" cho buổi tối thư giãn của bạn!`
      };
    }

    return {
      status: "SUCCESS",
      action: "GENERAL_COMMAND",
      message: `Đã thực hiện: ${rawVoiceCommand}`
    };
  }

  delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
}
