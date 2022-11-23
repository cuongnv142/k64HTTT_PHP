<?php
// Trang dùng để tạo mới một user
include '../controller/userController.php';
if(isset($_POST["username"]) && isset($_POST["password"])) {
    $a = $_POST["username"];
    $b = $_POST["password"];
    $c = $_POST["repassword"];
    
    if($b === $c) {
        // Todo thực hiện các bước phía sau
        // Khởi tạo thể hiện của user
        $user = new usercontroller($a,$b);
        $result = $user->createuser();
        if ($result > 0) {
            echo "Tạo tài khoản thành công </br>";
        }
    } else {
        echo "Mật khẩu không trùng khớp </br>";
    }

}

?>

<html>
    <head>
        Form Tạo tài khoản người dùng
    </head>
    <body>
        <form action="createuser.php" method="POST">
            username: </br>
            <input type="text" name="username" /> </br>
            password: </br>
            <input type="password" name="password" /> </br>
            repassword: </br>
            <input type="password" name="repassword" /> </br>
            <input type="submit" name="submit" value="Tạo tài khoản" />
        </form>
    </body>
</html>

