$(document).ready(function() {
    const notificationOpen = $("#navigation > .nav-action > .profile > .notification");
    const notificationContainer = $("#notification");
    const notificationContent = $("#notification > .notification-content");
    const notificationClose = $("#notification > .notification-content > .notification-header > .close-notification");
    const notificationsContainer = $("#notification > .notification-content > .notification-list");

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

    getNotifications();
    setInterval(() => {
        getNotifications();
    }, 60000);

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

    function getNotifications() {
        const result = request("/api/notifications", "POST");
        if (result["code"] === 200) {
            notificationsContainer.empty();
            const notifications = result["data"];
            for (let i = 0; i < notifications.length; i++) {
                setNotification(notifications[i]);
            }
            if (notifications.length > 0) {
                $("#navigation > .nav-action > .profile > .notification > .pellet > span").text(result["data"].length);
                $("#navigation > .nav-action > .profile > .notification > .pellet").css("display", "flex");
            } else {
                $("#navigation > .nav-action > .profile > .notification > .pellet").hide();
            }
        }
    }

    function setNotification(data) {
        const type = data["type"];
        switch (type) {
            case "friend":
                setNotificationFriend(data["id"], data["avatar"], data["send_by_username"]);
                break;
            case "match":
                break;
            default:
                break;
        }
    }

    function setNotificationFriend(id, avatar, username) {
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
        setEventFriend();
    }

    function setEventFriend() {
        const notificationItemValid = $("#notification > .notification-content > .notification-list > .notification-item > .action > .accept");
        const notificationItemDecline = $("#notification > .notification-content > .notification-list > .notification-item > .action > .decline");

        notificationItemValid.on("click", function() {
            const id = $(this).parent().find("input").val();
            if (acceptNotification(id)) {
                $(this).parent().parent().remove();
            }
        });

        notificationItemDecline.on("click", function() {
            const id = $(this).parent().find("input").val();
            if (declineNotification(id)) {
                $(this).parent().parent().remove();
            }
        });
    }

    function acceptNotification(id) {
        const result = request("/api/notifications/accept", "POST", {
            notification_id: id
        }, true);
        getNotifications();
        return result["code"] === 200;
    }

    function declineNotification(id) {
        const result = request("/api/notifications/decline", "POST", {
            notification_id: id
        }, true);
        getNotifications();
        return result["code"] === 200;
    }
});