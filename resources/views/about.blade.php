@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Halaman About</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <p>{{ $desc }}</p>
@endsection
    