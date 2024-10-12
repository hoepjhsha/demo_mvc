<?php
//Đặt namespace giống kiểu set package bên java
namespace system;

class Database
{
    //Đây là Singleton design pattern
    // Mục đích để cho phép chỉ có một instance của class Database tồn tại trong chương trình
    private static $instance = null;

    // Phương thức khởi tạo và trả về instance của Database
    public static function getInstance()
    {
        // Kiểm tra xem instance đã tồn tại chưa, nếu chưa thì khởi tạo và trả về
        if (!isset(self::$instance)) {
            // Thực hiện kết nối với database, nếu có lỗi thì thông báo và dừng chương trình
            try {
                // Kết nối đến database, sử dụng PDO (PHP Data Objects) để kết nối với database
                self::$instance = new \PDO('mysql:host=localhost;dbname=portfolio', 'root', '');
                // Thiết lập charset cho kết nối
                self::$instance->exec("SET NAMES 'utf8'");
            } catch (\PDOException $e) {    // Bắt exception và trả về nếu bắt được. Mục đích là để chương trình không dừng dù gặp lỗi.
                die($e->getMessage());
            }
        }
        return self::$instance;
    }
}