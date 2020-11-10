<?php

namespace App;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    protected $fillable = ['country_id','city','phone','photo'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function country()
    {
        return $this->hasOne('App\Country','id','country_id');
    }
    
}
