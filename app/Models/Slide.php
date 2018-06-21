<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $anhUrl
 */
class Slide extends Model
{
    /**
     * Tên bảng
     *
     * @var string
     */
    protected $table = 'slide';

    /**
     * Tên các trường trong bảng
     *
     * @var array
     */
    protected $fillable = [
    ];

}
