<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
class Post extends Model
{
    protected $appends = ['slug'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function setSlugAttribute($value)
    {
        $slug=trim(preg_replace("/[^\w\d]+/i","-",$value),"-");
        $count=$this->where('slug','like',"%${slug}%")->count();
        if($count>0)
        $slug=$slug.($count+1);
        $this->attributes['slug']=strtolower($slug);
    }
    
    public function getSlugAttribute($value)
    {
       if($value==null)
       {
           return $this->id;
       }
    }
    public function user()
    {
      
        return $this->belongsTo(User::class,'user_id','id');
    }

}

