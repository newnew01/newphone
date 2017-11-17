<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockInReference extends Model
{
    protected $table = 'stockin_reference';

    public function detail()
    {
        return $this->hasMany(StockHistory::class,'reference_id')->where('status','=','2');
    }
}
