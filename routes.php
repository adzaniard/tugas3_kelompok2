<?php
// routes.php

require_once 'app/controllers/CategoriesController.php';
require_once 'app/controllers/OrderController.php';

$controller1 = new CategoriesController();
$controller2 = new OrderController();

$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/categories/index') {
    $controller1->index();
} elseif ($url == '/categories/create' && $requestMethod == 'GET') {
    $controller1->create();
} elseif ($url == '/categories/store' && $requestMethod == 'POST') {
    $controller1->store();
} elseif (preg_match('/\/categories\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $CategoriesId = $matches[1];
    $controller1->edit($CategoriesId);
} elseif (preg_match('/\/categories\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $CategoriesId = $matches[1];
    $controller1->update($CategoriesId, $_POST);
} elseif (preg_match('/\/categories\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $CategoriesId = $matches[1];
    $controller1->delete($CategoriesId);
}elseif($url == '/'){
    $controller1->dashboard();
}else {
        http_response_code(404);
        echo "404 Not Found";
}

if ($url == '/order/index' || $url == '/') {
    $controller2->index();
} elseif ($url == '/order/create' && $requestMethod == 'GET') {
    $controller2->create();
} elseif ($url == '/order/store' && $requestMethod == 'POST') {
    $controller2->store();
} elseif (preg_match('/\/order\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $orderId = $matches[1];
    $controller2->edit($orderId);
} elseif (preg_match('/\/order\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $orderId = $matches[1];
    $controller2->update($orderId, $_POST);
} elseif (preg_match('/\/order\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $orderId = $matches[1];
    $controller2->delete($orderId);

} else {
    http_response_code(404);
    echo "404 Not Found";
}