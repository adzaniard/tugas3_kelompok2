<?php
// routes.php

require_once 'app/controllers/CategoriesController.php';

$controller = new CategoriesController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/categories/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/categories/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/categories/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/categories\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $CategoriesId = $matches[1];
    $controller->edit($CategoriesId);
} elseif (preg_match('/\/categories\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $CategoriesId = $matches[1];
    $controller->update($CategoriesId, $_POST);
} elseif (preg_match('/\/categories\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $CategoriesId = $matches[1];
    $controller->delete($CategoriesId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}