<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            "tittle" => "All Posts",
            "active" => "post",
            "posts" => Post::with(['user', 'category'])->latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "tittle" => "Single Post",
            "active" => "post",
            "post" => $post
        ]);
    }
}
