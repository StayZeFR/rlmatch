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

    getFriends();

    setInterval(() => {
        getFriends();
    }, 60000);
});

function acceptNotificationFriend(id) {
    let result = request("/api/notifications/friends/accept", "POST", {
        notification_id: id
    }, true);
    getFriends();
    return result["code"] === 200;
}

function declineNotificationFriend(id) {
    let result = request("/api/notifications/friends/decline", "POST", {
        notification_id: id
    }, true);
    getFriends();
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