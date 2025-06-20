<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [] ;

    public function cards()
    {
        return $this->hasMany(Card::class , 'product_id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function ProductPhoto()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}