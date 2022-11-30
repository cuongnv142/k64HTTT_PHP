<?php
include '../controller/userController.php';
$user = new usercontroller();
$router = new Router();

$user->logout();
$router->redirectLoginPage();

?>