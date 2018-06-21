<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $anhUrl
 */
class Order extends Model
{
    /**
     * Tên bảng
     *
     * @var string
     */
    protected $table = 'orders';

    public static function listOrder()
    {
        $data = Order::join('users', 'users.id', '=', 'orders.user_id')
            ->select('users.id as user_id', 'users.name', 'orders.price_all', 'orders.status', 'orders.method','orders.created_at','orders.id')
            ->get();
        return $data;
    }
public function products(){
        return $this->belongsToMany('App\Product','order_details' ,'product_id', 'order_id');
    }

    
}
