<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\UserController;
use Facade\FlareClient\View;
// use Illuminate\Routing\Route;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Location;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
Route::view('/','welcome');
Route::get('/welcome', function () {
    return view('welcome');
});


// Route::get('welcome','WelcomeController@welcome');
Route::prefix('admin')->middleware(['auth','verified'])->group(function () {
   Route::view('/', 'dashboard.admin');
   Route::resource('posts', 'PostController');
   Route::resource('profile', 'UserProfileController');
   Route::resource('profile', 'UserProfileController');
   Route::resource('users', 'UserController');

   Route::resource('pages', 'PageController');
   Route::resource('categories', 'CategoryController');
   Route::resource('roles', 'RoleController');
   Route::post('upload',function(){
      $filename = sprintf('tiny_%s.jpg', random_int(1, 1000));
      if (request()->hasFile('file'))
          $filename = request()->file('file')->storeAs('tiny', $filename, 'public');
      else
          $filename = null;
          if($filename !==null)
          {
             return response()->json(['location'=>asset('storage/'.$filename)],200);
          }
          else{
             return response()->json(['location'=>'Failed to upload'],200);
          }
   });
});

Auth::routes(['verify'=>true]);

Route::match(['get','post'],'/home', 'HomeController@index')->name('home');
