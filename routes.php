<?php
// routes.php

require_once 'app/controllers/OrderController.php';

$controller = new OrderController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/order/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/order/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/order/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/order\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $orderId = $matches[1];
    $controller->edit($orderId);
} elseif (preg_match('/\/order\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $orderId = $matches[1];
    $controller->update($orderId, $_POST);
} elseif (preg_match('/\/order\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $orderId = $matches[1];
    $controller->delete($orderId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}