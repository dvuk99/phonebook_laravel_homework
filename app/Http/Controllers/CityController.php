<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    public function index(Request $request){
      
       $cities = City::query();
       if($request->has('searchTerm')){
        $searchTerm = $request->get('searchTerm');
      
        $cities = $cities->where('name','like',"%$searchTerm%");
       }
       $cities = $cities->get();
     return view('city.index',compact('cities'));
    }

    public function create(){
        $countries = Country::query()->get();
        return view('city.create',compact('countries'));
    }

    public function save(Request $request){
        $country = Country::query();
        $newCityDetails = $request->except('_token');
        City::query()->create($newCityDetails);
        
        return Redirect::route('city.index');   
    }

    public function edit($id){
        $city = City::query()->find($id);
        $countries = Country::query()->get();
        $country = $city->country;
        
        return view('city.edit',compact('city','country','countries'));
    }

    public function update($id,Request $request){
        $city = City::query()->findOrFail($id);
        $cityNewDetails = $request->only(['name','country_id']);
        $city->update($cityNewDetails);
        return Redirect::route('city.index');

    }


    public function delete($id){
        $city = City::query()->findOrFail($id);
        $city->delete();
        return Redirect::route('city.index');
        
    }

}
