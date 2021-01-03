<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = $request->user();
            $user->api_token = Str::random(80);
            $user->save();
            $token=$user->api_token;
            // dd($token);
            return redirect('/home');
           
        }
        return view('home');
    }
}
