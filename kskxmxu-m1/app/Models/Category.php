<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

	public function Product()
	{
	    return $this->belongsTo(Product::class, 'id', 'id_cat');
	}
}
