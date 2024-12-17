<?php
// routes.php

require_once 'app/controllers/plantsController.php';

$controller = new plantsController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/plants/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/plants/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/plants/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/plants\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $plantsId = $matches[1];
    $controller->edit($plantsId);
} elseif (preg_match('/\/plants\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $plantsId = $matches[1];
    $controller->update($plantsId, $_POST);
} elseif (preg_match('/\/plants\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $plantsId = $matches[1];
    $controller->delete($plantsId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}