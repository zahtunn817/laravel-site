@extends('layouts.main')

@section('content')
    <h1  class="mb-4">HiRenJi Blog</h1>

    @guest
       <h3>Mulai tuangkan idemu dan biarkan dunia membacanya!</h3>
       <p>Segera login dan buat postinganmu!</p>
       <a href="/login">
           <button type="button" button class="w-20 btn btn-lg btn-primary">Login</button>
       </a>
    @endguest

    @auth
        <h3>Selamat datang, {{ auth()->user()->name }}!</h3>
        <p>Ayo menulis lagi!</p>
        <a href="/dashboard">
            <button type="button" button class="w-20 btn btn-lg btn-primary">Dashboard</button>
        </a>
    @endauth

@endsection