@extends('main')
@section('page_title','create')

@section('content')

    <h3 class="text-center mt-3">Dodavanje novog kontakta</h3>

    <div class="row">
        
        <div class="col-8 offset-2">
            <form action=" {{route('contact.save')}} " method="POST">
                
                 @csrf
                <input type="hidden" name="id" value="0">
                <label for="firstName">Ime:</label>
                <input type="text" id="firstName" class="form-control" name="first_name">
                   
                <label for="lastName">Prezime:</label>
                <input type="text" id="lastName" class="form-control" name="last_name">
                    
                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" name="email">
                
                <label for="city_name"></label>   
                <select name="city_id" id="city_name" class="form-control">
                    <option value="">--odaberite grad--</option>
                         @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>

                         @endforeach
                </select>
                 
                @foreach($hobbies as $hobby)
                
                <input type="checkbox" name="hobbies[]" id="{{$hobby->id}}" class="mt-2" value="{{$hobby->id}}">
                <label for="{{$hobby->id}}">{{$hobby->name}}</label>
                <br>
                @endforeach
               
                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>
                
            </form>
        </div>
    </div>
@endsection
