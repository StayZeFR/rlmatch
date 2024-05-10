<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "HomeController::view", ["as" => "home"]);
$routes->get("/play", "PlayController::view", ["as" => "play"]);
$routes->get("/contact", "ContactController::view", ["as" => "contact"]);
$routes->get("/privacy-policy", "PrivacyPolicyController::view", ["as" => "privacy-policy"]);

$routes->group("account", function ($routes) {
    $routes->get("", "AccountController::view", ["as" => "account.account"]);
    $routes->get("games", "AccountController::viewGames", ["as" => "account.games"]);
    $routes->get("token", "AccountController::viewToken", ["as" => "account.token"]);
    $routes->get("logout", "AuthController::logout", ["as" => "logout"]);
});

$routes->group("api", function ($routes) {
    $routes->group("friends", function ($routes) {
        $routes->post("", "API\FriendsController::getFriends", ["as" => "api.friends"]);
        $routes->post("add", "API\FriendsController::add", ["as" => "api.friends.add"]);
    });
    $routes->group("notifications", function ($routes) {
        $routes->post("", "API\NotificationsController::getNotifications", ["as" => "api.notifications"]);
        $routes->post("accept", "API\NotificationsController::acceptNotification", ["as" => "api.notifications.accept"]);
        $routes->post("decline", "API\NotificationsController::declineNotification", ["as" => "api.notifications.decline"]);

        $routes->post("friends", "API\NotificationsController::getNotificationsFriends", ["as" => "api.notifications.friends"]);
        $routes->post("friends/send", "API\NotificationsController::sendNotificationFriend", ["as" => "api.notifications.friends.send"]);
        $routes->post("friends/sent", "API\NotificationsController::getNotificationsSent", ["as" => "api.notifications.friends.sent"]);
    });
    $routes->group("players", function ($routes) {
        $routes->get("", "API\PlayersController::getPlayers", ["as" => "api.players"]);
    });
});

$routes->get("/callback", "AuthController::callback", ["as" => "callback"]);

