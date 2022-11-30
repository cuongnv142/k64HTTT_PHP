<?php
include '../controller/userController.php';
$router = new Router();
$user = new userController();

$id = $router->getGet("id");

$result = $user->viewdetail($id);
if (!$result) {
    echo "Không có dữ liệu";
    echo "<a href= " . $router->createUrl("home") . "> Quay về trang chủ </a>";
    die();
}

?>

<html>
    <head>
        Chi tiết người dùng
    </head>
    <body>
        <form>
            username: </br>
            <input type="text" name="username" readonly value="<?=$result[0]["username"]?>" /> </br>
            ngày tạo: </br>
            <input type="text" name="password" value="<?=$result[0]["created_time"]?>" /> </br>
            <input type="button" onclick="window.location.href='<?= $router->createUrl('users/index')?>'" value = "Quay lại" />
        </form>
    </body>
</html>


<!-- Làm thêm update user, đổi mật khẩu, delete -->
<!-- Chia nhóm 4 người - Làm 1 project nhỏ về PHP. Mỗi người yc ít nhất 1 chức năng có đầy đủ CRUD
Và lắp ghép lại được với nhau thành 1 project hoàn chỉnh 
Yêu cầu: Các project không được trùng đề tài với nhau
Viết thêm trang chủ Homepage để hiện thị mà không cần login
Các bạn có 2 tuần đề thực hiện project cuối kì. Dự kiến 12/12 - 16/12 sẽ interview cuối kì trực tiếp.
Về điểm:
Chúng ta có điểm chuyên cần là có điểm danh
Về điểm giữa kì: Dựa luôn vào điểm cuối kì.
-->
