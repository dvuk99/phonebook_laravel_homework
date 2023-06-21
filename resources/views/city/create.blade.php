@extends('main')
@section('page_title','create city')

@section('content')
    <h3 class="text-center mt-3">Dodajte novi grad</h3>

    <div class="row">
      
        <div class="col-8 offset-2">
            <form action="{{route('city.save')}}" method="POST">
                @csrf
                <label for="name">Naziv grada:</label>
                <input type="text" id="name" class="form-control" name="name">
               
                <select name="country_id" id="country_name" class="form-control mt-2">
                    <option value="">-odaberite drzavu-</option>
                        @foreach($countries as $country)

                            <option value="{{$country->id}}">{{$country->name}}</option>
                       
                        @endforeach
                </select>
                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>
            </form>
        </div>
    </div>
@endsection