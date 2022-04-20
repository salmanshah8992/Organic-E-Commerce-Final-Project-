<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Category', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Admin\Brand', 'brand_id');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Admin\Subcategory', 'subcategory_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function multiImage()
    {
        return $this->hasMany(MultiImg::class);
    }
}
