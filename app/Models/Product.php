<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    public function Category()
    {
    	return $this->hasOne(Category::class, 'id', 'id_cat');
    }

    public function Cart()
    {
    	return $this->belongsTo(Cart::class, 'id', 'id_product');
    }
}
