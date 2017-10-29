<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    static public function isDuplicated($cate)
    {
        return Category::where('cate_name','=',$cate)->exists();
    }
}
