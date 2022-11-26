<?php
// Xây dựng 1 lớp 
//Chứa tất cả các phương thức xử lý liên quan đến users
// login,logout, create,update,delete....
// include dung để load các file liên quan
include '../config/connectdb.php';
class usercontroller {
    // Cần 3 thuộc tính
    public $username;
    public $password;
    private $id;

    public function __construct($username = "" , $password = "") {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Viết hàm tạo user trong controller
     */
    public function createuser() {
        /* khi viết createuser sẽ liên quan đến file connectdb.php
        Vậy thì để có thể làm việc với những file liên quan chũng ta cần 
        include, require, require_one cái file đó */
        // Khởi tạo thể hiện của connect db
        $login = new connectdb();
        // Câu lệnh sql
        $sql = "Insert into users (username,password,created_time) values ( 
            '". $this->username."','".$this->encryptpassword()."',now()
        );";
        // Check xem có tồn tại connection hay chưa, nếu chưa thì khởi tạo
        if(isset($this->connection)) {

        } else {
            $login->connect();
        }

        $result = $login->queryIud($sql);
        
        if (!$result) {
            echo "ERROR";
            die();
        } else {
            return $result;
        }
    }

    /**
     * Viết hàm login, logout
     */

     public function login() {
        $login = new connectdb();
        $sql = "select id,username from users where username = 
        '".$this->username."' and password = '". $this->encryptpassword() ."';
        ";
        // Check xem tồn tại connection hay chưa?
        if(isset($this->connection)) {

        } else {
            $login->connect();
        }

        $result = $login->querySelect($sql);

        if(isset($result)) {
            if (count($result) > 0) {
                // Nếu login thành công có dữ liệu trả về thì chúng ta sẽ làm gì?
                // Chúng ta sẽ lưu giá trị của user vào session

                $_SESSION["userid"] = $result[0]["id"];
                $_SESSION["username"] = $result[0]["username"];
                return true;
            } else {
                return false;
            }
        }
        return false;

     }

     public function logout() {
        unset($_SESSION["userid"]);
        unset($_SESSION["username"]);
        return true;
     }

     // Viết thêm 1 hàm encrypt password
     // Mục tiêu là nếu muốn thay đổi phương thức mã hoá của hệ thống.
     // Thì chỉ cần sửa đổi hàm encryptpassword này thôi
     public function encryptpassword() {
        return md5($this->password);
     }

     // Viết thêm 1 hàm check login
     public function isLogin() {
        if($this->getSession("userid")) {
            return true;
        } else {
            return false;
        }
     }

     // Viết thêm 1 hàm getSession để get các session đang tồn tại
     // Truyền vào name : name này là name của session
     public function getSession($name) {
        if($name !== null) {
            return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
        }
        return $_SESSION;
     }



}
