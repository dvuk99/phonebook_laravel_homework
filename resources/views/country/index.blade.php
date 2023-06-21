@extends('main-nvb')
@section('page_title','countries')

@section('content')
    <h3 class="text-center mt-3">Lista država</h3>

    <div class="row">
        <div class="col-8 offset-2 table-responsive">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="searchTerm" class="form-control" value="{{ request()->get('searchTerm') }}" placeholder="Pretraga država">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Pretraži</button>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('country.create') }}" class="btn btn-success w-100">+Dodaj Novi</a>
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
                       @foreach($countries as $country)
                           <tr>
                            <td>{{ $country->id }}</td>
                            <td>{{ $country->name }}</td>
                            <td> <a href="{{ route('country.edit', ['id'=>$country->id]) }}" class="btn btn-primary btn-sm">Izmjena</a></td>
                            <td> 
                                <form action="{{route('country.delete',['id'=>$country->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Brisanje</button>
                                </form>
                            </td>
                           </tr>

                       @endforeach
                   
                </tbody>
            </table>

        </div>
      
    </div>
@endsection