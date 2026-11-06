//! Multi-Action Key State Machine in 100% Safe Rust
//! Supports: Single Click, Double Click, and Long Press for Android TV Remote Keys.

use std::time::{Duration, Instant};

#[derive(Debug, Clone, Copy, PartialEq, Eq)]
pub enum KeyAction {
    SinglePress,     // Chế độ 1: Nhấn 1 lần bình thường (Tắt màn hình / Screen Off Audio-Only)
    DoublePress,     // Chế độ 2: Nhấn 2 lần liên tiếp (Dọn sạch RAM tức thì / Turbo Boost)
    LongPress,       // Chế độ 3: Nhấn giữ (Menu Nguồn Nâng Cao / Liquid Glass Power Sheet)
    None,
}

pub struct MultiActionKeyEngine {
    double_click_threshold: Duration,
    long_press_threshold: Duration,
    press_start_time: Option<Instant>,
    last_release_time: Option<Instant>,
    click_count: u32,
    is_long_pressed_dispatched: bool,
}

impl MultiActionKeyEngine {
    pub fn new() -> Self {
        Self {
            double_click_threshold: Duration::from_millis(350),
            long_press_threshold: Duration::from_millis(1200),
            press_start_time: None,
            last_release_time: None,
            click_count: 0,
            is_long_pressed_dispatched: false,
        }
    }

    /// Gọi khi nhận sự kiện KEY_DOWN từ Remote TV
    pub fn on_key_down(&mut self) -> KeyAction {
        let now = Instant::now();
        if self.press_start_time.is_none() {
            self.press_start_time = Some(now);
            self.is_long_pressed_dispatched = false;
        }

        // Kiểm tra giữ phím (Long Press)
        if let Some(start) = self.press_start_time {
            if now.duration_since(start) >= self.long_press_threshold && !self.is_long_pressed_dispatched {
                self.is_long_pressed_dispatched = true;
                self.click_count = 0;
                return KeyAction::LongPress;
            }
        }

        KeyAction::None
    }

    /// Gọi khi nhận sự kiện KEY_UP từ Remote TV
    pub fn on_key_up(&mut self) -> KeyAction {
        let now = Instant::now();
        self.press_start_time = None;

        if self.is_long_pressed_dispatched {
            self.is_long_pressed_dispatched = false;
            self.click_count = 0;
            return KeyAction::None;
        }

        self.click_count += 1;

        if self.click_count == 2 {
            if let Some(last_release) = self.last_release_time {
                if now.duration_since(last_release) <= self.double_click_threshold {
                    self.click_count = 0;
                    self.last_release_time = None;
                    return KeyAction::DoublePress;
                }
            }
            self.click_count = 1;
        }

        self.last_release_time = Some(now);
        KeyAction::None
    }

    /// Gọi định kỳ (tick) để xác định Single Click khi hết thời gian chờ Double Click
    pub fn tick(&mut self) -> KeyAction {
        if self.click_count == 1 {
            if let Some(last_release) = self.last_release_time {
                if last_release.elapsed() > self.double_click_threshold {
                    self.click_count = 0;
                    self.last_release_time = None;
                    return KeyAction::SinglePress;
                }
            }
        }
        KeyAction::None
    }
}
