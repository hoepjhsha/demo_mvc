# demo_mvc : **Portfolio**
<img src="https://images.viblo.asia/full/010d0558-8f86-471f-898f-da3344e2849a.png">

## Cấu trúc thư mục
```
|--demo_mvc
    |--abstracts
        |--BaseController.php
        |--BaseModel.php
    |--config
    |--controllers
        |--PagesController.php
        |--UserWorkHistoriesController.php
    |--helpers
    |--interfaces
    |--middlewares
    |--models
        |--UserWorkHistoryModel.php
    |--system
        |--Database.php
    |--views
        |--_assets
            |--fonts
            |--images
            |--javascripts
            |--stylesheets
            |--sqlDB
                |--portfolio.txt
        |--layouts
            |--application.php
        |--pages
            |--error.php
            |--home.php
        |--work_histories
            |--index.php
            |--show.php
    |--composer.json
    |--index.php
```

Giải thích về cấu trúc thư mục trên:
- thư mục `demo_mvc` : là thư mục chứa project.
- `abstracts` : là thư mục chứa các abstracts, là các lớp base để cho các lớp khác kế thừa sử dụng để tái sử dụng code.
- `config` : chứa các file config như kiểu `routes.php` nhưng trong project này nó được gộp luôn ở `index.php`.
- `controllers` : chứa các file định nghĩa các lớp controller, có các hàm trong đó tương tác với model và gọi ra view để trả về cho người dùng.
- `helpers` : cái này chịu, chắc chứa cái gì đó tên helper.
- `interfaces` : như tên, chứa interface.
- `middlewares` : tương tự.
- `system` : chứa các file system.
- `views` : chứa thư mục `layouts` chứa template hiển thị chung của trang web trong file `application.php` và chứa các views khác.
- `_assets` : gồm các file font chữ, hình ảnh, javascript, css...
- `composer.json` : chứa mấy cái autoload, muốn có autoload nhớ chạy `composer dump-autoload`.
- `index.php` : file mà trang truy cập đầu tiên, nhận các cái param.
<br>File này sẽ là file nhận mọi yêu cầu truy vấn lên server. Bởi vậy, mọi đường dẫn truy cập đều phải có dạng `/?param=value` hoặc `/index.php?param=value`.

Thứ tự file được tác động:
`index.php` nhận `controller` và `action` xong sẽ chuyển sang class `Controller` tương ứng, rồi từ `Controller` sẽ gọi lên `action` được truyền tới file tương ứng và nhét file đấy vào `application.php`.

VD: đường dẫn là `index.php?controller=pages&action=home` thì sẽ nhận `controller` là `pages` và `action` là `home`. sau đó chuyển sang class tương ứng được lưu trong array `controllers`. và gọi cái `action` của nó lên là `home`. action `home` sẽ gọi cái file `views/pages/home.php` và được gắn vào `content` ở trong file `application.php`.