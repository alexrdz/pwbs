<?php
global $wire;

require (__DIR__ . '/_funcs.php');
require (__DIR__ . '/Router.php');

include (__DIR__ . '/partials/errors/installation.errors.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router = new Router();
$router->get('/edit', 'controllers/edit.php');
$router->get('/login', 'controllers/login.php');
$router->post('/login', 'controllers/login.php');
$router->route($uri);
