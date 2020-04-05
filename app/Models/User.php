<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'user_id');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post', 'user_id');
    }

    //This function is being called from blade views to show buttons
    public function isAdmin(){
        if(\Auth::check()){
            $email = \Auth::user()->email;
            if($email == 'superadmin@test.com' || $email == 'admin@test.com'){
                return true;
            } else{
                return true;
            }           
        }
    }

    public function isNotAdmin(){
        if(\Auth::check()){
            $email = \Auth::user()->email;
            if($email != 'superadmin@test.com' && $email != 'admin@test.com'){
                return true;
            }            
        }
    }

    public function isSuperAdmin(){
        return true;
    }
}
