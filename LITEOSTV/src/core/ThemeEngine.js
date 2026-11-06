/**
 * LITEOSTV — ThemeEngine Runtime (HyperOS Color & Liquid Glass)
 * Quản lý trạng thái theme, trích xuất màu Monet, inject biến CSS trực tiếp vào :root
 */

export class ThemeEngine {
  constructor() {
    this.currentTheme = null;
    this.installedThemes = new Map();
    this.listeners = new Set();
  }

  /**
   * Đăng ký gói theme vào bộ nhớ
   */
  registerTheme(themeData) {
    if (!themeData || !themeData.id) {
      throw new Error("Dữ liệu theme không hợp lệ: thiếu id.");
    }
    this.installedThemes.set(themeData.id, themeData);
  }

  /**
   * Kích hoạt và áp dụng theme ngay lập tức (Hot-Reload)
   */
  applyTheme(themeId) {
    const theme = this.installedThemes.get(themeId);
    if (!theme) {
      console.warn(`[ThemeEngine] Không tìm thấy theme id: ${themeId}. Áp dụng fallback.`);
      return false;
    }

    const root = document.documentElement;
    const tokens = theme.tokens || {};

    // Ghi đè toàn bộ biến CSS token vào :root
    for (const [key, value] of Object.entries(tokens)) {
      root.style.setProperty(key, value);
    }

    this.currentTheme = theme;
    this.notifyListeners(theme);
    console.log(`[ThemeEngine] Đã kích hoạt thành công theme: ${theme.name} (${theme.id})`);
    return true;
  }

  /**
   * Trích xuất và pha trộn màu Monet động phong cách HyperOS Color
   */
  setAccentColor(hexColor, glowColor = null) {
    const root = document.documentElement;
    root.style.setProperty('--accent', hexColor);
    if (glowColor) {
      root.style.setProperty('--accent-glow', glowColor);
    } else {
      root.style.setProperty('--accent-glow', `${hexColor}73`);
    }
    console.log(`[ThemeEngine] Đã cập nhật HyperOS Accent Color: ${hexColor}`);
  }

  /**
   * Đăng ký lắng nghe sự kiện thay đổi theme
   */
  onThemeChange(callback) {
    this.listeners.add(callback);
    return () => this.listeners.delete(callback);
  }

  notifyListeners(theme) {
    for (const listener of this.listeners) {
      try {
        listener(theme);
      } catch (err) {
        console.error("[ThemeEngine] Lỗi trong listener:", err);
      }
    }
  }

  getCurrentTheme() {
    return this.currentTheme;
  }

  listInstalled() {
    return Array.from(this.installedThemes.values());
  }
}
