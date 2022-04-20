<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('price','quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderproducts(){
        return $this->hasMany(OrderProduct::class);
    }

    const ORDER_WAIT        = 0;
    const ORDER_CONFIRM     = 1;
    const ORDER_SHIPPING    = 2;
    const ORDER_FINISH      = 3;
    const ORDER_CANCEL      = 4;

    public static $status_text = [
        self::ORDER_WAIT        => 'Chờ xác nhận',
        self::ORDER_CONFIRM     => 'Đã xác nhận',
        self::ORDER_SHIPPING    => 'Đang giao hàng',
        self::ORDER_FINISH      => 'Đã giao hàng',
        self::ORDER_CANCEL      => 'Yêu cầu hủy đơn',
    ];

    public function getStatusTextAttribute(){
        return self::$status_text[$this->status];
    }
}
