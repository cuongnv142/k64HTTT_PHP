<?php
    include '../controller/userController.php';
    $user = new usercontroller();
    $router = new Router();

    $result = $user->listuser();
    if (!is_array($result)) {
        echo "Có lỗi xảy ra";
        echo "<a href= " . $router->createUrl("home") . "> Quay về trang chủ </a>";
        die();
    }
    if (!$result) {
        echo "Không có dữ liệu";
        echo "<a href= " . $router->createUrl("home") . "> Quay về trang chủ </a>";
        die();
    }
?>


<html>
    <head>Danh sách user</head>

    <body>
    <div>
            <!-- < ? = tương đương với < ? php echo -->
            <p> Xin chào bạn <?= $user->getSession("username") ?></p>
            <p> <a href= "<?= $router->createUrl("logout") ?>" > logout</a></p>
    </div>

    <div>
        <p> Thêm mới user <a href= "<?= $router->createUrl("users/createuser") ?>" > click</a> </p>
    </div>

    <div>
        <table style="width:100%" border="1">
            <tr>
                <td>id</td>
                <td>username</td>
                <td>ngày tạo</td>
                <td>tác vụ</td>
            </tr>

            <?php foreach($result as $row) { ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td> <a href="<?=$router->createUrl("users/view",["id"=>$row["id"]]) ?>"> <?= $row["username"] ?> </a> </td>
                <td><?= $row["created_time"] ?></td>
                <td> <a href="<?=$router->createUrl("users/delete",["id"=>$row["id"]]) ?>">Xoá </a></td>
            </tr>

            <?php } ?>
        </table>
    </div>

    </body>
</html>