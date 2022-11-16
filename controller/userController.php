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
        

    }


}
