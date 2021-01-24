<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const STATUS_NORMAL = 0;
    const STATUS_DISABLE = 1;

    const STATUS_MAP = [
        self::STATUS_NORMAL  => '正常',
        self::STATUS_DISABLE => '关闭',
    ];
}
