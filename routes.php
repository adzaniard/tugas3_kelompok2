<?php
// routes.php

require_once 'app/controllers/plantsController.php';
require_once 'app/controllers/CategoriesController.php';
require_once 'app/controllers/OrderController.php';
require_once 'app/controllers/UserController.php';

$controller = new plantsController();
$controller1 = new CategoriesController();
$controller2 = new OrderController();
$controller3 = new UserController();

$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/plants/index') {
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
} elseif ($url == '/'){
    $controller->dashboard();
}
// else {
//     http_response_code(404);
//     echo "404 Not Found";
// }

if ($url == '/user/index') {
    $controller3->index();
} elseif ($url == '/user/create' && $requestMethod == 'GET') {
    $controller3->create();
} elseif ($url == '/user/store' && $requestMethod == 'POST') {
    $controller3->store();
} elseif (preg_match('/\/user\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller3->edit($userId);
} elseif (preg_match('/\/user\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controller3->update($userId, $_POST);
} elseif (preg_match('/\/user\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller3->delete($userId);
}
// elseif ($url == '/'){
//     $controller3->dashboard();
// }
// else {
//         http_response_code(404);
//         echo "404 Not Found";
// }

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
}
// elseif($url == '/'){
//     $controller1->dashboard();
// }
// else {
//         http_response_code(404);
//         echo "404 Not Found";
// }

if ($url == '/order/index') {
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
} 
// elseif ($url == '/'){
//     $controller2->dashboard();
// } 
// else {
//     http_response_code(404);
//     echo "404 Not Found";
// }