@extends('template.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card text-center" style="width: 18rem;">
                <img src="{{asset('storage/img/'.$show->url)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$show->name}}</h5>
                  <p class="card-text">Niveau : {{$show->level}}</p>
                  {{-- <p class="card-text">Type : {{$show->pokemons->name}}</p> --}}
                  <a href="/" class="btn btn-primary">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection