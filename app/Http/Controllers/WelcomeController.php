<?php
namespace App\Http\Controllers;
use App\Models\Post;


class WelcomeController extends Controller{
    public function welcome()
    {
        $posts=new Post;
         
        $data= $posts->data();
        
        return view('welcome',compact('data'));
    }
}