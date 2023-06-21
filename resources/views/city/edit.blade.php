@extends('main')
@section('page_title','edit city')

@section('content')
    <h3 class="text-center mt-3">Izmijenite podatke o gradu</h3>

    <div class="row">
      
        <div class="col-8 offset-2">
            <form action="{{route('city.update',['id'=>$city->id])}}" method="POST">
                @csrf
                @method('PUT')
                <label for="name">Naziv grada:</label>
                <input type="text" id="name" class="form-control" name="name" value="{{$city->name}}">
               
                <select name="country_id" id="country_name" class="form-control mt-2">
                    <option value="">-odaberite drzavu-</option>
                    @foreach($countries as $cntr)
                         
                        @if($cntr->name==$city->country->name)
                            <option value="{{$city->country->id}}" selected>{{$city->country->name}}</option>
                        
                        @else
                            <option value="{{ $cntr->id }}">{{ $cntr->name }}</option>
                        @endif

                    @endforeach
                   
                </select>
                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>
            </form>
        </div>
    </div>
@endsection