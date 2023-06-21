@extends('main-nvb')
@section('page_title','pocetna')
@section('content')

    <h3 class="text-center mt-3">Lista kontakta</h3>

    <div class="row">
        <div class="col-8 offset-2 mt-3 table-responsive">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="searchTerm" class="form-control" value="{{request()->get('searchTerm')}}" placeholder="Pretraga kontakt">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Pretraži</button>
                    </div>
                    <div class="col-3">
                        
                            <a href="{{ route('contact.create') }}" class="btn btn-success w-100">+Dodaj Novi</a>
                        
                    </div>
                </div>
            </form>

          

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th>Grad</th>
                        <th>Drzava</th>
                        <th>Hobiji</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($contacts as $contact)
                        <tr> 
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->first_name }}</td>
                            <td>{{ $contact->last_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->city->name }}</td>
                            <td>{{ $contact->city->country->name }}</td>
                            <td>   
                                @foreach($contact->hobbies as $hobby)

                                    {{$hobby->name}}
                                @endforeach
                            </td>
                            <td><a href=" {{ route('contact.edit', ['id'=> $contact->id]) }} " class="btn btn-primary btn-sm">Izmjena</a></td>
                            <td>
                                <form action=" {{route('contact.delete',['id'=>$contact->id])}} " method="POST">
                                 @csrf     
                                 @method('DELETE')
                                   
                                    <button class="btn btn-danger btn-sm"> brisanje </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
      
    </div>

@endsection