<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $anhUrl
 */
class OrderDetail extends Model
{
    /**
     * Tên bảng
     *
     * @var string
     */
    protected $table = 'order_details';

    /**
     * Tên các trường trong bảng
     *
     * @var array
     */
    protected $fillable = [
    ];
    public static function listOrders()
    {
        $data = OrderDetail::join('products', 'products.id', '=', 'order_details.product_id')
            ->select('products.name', 'order_details.quantity', 'order_details.price')
            ->get();
        return $data;
    }
    

}
