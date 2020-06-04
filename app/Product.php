<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'status',
        'size',
        'code',
        'price',
        'reference'
    ];

    public function category(){

        return $this->belongsTo(Category::class);

    }
}
