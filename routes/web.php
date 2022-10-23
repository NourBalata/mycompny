<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerCatagory;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeAboutController;

use App\Models\Multipc;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   
   
});

Route::get('/catagory/all',[ControllerCatagory::class,'AllCat'])->name('all.catagory');   





Route::post('/catagory/add',[ControllerCatagory::class,'AddCat'])->name('store.catagory');
Route::get('/catagory/edit/{id}',[ControllerCatagory::class,'Edit']);
Route::post('/catagory/update/{id}',[ControllerCatagory::class,'Update']);
Route::get('/softdelete/catagory/{id}',[ControllerCatagory::class,'softdelete']);   
Route::get('/catagory/restore/{id}',[ControllerCatagory::class,'Restore']);
Route::get('pdelete/catagory/{id}',[ControllerCatagory::class,'pdelete']);




Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');   
Route::post('/brand/add',[BrandController::class,'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('/brand/update/{id}',[BrandController::class,'Update']);
Route::get('/brand/delete/{id}',[BrandController::class,'Delete']);



Route::get('/multi/all',[BrandController::class,'MltiPic'])->name('multi.image');
Route::post('/multi/add',[BrandController::class,'storeImage'])->name('store.image');



Route::get('/dashboard', function () {
        //$users=User::all();
        $users=DB::table('users')->get();
        return view('Admin.index',compact('users'));
    })->name('dashboard');

    
    Route::get('/admin/logout',[BrandController::class,'Logout'])->name('admin.logout');



  
Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $abouts=DB::table('home_abouts')->first();
    $images=Multipc::all();
    return view('profile.home',compact('brands','abouts','images'));
});







Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slide');
Route::post('/slider/update/{id}',[HomeController::class,'Update']);
Route::get('/slider/delete/{id}',[HomeController::class,'Delete']);



Route::get('/home/about',[HomeAboutController::class,'HomeAbout'])->name('home.about');

Route::get('/add/about',[HomeAboutController::class,'AddAbout'])->name('add.about');
Route::post('/store/about',[HomeAboutController::class,'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[HomeAboutController::class,'EditAbout']);
Route::post('/update/homeabout/{id}',[HomeAboutController::class,'UpdateAbout']);
Route::get('/about/delete/{id}',[HomeAboutController::class,'AboutDelete']);



Route::get('/admin/contact',[ContactController::class,'Contact'])->name('admin.contact');
Route::get('/admin/add/contact',[ContactController::class,'AddContact'])->name('add.contact');
Route::post('/admin/store/contact',[ContactController::class,'StoreContact'])->name('store.contact');
Route::get('/contact',[ContactController::class,'Contact2'])->name('contact');
Route::get('/admin/message',[ContactController::class,'AdminMessage'])->name('admin.message');
Route::get('/message/delete/{id}',[ContactController::class,'MessDelete']);
Route::post('/contact/form',[ContactController::class,'ContactForm'])->name('contact.form');


Route::get('/user/password',[ChangePassword::class,'CHpassword'])->name('change.password');
Route::post('/password/update',[ChangePassword::class,'updatepass'])->name('password.update');


Route::get('/user/profile',[ChangePassword::class,'ProfUpdate'])->name('profile.update');
Route::post('/user/update',[ChangePassword::class,'UserUpdate'])->name('update.userprofile');
