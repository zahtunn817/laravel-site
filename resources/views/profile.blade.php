@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Profile</h1>

    <div class="container">
            <div class="card p-3" style="width: 18rem;">
                <img src="https://source.unsplash.com/500x500?profile" class="card-img img-thumbnail rounded-circle" alt="...">

                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><strong>{{ $name }}</strong></li>
                    <li class="list-group-item">{{ $username }}</li>
                    <li class="list-group-item">{{ $email }}</li>
                    <li class="list-group-item"><small>{{ $about }}</small></li>
                </ul>
            </div>
    </div>
    
    
    <div class="container mt-5">
        <h3>{{ $tittle }}</h3>
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
                                    By. <a href="/user/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }}

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
    