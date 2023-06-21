@extends('main')
@section('page_title','create country')

@section('content')
    <h3 class="text-center mt-3">Dodajte novu drzavu</h3>

    <div class="row">
       
        <div class="col-8 offset-2">
            <form action="{{route('country.save')}}" method="POST">
                @csrf
                <label for="taskName">Naziv države:</label>
                <input type="text" class="form-control task-input" name="name">
                
                <button class="btn btn-success w-100 mt-3" id="saveBtn">Sačuvaj</button>
            </form>
        </div>
    </div>
@endsection