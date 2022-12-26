@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Post Categories</h1>
    
    @foreach ($categories as $category)
    <ul>
        <li>
            <h2>
                <a href="/posts?category={{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a>
            </h2>
        </li>
    </ul>
         
    @endforeach
@endsection