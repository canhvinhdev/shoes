<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Tên bảng
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * Tên các trường trong bảng
     *
     * @var array
     */
    protected $fillable = [        
        'id',
        'name',
        'updated_at',
        'created_at',
    ];
    
    public $timestamps = true;
}
