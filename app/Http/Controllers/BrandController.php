<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
   public function AllBrand(){
$brands=Brand::latest()->paginate(5);

    return view('Admin.brand.index',compact('brands'));
   }

public function AddBrand(Request $request){
    $vaildatedData=$request->validate([
        'brand_Name'=>'required|unique:brands|max:4',
        'brand_Image'=>'required|mimes:jpg.jpeg,png'
    ],[

        'brand_Name.required'=>'please input brand name!',
        'brand_Name.min'=>'Brand longer than 4 characters!'
    ]
);


$brand_image=$request->file('brand_Image');

$name_gen=hexdec(uniqid());
$img_ext=strtolower($brand_image->getClientOriginalExtension());
$img_name=$name_gen.'.'.$img_ext;
$up_locat='image/brand/';
$lat_image=$up_locat.$img_name;
$brand_image->move($up_locat,$img_name);


Brand::insert([
'brand_Name'=>$request->brand_Name,
'brand_Image'=>$lat_image,
'created_at'=>Carbon::now(),

]);

return redirect()->back()->with('success','Brand Instored successfull');
}

public function Edit($id){
//$catagories= Catagory::find($id);
$brands=Brand::find($id);
   
return view('Admin.brand.edit',compact('brands'));



}

public function update(Request $request,$id){
    $vaildatedData=$request->validate([
        'brand_Name'=>'required|min:4',
        
    ],[

        'brand_Name.required'=>'please input brand name!',
        'brand_Name.min'=>'Brand longer than 4 characters!'
    ]
);

$old_image=$request->old_image;
$brand_image=$request->file('brand_Image');
if($brand_image){
    $name_gen=hexdec(uniqid());
    $img_ext=strtolower($brand_image->getClientOriginalExtension());
    $img_name=$name_gen.'.'.$img_ext;
    $up_locat='image/brand/';
    $lat_image=$up_locat.$img_name;
    $brand_image->move($up_locat,$img_name);
    
    unlink($old_image);
    Brand::find($id)->update([
    'brand_Name'=>$request->brand_Name,
    'brand_Image'=>$lat_image,
    'created_at'=>Carbon::now(),
    
    ]);
    
    return redirect()->back()->with('success','Brand updated successfull');
    
}else{
    Brand::find($id)->update([
        'brand_Name'=>$request->brand_Name,
        'created_at'=>Carbon::now(),
        
        ]);
        
        return redirect()->back()->with('success','Brand updated successfull');
        
}}
public function Delete($id){
$image=Brand::find($id);
$old_image=$image->brand_Image;
unlink($old_image);

Brand::find($id)->delete();
return redirect()->back()->with('success','Brand deleted successfull');

}



public function MltiPic(){
    $images=Multipc::all();
    return view('Admin.multipic.index',compact('images'));
}



public function storeImage(Request $request){

    $image=$request->file('image');
foreach($image as $muti_image){
    $name_gen=hexdec(uniqid());
    $img_ext=strtolower($muti_image->getClientOriginalExtension());
    $img_name=$name_gen.'.'.$img_ext;
    $up_locat='image/multi/';
    $lat_image=$up_locat.$img_name;
    $muti_image->move($up_locat,$img_name);
    
    
    Multipc::insert([
    'image'=>$lat_image,
    'created_at'=>Carbon::now(),
    
    ]);
}
    return redirect()->back()->with('success','Brand Instored successfull');
    }


    public function Logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','admin logout  ');
    }

}