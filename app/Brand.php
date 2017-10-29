<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    static public function isDuplucated($brand)
    {
        return Brand::where('brand_name','=',$brand)->exists();

    }
}
