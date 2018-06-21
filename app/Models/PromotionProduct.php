<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PromotionProduct extends Model
{
    /**
     * Tên bảng
     * 
     * @var string 
     */
    protected $table = 'promotion_product';
    
    /**
     * Tên các trường trong bảng
     * 
     * @var array
     */
    protected $fillable = [

    ];
    public $timestamps = false; 
}