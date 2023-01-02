@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Halaman About</h1>
    <h3>{{ auth()->user()->username }}</h3>
    <p>{{ auth()->user()->name }}</p>
    <p>{{ auth()->user()->email }}</p>
@endsection
    