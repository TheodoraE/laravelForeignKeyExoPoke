@extends('template.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter un Pokemon</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/pokemons" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom : </label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="level">Niveau : </label>
                <input type="number" name="level" value="{{old('level')}}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="url">Image : </label>
                <input type="file" name="url" id="">
            </div>

            <button type="submit" class="btn btn-success mt-4">Créer</button>
        </form>
    </div>
@endsection