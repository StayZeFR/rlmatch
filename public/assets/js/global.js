function request(url, method, data) {
    let result;
    $.ajax({
        url: url,
        method: method,
        data: data,
        async: false,
        responseType: "json",
        success: function (response, status, xhr) {
            result = {
                code: xhr.status,
                data: response
            };
        },
        error: function (response, status, xhr) {
            result = {
                code: xhr.status,
                data: response
            };
        }
    });
    return result;
}

function toast(title, message, type) {
    Swal.fire({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        icon: type,
        title: title,
        text: message,
        timer: 3000,
    });
}