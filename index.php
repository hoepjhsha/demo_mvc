<?php
require_once __DIR__ . '/vendor/autoload.php';

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'] ?? 'index';
} else {
    $controller = 'pages';
    $action = 'home';
}

$controllers = array(
    'pages' => [\controllers\PagesController::class, ['home', 'error']],
    'work-histories' => [\controllers\UserWorkHistoriesController::class, ['index', 'show']],
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller][1])) {
    $controller = 'pages';
    $action = 'error';
}

$klass = $controllers[$controller][0];
$controller = new $klass();
$controller->$action();