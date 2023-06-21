@extends('main-nvb')
@section('page_title','hobiji')

@section('content')
    <h3 class="text-center mt-3">Lista hobija</h3>

    <div class="row">
        <div class="col-8 offset-2 table-responsive">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="searchTerm" class="form-control" value="{{request()->get('searchTerm')}}" placeholder="Pretraga hobija">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Pretraži</button>
                    </div>
                    <div class="col-3">
                        <a href="{{route('hobby.create')}}" class="btn btn-success w-100">+Dodaj Novi</a>
                    </div>

                </div>
            </form>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hobbies as $hobby)
                      <tr>
                        <td>{{ $hobby->id }}</td>
                        <td>{{ $hobby->name }}</td>
                        <td><a href="{{ route('hobby.edit',['id' => $hobby->id]) }}" class="btn btn-primary btn-sm">Izmjena</a></td>
                        <td>
                            <form action="{{route('hobby.delete',['id' => $hobby->id])}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">brisanje</button>

                            </form>
                        </td>
                      </tr>
                    @endforeach
                    
                </tbody>
            </table>

        </div>
        
    </div>
@endsection