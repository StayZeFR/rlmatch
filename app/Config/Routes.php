<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "HomeController::view", ["as" => "home"]);
$routes->get("/play", "PlayController::view", ["as" => "play"]);

$routes->get("/privacy-policy", "PrivacyPolicyController::view", ["as" => "privacy-policy"]);

$routes->get("/login", "LoginController::view", ["as" => "login"]);
$routes->get("/register", "RegisterController::view", ["as" => "register"]);

