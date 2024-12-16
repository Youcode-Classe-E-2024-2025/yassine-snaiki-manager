<?php

$routes = [
    "/"=>"controllers/dashboard.php",
    "/dashboard"=>"controllers/dashboard.php",
    "/login"=>"controllers/login.php",
    "/logout"=>"controllers/logout.php",
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


function abort($code) {
    http_response_code($code);
    require_once "controllers/404.php";
    die();
}
function routeToController($routes,$uri) {
    if(array_key_exists($uri,$routes))
    require_once $routes[$uri];
    else abort(404);
}

routeToController($routes,$uri);
