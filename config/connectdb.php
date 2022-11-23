<?php
/**
 * Class sử dụng để kết nối đến DB
 * Và chạy các câu lệnh insert, update, delete, select cho toàn bộ project
 * 
 */

 class connectdb {

    private $DATABASE_USERNAME = "root";
    private $DATABASE_PASSWORD = "";
    private $DATABASE_HOST = "localhost";
    private $DATABASE_DBNAME = "K64HTTT";

    protected $connection = "";

    // Viết phương thức kết nối csdl    
    public function connect() {
        try {
        // Sử dụng PDO để connect đến csdl
        $this->connection = new PDO("mysql:host=$this->DATABASE_HOST;dbname=$this->DATABASE_DBNAME", $this->DATABASE_USERNAME, $this->DATABASE_PASSWORD);
        // SetAttribute cho PDO
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // Viết hàm sử dụng chung cho toàn project về tương tác với csdl
    // 2 hàm để sử dụng: 1 là dành cho select, 1 là dành cho iud

    public function queryIud ($sql) {
        
        
        $query = $this->connection->prepare($sql);
        $result = $query->execute();
        if($result) {
            // Lấy ra id cuối cùng vừa thực hiện
            return $this->connection->lastInsertId();
            //return true;
        } else {
            return false;
        }
    }

    public function querySelect($sql) {
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


 }