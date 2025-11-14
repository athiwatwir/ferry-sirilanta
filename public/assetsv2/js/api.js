// ตั้งค่า base URL ของ Laravel API (แก้ตามโปรเจกต์)
const API_URL = "{{ config('app.api_url') }}";
const API_KEY = window.API_KEY || "";

console.log('api js is loaded.');
(function (window, $) {
    const API_URL = window.API_URL || "http://localhost:8001/api";
    const API_KEY = window.API_KEY || "";

    window.apiGet = function (endpoint, params = {}, successCallback, errorCallback) {
        $.ajax({
            url: `${API_URL}/${endpoint}`,
            type: "GET",
            data: params,
            dataType: "json",
            headers: {
                "X-API-KEY": API_KEY
            },
            success: function (response) {
                if (successCallback) successCallback(response);
            },
            error: function (xhr) {
                if (errorCallback) errorCallback(xhr.responseJSON || xhr);
            }
        });
    };

    window.apiPost = function (endpoint, data = {}, successCallback, errorCallback) {
        $.ajax({
            url: `${API_URL}/${endpoint}`,
            type: "POST",
            data: data,
            dataType: "json",
            headers: {
                "X-API-KEY": API_KEY,
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                if (successCallback) successCallback(response);
            },
            error: function (xhr) {
                if (errorCallback) errorCallback(xhr.responseJSON || xhr);
            }
        });
    };
})(window, jQuery);
