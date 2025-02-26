<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    //
    protected $table = 'product_list';
    public $timestamps = false;

    protected $fillable = ['name', 'category_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
