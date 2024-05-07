<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "HomeController::view", ["as" => "home"]);
$routes->get("/play", "PlayController::view", ["as" => "play"]);
$routes->get("/account", "AccountController::view", ["as" => "account"]);
$routes->get("/token", "TokenController::view", ["as" => "token"]);

$routes->get("/privacy-policy", "PrivacyPolicyController::view", ["as" => "privacy-policy"]);

$routes->get("/callback", "AuthController::callback", ["as" => "callback"]);
$routes->get("/logout", "AuthController::logout", ["as" => "logout"]);
$routes->get("/login", "LoginController::view", ["as" => "login"]);
$routes->get("/register", "RegisterController::view", ["as" => "register"]);

