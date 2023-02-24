<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'name',
        'price',
        'status',
    ];

    public function items() {
        return $this->hasMany(OrderItem::class, 'id', 'id_order');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }
}
