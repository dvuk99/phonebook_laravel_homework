@extends('main')
@section('page_title','edit hobi')

@section('content')
    <h3 class="text-center mt-3">Izmijenite hobi</h3>

    <div class="row">
        
        <div class="col-8 offset-2">
            <form action="{{route('hobby.update',['id'=>$editHobby->id])}}" method="POST">
                @csrf
                @method('PUT')
                <label for="taskName">Naziv hobija:</label>
                <input type="text" class="form-control task-input" name="name" value="{{ $editHobby->name }}">
               
                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>
            </form>
        </div>
    </div>
@endsection