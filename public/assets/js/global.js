function toast(title, type) {
    Swal.fire({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        icon: type,
        title: title,
        timer: 3000,
    });
}

function request(url, method, data = {}, toast = false) {
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
        error: function (response) {
            console.log(JSON.stringify(response));
            result = {
                code: parseInt(response.status),
                data: JSON.parse(response.responseText)
            };
        }
    });
    if (toast) {
        let type;
        switch (result["code"]) {
            case 200:
                type = "success";
                break;
            case 400:
                type =  "info";
                break;
            default:
                type =  "error";
                break;
        }
        Swal.fire({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            icon: type,
            title: result["data"]["message"],
            timer: 3000,
        });
    }
    return result;
}