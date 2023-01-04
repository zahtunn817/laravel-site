<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){

        return view('posts', [
            "tittle" => "All Posts",
            "active" => "post",
            "posts" => Post::with(['category', 'user'])->latest()->filter(request(['search', 'category', 'user']))->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "tittle" => "Single Post",
            "active" => "post",
            "post" => $post
        ]);
    }

    public function user(User $user){
        return view('profile', [
            'tittle'=> 'Posts by '.$user->name,
            'posts'=> $user->posts->load('user'),
            'active'=>'post',
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'about' => 'writer'
        ]);
    }
}
