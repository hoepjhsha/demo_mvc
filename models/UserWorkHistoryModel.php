<?php

namespace models;

use abstracts\BaseModel;
use system\Database;

class UserWorkHistoryModel extends BaseModel
{
    // Lưu tên bảng tương ứng với model trong database
    public static string $table = 'user_work_histories';

    public int $id;
    public string $position;
    public string $title;
    public int $year;
    public int $user_id;

    public function __construct(int $id, string $position, string $title, int $year, int $user_id)
    {
        $this->id = $id;
        $this->position = $position;
        $this->title = $title;
        $this->year = $year;
        $this->user_id = $user_id;
    }

    // Lấy toàn bộ dữ liệu từ trong database với bảng tương ứng với model và chuyển về dạng oop và lưu dưới dạng mảng
    public static function all(): ?array
    {
        // Nhận kết nối database
        $db = Database::getInstance();
        // Thực thi truy vấn lấy tất cả dữ liệu từ bảng tương ứng với model
        $req = $db->query("SELECT * FROM " . self::$table);
        // Chuyển từng dòng dữ liệu về đối tượng UserWorkHistoryModel và lưu vào mảng $list
        foreach ($req->fetchAll() as $row) {
            $list[] = new UserWorkHistoryModel($row['id'], $row['position'], $row['title'], $row['year'], $row['user_id']);
        }
        // Trả về mảng $list nếu tồn tại dữ liệu, ngược lại trả về null
        return $list ?? null;
    }

    // Tìm kiếm dữ liệu theo id và trả về đối tượng UserWorkHistoryModel tương ứng nếu tồn tại, ngược lại trả về null
    public static function find(int $id): ?UserWorkHistoryModel
    {
        // Nhận kết nối database
        $db = Database::getInstance();
        // Thực thi truy vấn lấy dữ liệu từ bảng tương ứng với model theo id
        $items = self::all();
        // Chuyển từng dòng dữ liệu về đối tượng UserWorkHistoryModel và so sánh với id đã truyền và trả về đối tượng nếu tồn tại, ngược lại trả về null
        foreach ($items as $item) {
            if ($item->id === $id) {
                return $item;
            }
        }
        return null;
    }

    // Thêm mới dữ liệu vào database
    public static function insert(UserWorkHistoryModel|BaseModel $model): bool
    {
        // Nhận kết nối database
        $db = Database::getInstance();
        // Thực thi truy vấn thêm mới dữ liệu vào bảng tương ứng với model
        $req = $db->prepare("INSERT INTO ". self::$table. " (position, title, year, user_id) VALUES (:position, :title, :year, :user_id)");
        $req->bindParam(':position', $model->position);
        $req->bindParam(':title', $model->title);
        $req->bindParam(':year', $model->year);
        $req->bindParam(':user_id', $model->user_id);
        // Thực thi truy vấn và trả về kết quả thành công hay không
        return $req->execute();
    }

    // Cập nhật dữ liệu vào database
    public static function update(UserWorkHistoryModel|BaseModel $model): bool
    {
        // Nhận kết nối database
        $db = Database::getInstance();
        // Thực thi truy vấn cập nhật dữ liệu vào bảng tương ứng với model theo id
        $req = $db->prepare("UPDATE ". self::$table. " SET position = :position, title = :title, year = :year WHERE id = :id");
        $req->bindParam(':position', $model->position);
        $req->bindParam(':title', $model->title);
        $req->bindParam(':year', $model->year);
        $req->bindParam(':id', $model->id);
        // Thực thi truy vấn và trả về kết quả thành công hay không
        return $req->execute();
    }

    // Xóa dữ liệu ở database
    public static function delete(UserWorkHistoryModel|BaseModel $model): bool
    {
        // Nhận kết nối database
        $db = Database::getInstance();
        // Thực thi truy vấn xóa dữ liệu ở bảng tương ứng với model theo id
        $req = $db->prepare("DELETE FROM ". self::$table. " WHERE id = :id");
        $req->bindParam(':id', $model->id);
        // Thực thi truy vấn và trả về kết quả thành công hay không
        return $req->execute();
    }
}