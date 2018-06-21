<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	
    /**
     * Tên bảng
     * 
     * @var string 
     */
    protected $table = 'news';
    
    /**
     * Tên các trường trong bảng
     * 
     * @var array
     */
    protected $fillable = [
        'id',        
        'name',        
        'content',        
        'image',
        'user',
        'created_at',
        'updated_at',
        'status'      
    ];

    // public static function optionLoaiTin()
    // {
    // 	return [
    // 		self::MON_AN => 'Món ăn',
    // 		self::LE_HOI => 'Lễ hội',
    // 	];
    // }

    public static function listNew()
    {
//    	$data = News::join('users', 'users.id', '=', 'news.user_id')
//                ->select('news.id', 'news.name as name', 'news.describes', 'news.status', 'users.name')
//                ->get();
        $data = News::select('news.id', 'news.name as name', 'news.description', 'news.status','news.created_at')
            ->get();
        return $data;
    }
     public function users_new(){
        return $this->belongsTo('App\User','user_id');
    }
}
