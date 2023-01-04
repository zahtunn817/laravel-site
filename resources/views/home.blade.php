@extends('layouts.main')

@section('content')
    <h1  class="mb-4">HiRenJi Blog</h1>

    @guest
       <h3>Mulai tuangkan idemu dan biarkan dunia membacanya!</h3>
    @endguest

    @auth
        <h3>Selamat datang, {{ auth()->user()->name }}!</h3>
    @endauth

@endsection