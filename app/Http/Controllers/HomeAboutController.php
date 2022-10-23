<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeAboutController extends Controller
{
    public function HomeAbout(){
        $homeabout=HomeAbout::latest()->get();
        return view('Admin.home.index',compact('homeabout'));
    }

    public function AddAbout(){
        return view('Admin.home.create');
    }

    public function StoreAbout(Request $request){

        HomeAbout::insert([
'title'=>$request->title,
'short_dis'=>$request->short_dis,
'long_dis'=>$request->long_dis,
'created_at'=>Carbon::now(),
        ]);
        return Redirect()->route('home.about')->with('success','About Instred successfully');
    }


    public function EditAbout($id){
        $homeabout=HomeAbout::find($id); 
return view('Admin.home.edit',compact('homeabout'));
    }
    public function UpdateAbout(Request $request, $id){
        $update=HomeAbout::find($id)->update([
            'title'=>$request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            
                    ]);
                    return Redirect()->route('home.about')->with('success','About Updated successfully');
                }


                public function AboutDelete($id){
$delete=HomeAbout::find($id)->Delete();
return Redirect()->back()->with('success','About Deleted successfully');
                }
}
