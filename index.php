<?php
//Thêm cái autoload vào project
require_once __DIR__ . '/vendor/autoload.php';

//đường link sẽ có dạng index.php?param=value
//vậy thì với cái mình get là controller và action nên đường link của mình sẽ có dạng index.php?controller=value&action=value
//VD:index.php?controller=pages&action=error
//Kiểm tra xem trên đường link xem có giá trị controller được truyền vào không
if (isset($_GET['controller'])) {
    //nếu có thì lấy giá trị controller và action từ đường link
    $controller = $_GET['controller'];
    $action = $_GET['action'] ?? 'index';
} else {
    //nếu không có thì đặt mặc định controller và action là pages và home
    $controller = 'pages';
    $action = 'home';
}

//Đây là nơi chứa các controller mà trong hệ thống có mà mình đã code function cho nó
$controllers = array(
    //'pages' là từ khóa ghi trên đường link, khóa này lưu giá trị dạng mảng bao gồm đầu tiên là class Controller
    //      tương ứng với controller ở đường link truyền vào, thứ 2 là mảng các action của controller đó
    //ví dụ: ['home', 'error'] tức có 2 action home và error cho controller pages, tương ứng với đườngng link index.php?controller=pages&action=value
    //      mỗi controller sẽ có 1 hoặc nhiều action để phù hợp với các truy vấn đến nó
    //Để sử dụng mảng này thì như sau: <tên biến>[<tên khóa>][<index của phần tử của mảng mình cần truy cập
    //  ví dụ: muốn lấy cái class của controller=pages thì viết như sau: $controllers['pages'][0]
    'pages' => [\controllers\PagesController::class, ['home', 'error']],
    'work-histories' => [\controllers\UserWorkHistoriesController::class, ['index', 'show']],
);

//kiểm tra xem controller và action truyền vào có tồn tại trong mảng controllers hay không
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller][1])) {
    //nếu không tồn tại thì đặt mặc định controller và action là pages và home
    $controller = 'pages';
    $action = 'error';
}

//Nhận class Controller tương ứng với controller
$klass = $controllers[$controller][0];
//Khởi tạo class Controller đó. Đây là dạng ReflectionClass, kiểu viết khá là bố láo của php.
//VD: url: index.php?controller=pages&action=home . thì $klass nhận giá trị là PagesController, và khởi tạo class đó
$controller = new $klass();
//Gọi hàm tương ứng. Trong vd trên thì $action được gán bằng 'home' thì hàm dưới sẽ chạy là $controller->home();
$controller->$action();