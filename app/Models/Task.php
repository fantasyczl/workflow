<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public static function daily()
    {
        $tasks = static::where('created_at', ">=", date('Y-m-d 00:00:00'))
            ->orderBy('created_at', 'asc')
            ->get();

        return $tasks;
    }
}
