<?php

namespace models;

use abstracts\BaseModel;
use system\Database;

class UserWorkHistoryModel extends BaseModel
{
    public string $table = 'user_work_histories';

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

    public static function all(): ?array
    {
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM user_work_histories");
        foreach ($req->fetchAll() as $row) {
            $list[] = new UserWorkHistoryModel($row['id'], $row['position'], $row['title'], $row['year'], $row['user_id']);
        }
        return $list ?? null;
    }

    public static function find(int $id): ?UserWorkHistoryModel
    {
        $db = Database::getInstance();
        $items = self::all();
        foreach ($items as $item) {
            if ($item->id === $id) {
                return $item;
            }
        }
        return null;
    }

    public static function insert()
    {
        // TODO: Implement insert() method.
    }

    public static function update()
    {
        // TODO: Implement update() method.
    }

    public static function delete()
    {
        // TODO: Implement delete() method.
    }
}