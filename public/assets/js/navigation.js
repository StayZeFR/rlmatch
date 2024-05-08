$(document).ready(function() {

    const notificationOpen = $("#navigation > .nav-action > .profile > .notification");
    const notificationContainer = $("#notification");
    const notificationContent = $("#notification > .notification-content");
    const notificationClose = $("#notification > .notification-content > .notification-header > .close-notification");

    notificationOpen.on("click", function() {
        openNotification();
    });

    notificationContainer.on("click", function(event) {
        if (event.target.id === "notification") {
            closeNotification();
        }
    });

    notificationClose.on("click", function() {
        closeNotification();
    });

    function closeNotification() {
        notificationContent.css("transform", "translateX(100%)");
        notificationContent.css("transition", "transform 0.5s");
        setTimeout(() => {
            notificationContainer.hide();
            notificationContent.css("transform", "translateX(0)");
        }, 500);
    }

    function openNotification() {
        notificationContainer.show();
        notificationContent.css("transform", "translateX(100%)");
        notificationContent.css("transition", "transform 0.5s");
        setTimeout(() => {
            notificationContent.css("transform", "translateX(0)");
        }, 100);
    }

    const friendOpen = $("#navigation > .nav-action > .profile > .friend");
    const friendContainer = $("#friend");
    const friendContent = $("#friend > .friend-content");
    const friendClose = $("#friend > .friend-content > .friend-header > .close-friend");

    friendOpen.on("click", function() {
        openFriend();
    });

    friendContainer.on("click", function(event) {
        if (event.target.id === "friend") {
            closeFriend();
        }
    });

    friendClose.on("click", function() {
        closeFriend();
    });

    function closeFriend() {
        friendContent.css("transform", "translateX(100%)");
        friendContent.css("transition", "transform 0.5s");
        setTimeout(() => {
            friendContainer.hide();
            friendContent.css("transform", "translateX(0)");
        }, 500);
    }

    function openFriend() {
        friendContainer.show();
        friendContent.css("transform", "translateX(100%)");
        friendContent.css("transition", "transform 0.5s");
        setTimeout(() => {
            friendContent.css("transform", "translateX(0)");
        }, 100);
    }

    const friendTabList = $("#friend > .friend-content > .friend-tab > .list-friend");
    const friendTabAdd = $("#friend > .friend-content > .friend-tab > .add-friend");
    const friendList = $("#friend > .friend-content > .friend-list");
    const friendAdd = $("#friend > .friend-content > .friend-add");

    friendTabList.on("click", function() {
        friendTabList.addClass("active");
        friendTabAdd.removeClass("active");
        friendList.css("display", "flex");
        friendAdd.hide();
    });

    friendTabAdd.on("click", function() {
        friendTabList.removeClass("active");
        friendTabAdd.addClass("active");
        friendList.hide();
        friendAdd.css("display", "flex");
    });

    const friendAddButton = $("#friend > .friend-content > .friend-add > .add > div > .add-friend-button");
    const friendAddInput = $("#friend > .friend-content > .friend-add  > .add > div > .add-friend-input");

    friendAddButton.on("click", function() {
        const value = friendAddInput.val().trim();
        if (value.length > 0) {
            let result = request("/api/friends/add", "POST", {
                username: value
            });
            console.log(JSON.stringify(result))
            if (result["code"] === 200) {
                toast("Succès", "Demande d'amie envoyée", "success");
            } else if (result["code"] === 400) {
                toast("Erreur", result["data"]["message"], "error");
            } else {
                toast("Erreur", "Une erreur est survenue", "error");
            }
        }
    });

});