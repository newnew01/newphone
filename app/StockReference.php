<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockReference extends Model
{
    protected $table = 'stock_reference';

    public function detail()
    {
        return $this->hasMany(StockHistory::class,'reference_id');
    }
}
