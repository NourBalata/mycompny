<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Catagory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ControllerCatagory extends Controller
{
public function __construct(){
    $this->middleware('auth');
}

    




   public function AllCat(){
  // $catagories=DB::table('catagories')->join('users','catagories.user_id','users.id')->select('catagories.*','users.name')->latest()->paginate(4);
   
     $catagories=Catagory::latest()->paginate(4);
     $trachcat=Catagory::onlyTrashed()->latest()->paginate(3);
 //   $catagories=DB::table('catagories')->latest()->paginate(4);
    return view('Admin.catagory.index',compact('catagories','trachcat'));
   }
   public function AddCat(Request $request){
    $vaildatedData=$request->validate([
        'catagory_name'=>'required'
    ],
);
    Catagory::insert([
        'catagory_name'=>$request->catagory_name,
        'user_id'=>Auth::user()->id,
        'created_at'=>Carbon::now(),

    ]);


   //$catagory=new Catagory;
    //$catagory->catagory_name=$request->Catagory_name;
    //$catagory->user_id=Auth::user()->id;
   // $catagory->save();

//$data=array();
//$data['catagory_name']=$request->catagory_name;
//$data['user_id']=Auth::user()->id;
//DB::table('catagories')->insert($data);

return Redirect()->back()->with('success','Catagory Inserted SuccessFull');

}

public function Edit($id){
//$catagories= Catagory::find($id);
$catagories=DB::table('catagories')->where('id',$id)->first();
   
return view('Admin.catagory.edit',compact('catagories'));
}

public function Update(Request $request,$id){
//$update=Catagory::find($id)->update([
//'catagory_name'=>$request->catagory_name,
//'id'=>Auth::user()->id,
//]);

$data=array();
$data['catagory_name']=$request->catagory_name;
$data['user_id']=Auth::user()->id;
DB::table('catagories')->where('id',$id)->update($data);

return Redirect()->route('all.catagory')->with('success','Catagory Updated SuccessFull');

}

public function softdelete($id){
    $delete=Catagory::find($id)->delete();
    return Redirect()->route('all.catagory')->with('success','Catagory deleted SuccessFull'); 
}


public function Restore($id){

$restore=Catagory::withTrashed()->find($id)->restore();
return Redirect()->back()->with('success','Catagory ReStored SuccessFull');

}
public function pdelete($id){
$pdelete=Catagory::onlyTrashed()->find($id)->forceDelete();
return Redirect()->back()->with('success','Catagory Permanently SuccessFull');

}
}