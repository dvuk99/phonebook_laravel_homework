<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\City;
use App\Models\Hobby;
use App\Models\ContactHobby;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ContactController extends Controller
{
    public function index(Request $request){

        $contacts = Contact::query();
        
        if($request->has('searchTerm')){
           
            $term = $request->get('searchTerm');
            $contacts->where('first_name', 'like', "%$term%")
                     ->orWhere('last_name','like',"%$term%");
        }
        
        $contacts = $contacts->get();
        return view('contact.index',compact('contacts'));
    }

    public function create(){
        $cities = City::query()->get();
        $hobbies = Hobby::query()->get();
        return view('contact.create',compact('cities','hobbies'));
    }

    public function save(Request $request){

        $newContactDetails = $request->except('_token','hobbies');
        Contact::query()->create($newContactDetails);

        $idContact = Contact::latest()->first()->id;
        $hobbies = $request->get('hobbies');
        
        foreach($hobbies as $hobby){
            $dodavanjeUPivot = array('contact_id'=>$idContact,'hobby_id'=>$hobby);
           
            ContactHobby::query()->create($dodavanjeUPivot);
        }

        return Redirect::route('contact.index');

    }

    public function edit($id){
        $contact = Contact::query()->findOrFail($id);
        $cities = City::query()->get();
        $hobbies = Hobby::query()->get();
        
        $hobbyContact = ContactHobby::query();
        $hobbyContact = $hobbyContact->where('contact_id','=',"$id")->get();
        $hobbyContact  = json_decode($hobbyContact,true);
        $finalArray=array();
        $br=0;
        foreach($hobbyContact as $hb){
             $hobbyContactArray[$br++]=$hb['hobby_id'];
        }
        return view('contact.edit',compact('contact','cities','hobbies','hobbyContactArray'));
       
    }

    public function update($id,Request $request){
        $contact = Contact::query()->findOrFail($id);
       
        $newDetails = $request->only(['first_name','last_name','email','city_id']);
        $contact->update($newDetails);

        $contactHobbies = ContactHobby::query()->get();
        
        foreach($contactHobbies as $contactHobby){
            if($contactHobby->contact_id==$id){
                ContactHobby::query()->findOrFail($contactHobby->id)->delete();
            }
        }

        $hobbies = $request->get('hobbies');
        foreach($hobbies as $hobby){
            $dodavanjeUPivot = array('contact_id'=>$id,'hobby_id'=>$hobby);
            ContactHobby::query()->create($dodavanjeUPivot);
        }

        return Redirect::route('contact.index');

    }

    public function delete($id){
        $contact = Contact::query()->findOrFail($id);
        
        $contact->delete();
        return Redirect::route('contact.index');
    }

   
}