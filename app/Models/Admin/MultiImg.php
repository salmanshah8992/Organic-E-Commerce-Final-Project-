<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImg extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function product(){
        return $this->belongsTo('App\Models\Admin\Product','product_id');
    }
}
