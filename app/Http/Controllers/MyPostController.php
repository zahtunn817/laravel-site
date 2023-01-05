<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MyPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('myposts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
            'tittle' => 'Write',
            'active' => 'write'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myposts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request-> validate([
            'tittle' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' =>'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['user_id']= auth()->user()->id;
        $validatedData['excerpt']= Str::limit(strip_tags($request->body),200,'...');

        Post::create($validatedData);

        return redirect('/myposts')->with('success', 'New post has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('myposts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('myposts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'tittle' => 'required|max:255',
            'category_id' => 'required',
            'image' =>'image|file|max:1024',
            'body' => 'required'
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        
        if($request->file('image')) {
            // if($request->oldImage){
            //     Storage::delete($request->oldImage);
            // }

            if($post->image){
                Storage::delete($post->image);
            }

            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['user_id']= auth()->user()->id;
        $validatedData['excerpt']= Str::limit(strip_tags($request->body),200,'...');

        Post::where('id', $post->id)
        ->update($validatedData);

        return redirect('/myposts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/myposts')->with('success', 'Your post has been deleted!');
    }

    public function checkSlug( Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
