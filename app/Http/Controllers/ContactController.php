<?php

namespace App\Http\Controllers;
use App\Models\ContactForm;
use App\Models\contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{


    public function Contact(){
        $contacts=contact::all();
        return view('Admin.contact.index',compact('contacts'));
    }

    public function AddContact(){
        return view('Admin.contact.create');
    }


    public function StoreContact(Request $request){

        contact::insert([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'created_at'=>Carbon::now(),
                    ]);
                    return Redirect()->route('admin.contact')->with('success','Contact Instred successfully');
                
    }

public function Contact2(){
$contacts=DB::table('contacts')->first();

    return view('Admin.page.contact',compact('contacts'));
}


public function ContactForm(Request $request){
    ContactForm::insert([
'name'=>$request->name,
'email'=>$request->email,
'subject'=>$request->subject,
'message'=>$request->message,
'created_at'=>Carbon::now(),
]);
return Redirect()->route('contact')->with('success','Your Message send successfully'); 
}

public function AdminMessage(){
    $messages=ContactForm::all();
return view('Admin.contact.message',compact('messages'));
}

public function MessDelete($id){
    $messages=ContactForm::find($id)->delete();
    return Redirect()->back()->with('success','Message deleted SuccessFull'); 
}
}

