<?php
include '../controller/userController.php';
if(isset($_POST["username"]) || isset($_POST["password"])) {
    // Nếu mà bắt buộc thì chúng ta cần bắt các ký tự lạ ở 
    //user name và password ở chỗ này -- Các bạn có thể tự làm theo khả năng

    $a = $_POST["username"];
    $b = $_POST["password"];

    $login = new usercontroller($a,$b);
    if($login->login()){
        echo "Login thành công";
        // Vardump session
        var_dump($_SESSION);
        // Chuyển tới trang khác khi login thành công
        header("Location:index.php");
    } else {
        echo "login thất bại";
    }
}
?>

<html>
    <head>
        Form Login
    </head>
    <body>
        <form action="login.php" method="POST">
            username: </br>
            <input type="text" name="username" /> </br>
            password: </br>
            <input type="password" name="password" /> </br>
            <input type="submit" name="submit" value="Login" />
        </form>
    </body>
</html>
