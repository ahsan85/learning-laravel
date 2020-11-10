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
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });


/*  this is my 5th class practice */

Route::get('/test','UserController@test' );
// Required route with dynamic parameter
/*
 Route::get('welcome/{name}',function ($name){
    return "welcome,".$name;
 });
*/


// optional route with dynamic parameter
/*
 Route::get('welcome/{name?}',function ($name=" "){
    return "welcome,".$name;
 });
*/

// Route::get('welcome','WelcomeController@welcome');
Route::prefix('admin')->group(function () {
   Route::view('/', 'dashboard.admin');
   Route::resource('posts', 'PostController');
   Route::resource('profile', 'UserProfileController');
   Route::resource('profile', 'UserProfileController');
   Route::resource('users', 'UserController');

   Route::resource('pages', 'PageController');
   Route::resource('categories', 'CategoryController');
   Route::resource('roles', 'RoleController');
});
