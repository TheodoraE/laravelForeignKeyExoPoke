@extends('template.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter un type</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/types" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Type : </label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="pokemon_id">Séléctioner un Pokemon : </label>
                <select name="pokemon_id" id="pokemon_id">
                    <option value="">Aucun</option>
                    @foreach ($pokemons as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-4">Ajouter</button>
        </form>
    </div>
@endsection