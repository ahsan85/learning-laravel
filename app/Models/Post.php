<?php
namespace App\Models;

use Highlight\Mode;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    public function data()
    {
        return[
            'name'=>"Ahsan",
            'company'=> "Workgroup"
        ];
    }
}