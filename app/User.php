<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\UserProfile;
use App\Role;
class User extends Authenticatable implements MustVerifyEmail
{
    
    use Notifiable;
    
     protected $guard=[];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','api_token'
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
    public function profile()
    {
        return $this->hasOne(UserProfile::class,'user_id','id');
    }

    public function roles()
    {

        return $this->belongsToMany(Role::class);
    }
    public function setUsernameAttribute($username)
    {
    
        $username=trim(preg_replace("/[^\w\d]+/i","-",$username),"-");
        $count=User::where('username','like',"%${username}%")->count();
        if($count>0)
        $username=$username.($count+1);
        $this->attributes['username']=strtolower($username);
    }
    public function posts()
    {
      return $this->hasMany(Post::class);
    }
   
    
}

