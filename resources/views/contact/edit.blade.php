@extends('main')
@section('page_title','edit contact')

@section('content')

    <h3 class="text-center mt-3">Izmjena kontakta</h3>

    <div class="row">
        
        <div class="col-8 offset-2">
            <form action=" {{route('contact.update',['id'=>$contact->id])}} " method="POST">
                
                 @csrf
                 @method('PUT')
                <input type="hidden" name="id" value="0">
                <label for="firstName">Ime:</label>
                <input type="text" id="firstName" class="form-control" name="first_name" value="{{ $contact->first_name }}">
                   
                <label for="lastName">Prezime:</label>
                <input type="text" id="lastName" class="form-control" name="last_name" value="{{ $contact->last_name}}">
                    
                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ $contact->email }}">
                
                <label for="city_name">Izaberite grad</label>
                <select name="city_id" id="city_name" class="mt-2 form-control">
                    
                    @foreach($cities as $city)
                        @if($city->name==$contact->city->name)
                           <option value="{{$city->id}}" selected>{{$city->name}}</option>
                        @else

                           <option value="{{$city->id}}">{{$city->name}}</option>

                        @endif


                    @endforeach
                </select>
                 
                
                @foreach($hobbies as $hobby)
                     @if(in_array($hobby->id,$hobbyContactArray))
                <input type="checkbox" name="hobbies[]" id="{{$hobby->id}}" class="mt-2" value="{{$hobby->id}}" checked>
                     @else 
                <input type="checkbox" name="hobbies[]" id="{{$hobby->id}}" class="mt-2" value="{{$hobby->id}}">     
               
                 @endif
                <label for="{{$hobby->id}}">{{$hobby->name}}</label>
                <br>
                @endforeach
                
               
                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>
                
            </form>
        </div>
    </div>


@endsection