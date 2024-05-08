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
        $routes->post("add", "API\FriendsController::add", ["as" => "api.friends.add"]);
    });
    $routes->group("notifications", function ($routes) {
        $routes->post("friends", "API\NotificationsController::getNotificationsFriends", ["as" => "api.notifications.friends"]);
    });
});

$routes->get("/callback", "AuthController::callback", ["as" => "callback"]);

