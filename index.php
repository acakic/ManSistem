<?php
session_start();

// require_once('./classes/Router.php');

// $controller = new ProductsController();
// $controller->showAll();

foreach (glob('./model/*') as $model_name) {
	require($model_name);
}
foreach (glob('./classes/*') as $class_name) {
	require($class_name);
}
require('./config.php');

$router = new Router();
