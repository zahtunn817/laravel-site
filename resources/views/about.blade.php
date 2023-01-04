@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Halaman About</h1>
    <div class="container">
        <div class="card p-3" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x500?profile" class="card-img img-thumbnail rounded-circle" alt="...">

            <ul class="list-group list-group-flush mt-3">
                <li class="list-group-item"><strong>{{ auth()->user()->name }}</strong>  <i class="bi bi-pencil-square" style="align:right;"></i></li>
                <li class="list-group-item">{{ auth()->user()->username }}</li>
                <li class="list-group-item">{{ auth()->user()->email }}</li>
                <li class="list-group-item"><small>writer</small></li>
            </ul>
        </div>
</div>
@endsection
    