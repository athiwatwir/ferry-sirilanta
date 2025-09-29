// Loading Control Functions
class LoadingManager {
    constructor() {
        this.overlay = $('#loading-overlay');
        this.isLoading = false;
        this.autoHideTimer = null;
    }

    // แสดง Loading
    show(text = 'Loading...', subtext = 'please wait') {
        if (this.autoHideTimer) {
            clearTimeout(this.autoHideTimer);
        }

        // อัพเดทข้อความ
        $('.loading-text').text(text);
        $('.loading-subtext').text(subtext);

        // แสดง Loading
        this.overlay.removeClass('hidden');
        this.isLoading = true;

        // ป้องกันการ scroll
        $('body').addClass('loading-active');
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
    // ซ่อน Loading หลังจากโหลดหน้าเสร็จ
    $(window).on('load', function () {
        setTimeout(() => {
            loading.hide();
        }, 500); // รอ 0.5 วินาที แล้วค่อยซ่อน
    });

    // แสดง Loading เมื่อมีการ submit form
    $('form').on('submit', function () {
        loading.showForForm();
    });

    // แสดง Loading เมื่อมี AJAX request
    $(document).ajaxStart(function () {
        loading.showForAjax();
    });

    $(document).ajaxStop(function () {
        loading.hide(300); // รอ 0.3 วินาที แล้วค่อยซ่อน
    });

    // แสดง Loading เมื่อคลิกลิงก์ที่ต้องการ
    $('a[data-loading="true"]').on('click', function () {
        loading.show();
    });
});

// CSS สำหรับป้องกันการ scroll
const style = document.createElement('style');
style.textContent = `
    body.loading-active {
        overflow: hidden !important;
    }
`;
document.head.appendChild(style);
