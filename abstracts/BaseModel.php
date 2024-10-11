<?php

namespace abstracts;

use AllowDynamicProperties;
use system\Database;

abstract class BaseModel
{
    abstract public static function all();

    abstract public static function insert();

    abstract public static function update();

    abstract public static function delete();
}