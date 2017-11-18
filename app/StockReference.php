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

    public function status()
    {
        return $this->belongsTo(Status::class,'status_id');
    }

    public function sourceBranch()
    {
        return $this->belongsTo(Branch::class,'source_branch');
    }

    public function destinationBranch()
    {
        return $this->belongsTo(Branch::class,'destination_branch');
    }

    public function type()
    {
        return $this->belongsTo(StockRefType::class,'ref_type');
    }
}
