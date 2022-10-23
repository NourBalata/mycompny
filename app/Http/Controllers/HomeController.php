<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public  function HomeSlider(){
$slider=Slider::latest()->get();
return view ('Admin.slider.index',compact('slider'));

   }

public function AddSlider(){
    return view('Admin.slider.create');
}
public function StoreSlider(Request $request){
   $slider_image=$request->file('image');

   $name_gen=hexdec(uniqid());
   $img_ext=strtolower($slider_image->getClientOriginalExtension());
   $img_name=$name_gen.'.'.$img_ext;
   $up_locat='image/slider/';
   $lat_image=$up_locat.$img_name;
   $lat_image=$up_locat.$img_name;
   $slider_image->move($up_locat,$img_name);
   
   
   Slider::insert([
   'title'=>$request->title,
   'description'=>$request->description,
   'image'=>$lat_image,
   'created_at'=>Carbon::now(),
   
   ]);
   
   return redirect()->route('home.slider')->with('success','Slider Instored successfull');
}

}
