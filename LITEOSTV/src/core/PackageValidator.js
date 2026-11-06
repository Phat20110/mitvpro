/**
 * LITEOSTV — PackageValidator
 * Kiểm tra tính hợp lệ và an toàn của tệp manifest/theme trước khi nạp vào hệ thống
 */

export class PackageValidator {
  static REQUIRED_MANIFEST_FIELDS = ['id', 'name', 'version', 'author', 'tokens'];

  /**
   * Thẩm định đối tượng theme
   * @param {Object} data 
   * @returns {{valid: boolean, errors: string[]}}
   */
  static validate(data) {
    const errors = [];

    if (!data || typeof data !== 'object') {
      return { valid: false, errors: ['Dữ liệu gói theme phải là một đối tượng JSON hợp lệ.'] };
    }

    for (const field of this.REQUIRED_MANIFEST_FIELDS) {
      if (!data[field]) {
        errors.push(`Thiếu trường bắt buộc trong manifest: "${field}".`);
      }
    }

    if (data.tokens && typeof data.tokens === 'object') {
      // Kiểm tra các token không chứa mã độc (script injection / XSS)
      for (const [key, val] of Object.entries(data.tokens)) {
        if (typeof val === 'string' && (val.includes('<script') || val.includes('javascript:') || val.includes('url(data:'))) {
          errors.push(`Token "${key}" chứa giá trị không an toàn: "${val}".`);
        }
      }
    } else {
      errors.push('Trường "tokens" phải là một object chứa các biến CSS.');
    }

    return {
      valid: errors.length === 0,
      errors
    };
  }
}
