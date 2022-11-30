<?php 
    include '../controller/userController.php';
    $user = new usercontroller();
    $router = new Router();
    if (!$user->isLogin()) {
        $router->redirectLoginPage();
    }

?>

<html>
    <head>
    </head>
    <body>
        <div>
            <!-- < ? = tương đương với < ? php echo -->
            <p> Xin chào bạn <?= $user->getSession("username") ?></p>
            <p> <a href= "<?= $router->createUrl("logout") ?>" > logout</a></p>
        </div>
        <h2> Trang quản trị Admin </h2>
        <div>
            <li>
            <a href= "<?= $router->createUrl("users/index") ?>" > Manage users</a>
            </li>
            <li>
            <a href= "<?= $router->createUrl("users/index") ?>" > Manage posts</a>
            </li>
            <li>
            <a href= "<?= $router->createUrl("users/index") ?>" > Manage category</a>
            </li>
        </div>
    </body>
</html>