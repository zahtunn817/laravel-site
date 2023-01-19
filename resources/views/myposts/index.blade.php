@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">{{ session('success') }}</div>
@endif


    <div class="container">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col">
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
                                    {{ $post->created_at->diffForHumans() }}
                                    {{-- <p>{{ substr($post->body,3,50).'...' }}</p> --}}
                                </small>
                            </p>

                            <div class="d-block">
                                <a href="/myposts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="/myposts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                <form action="/myposts/{{ $post->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection