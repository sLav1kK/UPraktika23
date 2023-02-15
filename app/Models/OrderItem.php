<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'quantity',
        'cost',
    ];

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
