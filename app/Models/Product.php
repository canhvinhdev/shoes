<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\PromotionProduct;


class Product extends Model
{
    /**
     * Tên bảng
     * 
     * @var string 
     */
    protected $table = 'products';
    
    /**
     * Tên các trường trong bảng
     * 
     * @var array
     */
    // public function categories(){
    //     return $this->hasMany('App\Category','category_id','id');
    // }

    public static function listProduct()
    {
        $data = Product::where('status','=',1)->limit(8)->get();
        return $data;
    }
    public static function discount()
    {
        $data = PromotionProduct::join('promotion','promotion.id','=','promotion_product.promotion_id')
        ->where('promotion.end_day','>','Date')->get();
        return $data;
    }

       public function orders(){
        return $this->belongsToMany('App\Order','order_details', 'product_id', 'order_id');
    }

}
