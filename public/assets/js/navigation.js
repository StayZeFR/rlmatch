$(document).ready(function() {

    const menuOpen = $("#navigation > .nav-action > .menu");
    const menuClose = $("#menu > .menu-content > .menu-header > .close-menu");
    const menuContainer = $("#menu");

    menuOpen.on("click", function() {
        openMenu();
    });

    menuClose.on("click", function() {
        closeMenu();
    });

    function openMenu() {
        menuContainer.show();
        menuContainer.css("transform", "translateX(100%)");
        menuContainer.css("transition", "transform 0.5s");
        setTimeout(() => {
            menuContainer.css("transform", "translateX(0)");
        }, 100);
    }

    function closeMenu() {
        menuContainer.css("transform", "translateX(-100%)");
        menuContainer.css("transition", "transform 0.5s");
        setTimeout(() => {
            menuContainer.hide();
            menuContainer.css("transform", "translateX(0)");
        }, 500);
    }

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
            friendAddInput.val("");
            let result = request("/api/notifications/friends/send", "POST", {
                username: value
            }, true);
        }
    });

    getNotificationsFriends();
    getFriends();

    setInterval(() => {
        getNotificationsFriends();
        getFriends();
    }, 60000);
});

function getNotificationsFriends() {
    const notificationsContainer = $("#notification > .notification-content > .notification-list");
    let result = request("/api/notifications/friends", "POST");

    if (result["code"] === 200) {
        notificationsContainer.empty();
        result["data"].forEach(notification => {
            setNotificationFriend(notification["id"], "", notification["send_by"]);
        });
        setEventFriend();
        if (result["data"].length > 0) {
            $("#navigation > .nav-action > .profile > .notification > .pellet > span").text(result["data"].length);
            $("#navigation > .nav-action > .profile > .notification > .pellet").css("display", "flex");
        } else {
            $("#navigation > .nav-action > .profile > .notification > .pellet").hide();
        }
    }
}

function setNotificationFriend(id, avatar, username) {
    const notificationsContainer = $("#notification > .notification-content > .notification-list");
    let html = "<div class='notification-item'>" +
                    "    <img src='/assets/images/user.png' alt=''>" +
                    "    <div class='content'>" +
                    "        <h4>" + username + "</h4>" +
                    "        <p>Vous a ajouté en ami</p>" +
                    "    </div>" +
                    "    <div class='action'>" +
                    "        <button class='accept'>" +
                    "            <img src='/assets/images/valid.png' alt=''>" +
                    "        </button>" +
                    "        <button class='decline'>" +
                    "            <img src='/assets/images/close.png' alt=''>" +
                    "        </button>" +
                    "        <input type='hidden' value='" + id + "'>" +
                    "    </div>" +
                    "</div>";
    notificationsContainer.append(html);
}

function setEventFriend() {
    const notificationItemValid = $("#notification > .notification-content > .notification-list > .notification-item > .action > .accept");
    const notificationItemDecline = $("#notification > .notification-content > .notification-list > .notification-item > .action > .decline");

    notificationItemValid.on("click", function() {
        const id = $(this).parent().find("input").val();
        if (acceptNotificationFriend(id)) {
            $(this).parent().parent().remove();
        }
    });

    notificationItemDecline.on("click", function() {
        const id = $(this).parent().find("input").val();
        if (declineNotificationFriend(id)) {
            $(this).parent().parent().remove();
        }
    });
}

function acceptNotificationFriend(id) {
    let result = request("/api/notifications/friends/accept", "POST", {
        notification_id: id
    }, true);
    getFriends();
    getNotificationsFriends();
    return result["code"] === 200;
}

function declineNotificationFriend(id) {
    let result = request("/api/notifications/friends/decline", "POST", {
        notification_id: id
    }, true);
    getFriends();
    getNotificationsFriends();
    return result["code"] === 200;
}

function getFriends() {
    const friendsContainer = $("#friend > .friend-content > .friend-list");
    let result = request("/api/friends", "POST");

    if (result["code"] === 200) {
        friendsContainer.empty();
        result["data"].forEach(friend => {
            setFriend(friend["id"], friend["username"], friend["avatar"]);
        });
    }
}

function setFriend(id, username, avatar) {
    const friendsContainer = $("#friend > .friend-content > .friend-list");
    let html = "<div class='friend-item'>" +
                    "    <img src='/assets/images/user.png' alt=''>" +
                    "    <div class='content'><h4>" + username + "</h4></div>" +
                    "</div>";
    friendsContainer.append(html);
}