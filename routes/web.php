<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
Route::get('/test',[HomeController::class,'index']);

Route::get('/', function () {
    return view('home', [
        'tittle' => 'Home',
        'active' => 'home'
        ]);
});


Route::get('/about', function () {
    return view('about', [
        'tittle' => 'About',
        'name' => 'Hira',
        'email' => 'kuroitsu@gmail.com',
        'desc' => 'A high schooler',
        'active' => 'about'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

//halaman singel post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories',function() {
    return view('categories', [
        'tittle' => 'Post Categories',
        'categories' => Category::all(),
        'active' => 'category'
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('category', [
        'tittle'=> $category->name,
        'posts'=> $category->posts->load('category','user'),
        'category' => $category->name,
        'active' => 'category'
    ]);
});

Route::get('/author/{user:username}', function(User $user){
    return view('posts', [
        'tittle'=> 'Posts by '.$user->name,
        'posts'=> $user->posts->load('category','user'),
        'active'=>'post'
    ]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);