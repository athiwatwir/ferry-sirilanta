// Loading Control Functions
class LoadingManager {
    constructor() {
        this.overlay = $('#loading-overlay');
        this.isLoading = false;
        this.autoHideTimer = null;
        this.maxLoadingTime = 10000; // 30 วินาที - timeout เพื่อป้องกัน loading ค้าง
        this.timeoutTimer = null;
    }

    // แสดง Loading
    show(text = 'Loading...', subtext = 'please wait') {
        if (this.autoHideTimer) {
            clearTimeout(this.autoHideTimer);
            this.autoHideTimer = null;
        }

        // อัพเดทข้อความ
        $('.loading-text').text(text);
        $('.loading-subtext').text(subtext);

        // แสดง Loading
        this.overlay.removeClass('hidden');
        this.isLoading = true;

        // ป้องกันการ scroll
        $('body').addClass('loading-active');

        // ตั้ง timeout เพื่อป้องกัน loading ค้าง
        if (this.timeoutTimer) {
            clearTimeout(this.timeoutTimer);
        }
        this.timeoutTimer = setTimeout(() => {
            console.warn('Loading timeout - auto hiding');
            this.hide();
        }, this.maxLoadingTime);
    }

    // ซ่อน Loading
    hide(delay = 0) {
        if (delay > 0) {
            this.autoHideTimer = setTimeout(() => {
                this._performHide();
            }, delay);
        } else {
            this._performHide();
        }
    }

    _performHide() {
        this.overlay.addClass('hidden');
        this.isLoading = false;

        // เอา class ป้องกันการ scroll ออก
        $('body').removeClass('loading-active');

        if (this.autoHideTimer) {
            clearTimeout(this.autoHideTimer);
            this.autoHideTimer = null;
        }

        if (this.timeoutTimer) {
            clearTimeout(this.timeoutTimer);
            this.timeoutTimer = null;
        }
    }

    // ตรวจสอบสถานะ
    isShowing() {
        return this.isLoading;
    }

    // แสดง Loading สำหรับ AJAX
    showForAjax() {
        this.show('Loading...', 'please wait');
    }

    // แสดง Loading สำหรับการส่งฟอร์ม
    showForForm() {
        this.show('Loading...', 'please wait,do not close windows');
    }

    // แสดง Loading สำหรับการอัพโหลดไฟล์
    showForUpload() {
        this.show('Loading...', 'please wait,do not close windows');
    }
}

// สร้าง Instance
const loading = new LoadingManager();

// ฟังก์ชั่นสำหรับใช้งานง่าย
window.showLoading = function (text, subtext) {
    loading.show(text, subtext);
};

window.hideLoading = function (delay = 0) {
    loading.hide(delay);
};

// jQuery Document Ready
$(document).ready(function () {
    // ตรวจสอบสถานะหน้าเว็บก่อน - ถ้าโหลดเสร็จแล้วให้ซ่อน loading ทันที
    if (document.readyState === 'complete') {
        setTimeout(() => {
            loading.hide();
        }, 100);
    } else {
        // ซ่อน Loading หลังจากโหลดหน้าเสร็จ
        $(window).on('load', function () {
            setTimeout(() => {
                loading.hide();
            }, 500); // รอ 0.5 วินาที แล้วค่อยซ่อน
        });
    }

    // แสดง Loading เมื่อมีการ submit form
    $('form').on('submit', function (e) {
        // ตรวจสอบว่า form ไม่ใช่ AJAX form
        const form = $(this);
        const isAjaxForm = form.data('ajax') === true || form.attr('data-ajax') === 'true';

        if (!isAjaxForm) {
            // ถ้าเป็น form ปกติที่ redirect, ไม่ต้องแสดง loading เพราะจะ redirect ไปหน้าอื่น
            // แต่ถ้าต้องการแสดง loading ให้แสดงก่อน redirect
            loading.showForForm();

            // ซ่อน loading หลังจาก 5 วินาที (fallback)
            setTimeout(() => {
                loading.hide();
            }, 5000);
        }
    });

    // แสดง Loading เมื่อมี AJAX request
    let ajaxCount = 0;
    $(document).ajaxStart(function () {
        ajaxCount++;
        if (ajaxCount === 1) {
            loading.showForAjax();
        }
    });

    $(document).ajaxStop(function () {
        ajaxCount--;
        if (ajaxCount === 0) {
            loading.hide(300); // รอ 0.3 วินาที แล้วค่อยซ่อน
        }
    });

    // จัดการ AJAX error - ซ่อน loading เมื่อเกิด error
    $(document).ajaxError(function (event, jqXHR, ajaxSettings, thrownError) {
        console.error('AJAX Error:', thrownError);
        ajaxCount = Math.max(0, ajaxCount - 1);
        if (ajaxCount === 0) {
            loading.hide(300);
        }
    });

    // แสดง Loading เมื่อคลิกลิงก์ที่ต้องการ
    $('a[data-loading="true"]').on('click', function () {
        loading.show();
    });

    // Fallback: ซ่อน loading เมื่อหน้าเว็บพร้อมใช้งาน
    setTimeout(() => {
        if (loading.isShowing() && document.readyState === 'complete') {
            console.warn('Fallback: Hiding loading after page load');
            loading.hide();
        }
    }, 2000); // รอ 2 วินาที แล้วตรวจสอบอีกครั้ง
});

// CSS สำหรับป้องกันการ scroll
const style = document.createElement('style');
style.textContent = `
    body.loading-active {
        overflow: hidden !important;
    }
`;
document.head.appendChild(style);
