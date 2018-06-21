<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	
    /**
     * Tên bảng
     * 
     * @var string 
     */
    protected $table = 'contact';
    
    /**
     * Tên các trường trong bảng
     * 
     * @var array
     */
    public $timestamps = true;
}