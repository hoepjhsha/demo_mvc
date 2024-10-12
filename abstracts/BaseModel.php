<?php

namespace abstracts;

abstract class BaseModel
{
    public static string $table;

    // Các hàm cơ bản của 1 class Object Model cần có thì nên tạo 1 class base để các class sau kế thừa
    abstract public static function all();

    abstract public static function insert(BaseModel $model);

    abstract public static function update(BaseModel $model);

    abstract public static function delete(BaseModel $model);
}