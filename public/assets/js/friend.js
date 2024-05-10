$(document).ready(function() {
    const friendOpen = $("#navigation > .nav-action > .profile > .friend");
    const friendContainer = $("#friend");
    const friendContent = $("#friend > .friend-content");
    const friendClose = $("#friend > .friend-content > .friend-header > .close-friend");
    const friendTabList = $("#friend > .friend-content > .friend-tab > .list-friend");
    const friendTabAdd = $("#friend > .friend-content > .friend-tab > .add-friend");
    const friendList = $("#friend > .friend-content > .friend-list");
    const friendAdd = $("#friend > .friend-content > .friend-add");
    const friendAddButton = $("#friend > .friend-content > .friend-add > .add > div > .add-friend-button");
    const friendAddInput = $("#friend > .friend-content > .friend-add  > .add > div > .add-friend-input");

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

    friendAddButton.on("click", function() {
        const value = friendAddInput.val().trim();
        if (value.length > 0) {
            friendAddInput.val("");
            let result = request("/api/notifications/friends/send", "POST", {
                username: value
            }, true);
        }
    });
});