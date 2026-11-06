/**
 * LITEOSTV — RemoteNavigator Runtime
 * Điều phối D-Pad TV vật lý, âm thanh phản hồi UI, tuân thủ 100% không dùng chuột ảo.
 */

export class RemoteNavigator {
  constructor(options = {}) {
    this.focusSelector = options.focusSelector || '[tabindex="0"], button, .focusable';
    this.currentFocused = null;
    this.audioCtx = null;
    this.soundEnabled = options.soundEnabled !== false;
    this.initAudio();
    this.bindEvents();
  }

  initAudio() {
    try {
      const AudioContext = window.AudioContext || window.webkitAudioContext;
      if (AudioContext) {
        this.audioCtx = new AudioContext();
      }
    } catch (e) {
      console.warn("[RemoteNavigator] Web Audio API không được hỗ trợ.");
    }
  }

  playFocusSound() {
    if (!this.soundEnabled || !this.audioCtx) return;
    if (this.audioCtx.state === 'suspended') {
      this.audioCtx.resume();
    }
    const osc = this.audioCtx.createOscillator();
    const gain = this.audioCtx.createGain();
    osc.type = 'sine';
    osc.frequency.setValueAtTime(800, this.audioCtx.currentTime);
    osc.frequency.exponentialRampToValueAtTime(400, this.audioCtx.currentTime + 0.04);
    gain.gain.setValueAtTime(0.12, this.audioCtx.currentTime);
    gain.gain.exponentialRampToValueAtTime(0.001, this.audioCtx.currentTime + 0.04);
    osc.connect(gain);
    gain.connect(this.audioCtx.destination);
    osc.start();
    osc.stop(this.audioCtx.currentTime + 0.04);
  }

  playSelectSound() {
    if (!this.soundEnabled || !this.audioCtx) return;
    if (this.audioCtx.state === 'suspended') {
      this.audioCtx.resume();
    }
    const osc = this.audioCtx.createOscillator();
    const gain = this.audioCtx.createGain();
    osc.type = 'triangle';
    osc.frequency.setValueAtTime(520, this.audioCtx.currentTime);
    osc.frequency.exponentialRampToValueAtTime(1040, this.audioCtx.currentTime + 0.08);
    gain.gain.setValueAtTime(0.2, this.audioCtx.currentTime);
    gain.gain.exponentialRampToValueAtTime(0.001, this.audioCtx.currentTime + 0.08);
    osc.connect(gain);
    gain.connect(this.audioCtx.destination);
    osc.start();
    osc.stop(this.audioCtx.currentTime + 0.08);
  }

  bindEvents() {
    window.addEventListener('keydown', (e) => this.handleKeyDown(e));
  }

  handleKeyDown(e) {
    const key = e.key;
    const focusables = Array.from(document.querySelectorAll(this.focusSelector))
      .filter(el => el.offsetParent !== null && !el.disabled);

    if (focusables.length === 0) return;

    if (!this.currentFocused || !focusables.includes(this.currentFocused)) {
      this.setFocus(focusables[0]);
      return;
    }

    const currentIndex = focusables.indexOf(this.currentFocused);
    let nextIndex = -1;

    switch (key) {
      case 'ArrowRight':
        nextIndex = (currentIndex + 1) % focusables.length;
        e.preventDefault();
        break;
      case 'ArrowLeft':
        nextIndex = (currentIndex - 1 + focusables.length) % focusables.length;
        e.preventDefault();
        break;
      case 'ArrowDown':
        nextIndex = this.findNearestVertical(this.currentFocused, focusables, 'down');
        e.preventDefault();
        break;
      case 'ArrowUp':
        nextIndex = this.findNearestVertical(this.currentFocused, focusables, 'up');
        e.preventDefault();
        break;
      case 'Enter':
        this.playSelectSound();
        this.currentFocused.click();
        e.preventDefault();
        break;
      case 'Escape':
      case 'Backspace':
        // Xử lý phím Back trên remote TV
        const backBtn = document.querySelector('[data-action="back"]');
        if (backBtn) {
          backBtn.click();
          e.preventDefault();
        }
        break;
    }

    if (nextIndex !== -1 && focusables[nextIndex]) {
      this.setFocus(focusables[nextIndex]);
      this.playFocusSound();
    }
  }

  findNearestVertical(current, candidates, direction) {
    const rectA = current.getBoundingClientRect();
    let best = -1;
    let minDistance = Infinity;

    candidates.forEach((cand, idx) => {
      if (cand === current) return;
      const rectB = cand.getBoundingClientRect();
      const isVerticalMatch = direction === 'down' ? rectB.top >= rectA.bottom - 10 : rectB.bottom <= rectA.top + 10;

      if (isVerticalMatch) {
        const dx = (rectA.left + rectA.width / 2) - (rectB.left + rectB.width / 2);
        const dy = (rectA.top + rectA.height / 2) - (rectB.top + rectB.height / 2);
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < minDistance) {
          minDistance = dist;
          best = idx;
        }
      }
    });

    return best !== -1 ? best : candidates.indexOf(current);
  }

  setFocus(element) {
    if (this.currentFocused) {
      this.currentFocused.classList.remove('tv-focused');
    }
    this.currentFocused = element;
    element.classList.add('tv-focused');
    element.focus();
    element.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
  }
}
