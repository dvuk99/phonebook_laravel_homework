@extends('main')
@section('page_title','edit country')

@section('content')
    <h3 class="text-center mt-3">Izmijenite podatke o državi</h3>

    <div class="row">
       
        <div class="col-8 offset-2">
            <form action="{{route('country.update',['id'=>$country->id])}}" method="POST">
                 
                 @csrf
                 @method('PUT')
                <label for="taskName">Naziv države:</label>
                <input type="text" class="form-control task-input" name="name" value="{{$country->name}}">
                
                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>
            </form>
        </div>
    </div>

@endsection