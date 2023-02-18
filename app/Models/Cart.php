<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['status'];


    public function User()
    {
    	return $this->hasOne(User::class, 'id', 'id_user');
    }
    public function Product()
    {
    	return $this->hasOne(Product::class, 'id', 'id_product');
    }
}
