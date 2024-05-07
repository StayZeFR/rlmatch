$(document).ready(function() {
    const authBtn = $("#navigation > .nav-action > .auth");
    const authWindow = authBtn.on("click", function () {
        window.open(
            URL_AUTH,
            "LoginWindow",
            "width=500,height=750,resizable=no,scrollbars=no,status=no,toolbar=no,menubar=no,location=no,directories=no,top=100,left=100"
        );
    });
});