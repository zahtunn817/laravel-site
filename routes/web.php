<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPostController;
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

Route::get('/user/{user:username}', function(User $user){
    return view('profile', [
        'tittle'=> 'Posts by '.$user->name,
        'posts'=> $user->posts->load('user'),
        'active'=>'post'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');


Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// ! SEARCH, AUTHOR POSTS, AUTHOR PAGE, LOGIN REGIS AND ADMIN PAGE, CATEGORY CREATE PAGE