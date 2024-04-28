<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "HomeController::view", ["as" => "home"]);

$routes->get("/login", "LoginController::view", ["as" => "login"]);
$routes->get("/register", "LoginController::view", ["as" => "register"]);

