@extends('layouts.main')

@section('content')
    <article>
        <h1 class="mb-4">{{ $post->tittle }}</h1>
        
        <p>By. <a href="/author/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/posts?categpry={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
        {!! $post->body !!}
    </article>

    <a href="/posts" class="text-decoration-none">Back to Posts</a>
@endsection