<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "HomeController::view", ["as" => "home"]);
$routes->get("/play", "PlayController::view", ["as" => "play"]);

$routes->group("account", function ($routes) {
    $routes->get("", "AccountController::view", ["as" => "account.account"]);
    $routes->get("games", "AccountController::viewGames", ["as" => "account.games"]);
    $routes->get("token", "AccountController::viewToken", ["as" => "account.token"]);
    $routes->get("logout", "AuthController::logout", ["as" => "logout"]);
});

$routes->get("/privacy-policy", "PrivacyPolicyController::view", ["as" => "privacy-policy"]);

$routes->get("/callback", "AuthController::callback", ["as" => "callback"]);
$routes->get("/login", "LoginController::view", ["as" => "login"]);
$routes->get("/register", "RegisterController::view", ["as" => "register"]);

