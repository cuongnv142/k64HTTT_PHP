<?php
session_start();
include '../config/router.php';
$router = new Router(__DIR__);
$router->router();

