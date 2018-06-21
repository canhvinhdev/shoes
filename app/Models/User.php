<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Tên bảng
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Tên các trường trong bảng
     *
     * @var array
     */
    protected $fillable = [        
        'id',
        'password',
        'username',
        'role_id',
        'address',
        'phone',
        'name',
        'email',
        'status',
        'birtday',
        'updated_at',
        'created_at '
    ];
    
    public $timestamps = true;
    
    public static function listUser()
    {
        $data = User::join('role', 'role.id', '=', 'users.role_id')
                ->select('users.username', 'users.fullname', 'users.email', 'users.address',
                        'users.phone', 'role.name')
                ->get();
        return $data;
    }

       public static function users(){
           $data = User::join('role', 'role.id', '=', 'users.role_id')
               ->where('role.name','=','user')
               ->count();
           return $data;
    }
    protected $hidden = [
        'password', 'remember_token',
    ];

}
