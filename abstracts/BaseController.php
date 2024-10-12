<?php
namespace abstracts;

// Tạo lớp base để có thể tái sử dụng code
abstract class BaseController
{
    // Thư mục chứa view
    public $folder;

    // Hàm hiển thị view theo tên file và dữ liệu
    public function render($file, $data = array())
    {
        // Tạo đường dẫn tới file view
        $viewFile = 'views/' . $this->folder . '/' . $file . '.php';

        // Kiểm tra xem file view có tồn tại hay không
        if (is_file($viewFile)) {
            // Gán các biến đôi thành các biến global để có thể truy cập từ bất kể file nào
            extract($data);
            // Mở buffer để lưu nội dung hiển thị của view
            ob_start();
            // Nạp file view
            require_once($viewFile);
            // Lấy nội dung hiển thị của view và đóng buffer và gán vào biến $content
            // Việc gán vào biến $content ứng với việc gán vào biến $content ở application.php ở trong thư mục views
            $content = ob_get_clean();
            // Nạp giao diện chung và hiển thị nội dung của view
            require_once('views/layouts/application.php');
        } else {
            // Nếu file view không tồn tại, trả về trang lỗi
            header('Location: index.php?controller=pages&action=error');
        }
    }
}