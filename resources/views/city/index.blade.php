@extends('main-nvb')
@section('page_title','gradovi')

@section('content')
    <h3 class="text-center mt-3">Lista gradova</h3>

    <div class="row">
        <div class="col-8 offset-2 table-responsive">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="searchTerm" class="form-control" value="" placeholder="Pretraga gradova">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Pretraži</button>
                    </div>
                    <div class="col-3">
                        <a href="{{route('city.create')}}" class="btn btn-success w-100">+ Dodaj Novi</a>
                    </div>
                </div>
            </form>

          

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Država</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($cities as $city)
                         <tr>
                            <td>{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                            <td>{{$city->country->name}}</td>
                            <td><a href="{{route('city.edit',['id'=>$city->id])}}" class="btn btn-primary btn-sm">izmjena</a></td>
                            <td>
                                <form action="{{ route('city.delete',['id' => $city->id ]) }}" method="POST">
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