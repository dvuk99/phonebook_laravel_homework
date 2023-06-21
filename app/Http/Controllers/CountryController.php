<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CountryController extends Controller
{
    public function index(Request $request){
        $countries = Country::query();
        if($request->has('searchTerm')){
            $term = $request->get('searchTerm');
            $countries->where('name','like',"%$term%");
        }
        $countries = $countries->get();

        return view('country.index',compact('countries'));

    }
    
    public function create(){
        return view('country.create');

    }

    public function save(Request $request){
        $newCountry=$request->except('_token');
        
        
        Country::query()->create($newCountry);
        return Redirect::route('country.index');
      
    }

    public function edit($id){
       
        
        $country = Country::query()->findOrFail($id);
        
        return view('country.edit',compact('country'));

    }

    public function update($id,Request $request){
        $country = Country::query()->findOrFail($id);
        $newDetails = $request->except('_token');
        $country->update($newDetails);

        return Redirect::route('country.index');

    }

    public function delete($id){
        $country = Country::query()->findOrFail($id);
        $country->delete();

        return Redirect::route('country.index');
    }
}
