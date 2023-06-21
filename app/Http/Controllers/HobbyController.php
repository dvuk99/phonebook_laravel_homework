<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class HobbyController extends Controller
{
    public function index(Request $request){
        $hobbies = Hobby::query();
        if($request->has('searchTerm')){
            $term = $request->get('searchTerm');
            $hobbies->where('name','like',"%$term%");
        }
        $hobbies = $hobbies->get();

        return view('hobby.index',compact('hobbies'));
    }

    public function create(){
        return view('hobby.create');

    }

    public function save(Request $request){
        $newHobbyDetails = $request->except('_token');

        Hobby::query()->create($newHobbyDetails);
        return Redirect::route('hobby.index');

    }

    public function edit($id,Request $request){
        $editHobby = Hobby::query()->findOrFail($id);
        return view('hobby.edit',compact('editHobby'));
    }

    public function update($id, Request $request){
        $hobby = Hobby::query()->findOrFail($id);
        $newHobbyDetails = $request->only('name');
        
        $hobby->update($newHobbyDetails);
        return Redirect::route('hobby.index');
    }

    public function delete($id){
        $hobby = Hobby::query()->findOrFail($id);
        $hobby->delete();
        return Redirect::route('hobby.index');
        
       
    }
}
