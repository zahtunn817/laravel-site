@extends('layouts.main')

@section('content')
<h1  class="mb-4">HiRenJi Blog</h1>

@guest
<h3>Mulai tuangkan idemu dan biarkan dunia membacanya!</h3>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="/posts">
        <img src="https://source.unsplash.com/900x300?book" class="d-block w-100" alt="...">
        </a>
        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.7); border-radius: 50px;">
          <h5>Read!</h5>
          <p>Discover the world that are yet to be unfold!</p>
        </div>
      </div>
      <div class="carousel-item">
        <a href="/login">
        <img src="https://source.unsplash.com/900x300?write" class="d-block w-100" alt="...">
        </a>
        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.7); border-radius: 50px;">
          <h5>Write!</h5>
          <p>Write and share your story!</p>
        </div>
      </div>
      <div class="carousel-item">
        <a href="/login">
        <img src="https://source.unsplash.com/900x300?story" class="d-block w-100" alt="...">
        </a>
        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.7); border-radius: 50px;">
          <h5>This is the Starting Line!</h5>
          <p><a href="/login">Login</a> and dive deeper to the world of literature!</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endguest

@auth
<h3>Selamat datang, {{ auth()->user()->name }}!</h3>
@endauth

  
@endsection