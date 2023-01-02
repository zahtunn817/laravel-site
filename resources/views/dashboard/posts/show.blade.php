@extends('dashboard.layouts.main')

@section('content')
<article>
    <div class="container mt-4">
        <div class="row mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->tittle }}</h1>
            
                <p>By. <a href="/author/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/posts?categpry={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn bg-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>
                
                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                </div>
                @else  
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif
                
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
    
                <a href="/posts" class="text-decoration-none">Back to Posts</a>
            </div>
        </div>
    </div>
</article>

@endsection

{{-- ! BUTTONNYA TIDAK KELUAR ICON --}}
{{-- TODO BENERIN LAH eps17 --}}