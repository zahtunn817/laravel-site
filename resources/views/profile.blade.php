@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Profile</h1>
    <h3>{{ $tittle }}</h3>

    <h3>{{ $post->user->username }}</h3>
    <p>{{ $post->user->name }}</p>
    <p>{{ $post->user->email }}</p>


    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>

                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                        @else  
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" alt="{{    $post->category->name }}" class="card-img-top">
                         @endif
    
                        <div class="card-body">
                            <h5 class="card-tittle">{{ $post->tittle }}</h5>
                            <p>
                                <small>
                                    By. <a href="/posts?author={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }}

                                    {{-- <p>{{ substr($post->body,3,50).'...' }}</p> --}}

                                </small>
                            </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
    