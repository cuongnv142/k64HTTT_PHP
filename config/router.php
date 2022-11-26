<?php
/**
 * Class Router: Để định hướng URL
 * author: 
 * version:
 */
class Router {
    // r: dùng để nhận biết router
    const PARAM_NAME = "r";
    // Trang home chứa trang chính của admin sau khi login xong
    const HOME_PAGE = "home";
    // Trang index là trang đầu router để hiển thị trang khác
    const INDEX_PAGE = "index";

    //sourcepath
    public static $sourcePath;

    //contruct
    public function __construct($sourcePath = "") {
        if($sourcePath) {
            // Note: Chúng ta có thể dùng self hoặc this
            self::$sourcePath = $sourcePath;
        }
    }

    // Viết hàm getGet và hàm getPost để lấy value name của url truyền vào
    public function getGet($name = null) {
        if($name != null) {
            return isset($_GET[$name]) ? $_GET[$name] : null;
        }
        return $_GET;
    }

    public function getPost($name = null) {
        if($name != null) {
            return isset($_POST[$name]) ? $_POST[$name] : null;
        }
        return $_POST;
    }
    public function router()
    {
        $url = $this->getGet(self::PARAM_NAME);
        // Nếu url không có giá trị gì: thì là !url
        // Nếu url không phải là một chuỗi mà là dạng khác chuỗi thì cũng không xử lý
        // Nếu url là index thì chúng ta cũng không xử lý.
        // Và tất cả các vấn đề này khi gặp phải thì về trang home
        if(!$url || !is_string($url) || $url == self::INDEX_PAGE){
            $url = self::HOME_PAGE;
        }

        $path = self::$sourcePath."/".$url.".php";

        if(file_exists($path)) {
            return require_once($path);
        } else {
            return $this->PageNoteFound();
        }

    }
    public function PageNoteFound () {
        echo "PAGE NOT FOUND";
        die();
    }

    // Viết thêm hàm redirect cho gọn

    public function redirectHomePage() {
        $this->redirect(self::HOME_PAGE);
    }

    public function redirect($url) {
        header("Location:?r=$url");
    }



}