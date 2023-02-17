<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'price',
        'count',
    ];

    public $timestamps = false;

    public function order() {
        return $this->belongsTo(Order::class, 'id', 'id_order');
    }
    public function product() {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
}
