$(document).ready(function() {
    const btnAuth = $("#navigation > .nav-action > .auth");

    btnAuth.on("click", function() {
        window.open(
            URL_AUTH,
            "LoginWindow",
            "width=500,height=600,resizable=no,scrollbars=no,status=no,toolbar=no,menubar=no,location=no,directories=no,top=100,left=100"
        );
    });
});