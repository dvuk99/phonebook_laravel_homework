<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Contact;
use App\Models\Hobby;
use App\Models\City;
use App\Models\ContactHobby;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHomePage(){
      
        $message = 'Pocetna strana';
        $contacts = [
            [
                'id' => 1,
                'name' => 'Marko Markovic',
                'email' => 'marko@gmail.com'
            ],
            [
                'id' => 2,
                'name' => 'Janko Jankovic',
                'email' => 'janko@gmail.com'
            ],
            [
                'id' => 3,
                'name' => 'Marko Markovic',
                'email' => 'marko@gmail.com'
            ],
            [
                'id' => 4,
                'name' => 'Marko Markovic',
                'email' => 'marko@gmail.com'
            ]
    
            ];

           
 
            return view('home',compact('message','contacts'));
    }
    public function getContactDetails($id,Request $request){
        
        $message = $request->get('message');
        return view('contact',compact('id','message'));
    }
    public function saveContact(Request $request){
        $newContact = new Contact();
        $newContact->id=$request->get('id');
        $newContact->first_name=$request->get('first_name');
        $newContact->last_name=$request->get('last_name');
        $newContact->email=$request->get('email');

        $newContact->save();

    }

    public function saveCountry(Request $request){
        $newCountry = new Country();
        $newCountry->id=$request->get('id');
        $newCountry->name=$request->get('name');

        $newCountry->save();
    }

    public function saveHobby(Request $request){
        $newHobby = new Hobby();
        $newHobby->id=$request->get('id');
        $newHobby->name = $request->get('name');

        $newHobby->save();
    }
    public function representData(){
        $contact = Contact::query()->get();
        dd($contact[1]);
    }

    public function test(){
     /* $city = City::query()->get();
    
      return view('country.proba',['city'=>$city]);
      //dd($city->country->name);

        */

         //$contactHobbies = Contact::find(6)->hobbies;
        //$cities = City::find(1);
        //dd($cities->contacts);
        //$cities = City::find(1);
        //$contacts = Contact::find(1);
        //dd($contacts->city->country);
        //dd($cities->contacts[0]->first_name);
        //return view('country.proba',['contacts'=>$contacts]);
        
        //$hobbies = Hobby::query()->get();
        //$pretvoriUNiz = json_decode($hobbies[0],true);
        //dd($pretvoriUNiz);
        
        
        $hobbyContact = ContactHobby::query();
        $hobbyContact = $hobbyContact->where('contact_id','=','1')->get();
        $hobbyContact  = json_decode($hobbyContact,true);
        dd($hobbyContact['0']);
        $finalArray=array();
        $br=0;
        foreach($hobbyContact as $hb){
             $finalArray[$br++]=$hb['hobby_id'];
        }
        
        
    }
}
