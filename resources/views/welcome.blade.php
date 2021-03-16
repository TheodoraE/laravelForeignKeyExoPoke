@extends('template.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Les Pokemons</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col"> </th>
                <th scope="col"> </th>
                <th scope="col"> </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pokemons as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                        <img src="{{asset('storage/img/'.$item->url)}}" alt="" height="100px">
                    </td>
                    {{-- Show --}}
                    <td>
                        <a href="/pokemons/{{$item->id}}" class="btn btn-primary">SHOW</a>
                    </td>
                    {{-- Delete --}}
                    <td>
                        <form action="/pokemons/{{$item->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection