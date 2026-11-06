/**
 * MiTV Pro - Frontend Interactions
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Toggle
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('open');
            const icon = menuToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            }
        });
    }

    // 2. Scroll to top button visibility
    const btnTop = document.getElementById('btnScrollTop');
    window.addEventListener('scroll', () => {
        if (btnTop) {
            if (window.scrollY > 350) {
                btnTop.classList.add('visible');
            } else {
                btnTop.classList.remove('visible');
            }
        }
    });

    if (btnTop) {
        btnTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // 3. One-Click Copy Downloader Code
    window.copyDownloaderCode = function(code) {
        if (!code) code = '6372800';
        navigator.clipboard.writeText(code).then(() => {
            showToast(`Đã sao chép mã [ ${code} ] vào bộ nhớ đệm!`);
        }).catch(err => {
            // Fallback
            const textArea = document.createElement("textarea");
            textArea.value = code;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("copy");
            document.body.removeChild(textArea);
            showToast(`Đã sao chép mã [ ${code} ]!`);
        });
    };

    // 4. Toast Notification
    function showToast(message) {
        let toast = document.getElementById('appToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'appToast';
            toast.style.position = 'fixed';
            toast.style.bottom = '28px';
            toast.style.left = '50%';
            toast.style.transform = 'translateX(-50%)';
            toast.style.background = '#FF6700';
            toast.style.color = '#fff';
            toast.style.padding = '12px 24px';
            toast.style.borderRadius = '50px';
            toast.style.fontWeight = '700';
            toast.style.fontSize = '0.9rem';
            toast.style.boxShadow = '0 8px 24px rgba(255,103,0,0.4)';
            toast.style.zIndex = '99999';
            toast.style.transition = 'all 0.3s ease';
            document.body.appendChild(toast);
        }
        toast.innerHTML = `<i class="fas fa-check-circle"></i> ${message}`;
        toast.style.opacity = '1';
        toast.style.display = 'block';

        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => { toast.style.display = 'none'; }, 300);
        }, 2600);
    }

    // 5. Interactive Xiaomi TV Model Checker
    const modelForm = document.getElementById('modelCheckerForm');
    if (modelForm) {
        modelForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const inputVal = document.getElementById('tvModelInput').value.trim();
            const resultBox = document.getElementById('checkerResult');

            if (!inputVal) {
                showToast('Vui lòng nhập tên hoặc mã model Tivi Xiaomi');
                return;
            }

            // Gửi dữ liệu tới API xử lý
            fetch('api/check-model.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `model=${encodeURIComponent(inputVal)}`
            })
            .then(res => res.json())
            .then(data => {
                if (resultBox) {
                    resultBox.style.display = 'block';
                    resultBox.innerHTML = `
                        <div style="border-left: 4px solid #FF6700; padding-left: 16px;">
                            <h4 style="font-size:1.15rem; margin-bottom: 8px; color: #FF6700;">
                                <i class="fas fa-microchip"></i> Kết Quả Phân Tích: ${data.model}
                            </h4>
                            <p style="color: #D1D1E6; margin-bottom: 8px;"><strong>Hệ điều hành / Chip:</strong> ${data.system_type}</p>
                            <p style="color: #D1D1E6; margin-bottom: 8px;"><strong>Đánh giá RAM/Bộ nhớ:</strong> ${data.memory_status}</p>
                            <p style="color: #9E9EB8; margin-bottom: 12px; line-height: 1.6;">${data.recommendation}</p>
                            <div style="background: rgba(255,103,0,0.1); border: 1px dashed #FF6700; padding: 12px; border-radius: 8px;">
                                <span style="font-weight:700; color:#FF6700;">Gói tối ưu khuyên dùng:</span> ${data.package_advice}
                                <br><small style="color:#9E9EB8;">Mã tải nhanh trên Downloader: <strong style="color:#fff;">${data.downloader_code}</strong></small>
                            </div>
                        </div>
                    `;
                    resultBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            })
            .catch(() => {
                showToast('Có lỗi xảy ra khi kiểm tra model, vui lòng thử lại');
            });
        });
    }

    // 6. Accordion FAQs
    const faqItems = document.querySelectorAll('.faq-accordion-item');
    faqItems.forEach(item => {
        const header = item.querySelector('.faq-header');
        if (header) {
            header.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(i => i.classList.remove('active'));
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        }
    });
});
