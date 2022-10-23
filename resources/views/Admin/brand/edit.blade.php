@extends('Admin.Admin_master')
   @section('admin')



    <div class="py-12">
        
        <div class="container">

        <div class="col-md-8">
<div class="card"> 
<div class="card-header"> Edit Brand</div>

@if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>
   @endif

<div class="card-body">
<form action="{{url('brand/update/'.$brands->id)}}" method="post" enctype="multipart/form-data">
@csrf

<input type="hidden" name="old_image" value="{{$brands->brand_Image}}">
<div class="form-group">
    <label for="exampleInputEmaill" class="form-label">Update Brand Name</label>

    <input type="text" name="brand_Name" class="form-control" id="exampleInputEmaill" aria-describedby="emailHelp" value="{{$brands->brand_Name}}">
    @error('brand_Name')
<span class="text-danger">{{$message}}</span>
  @enderror
    
</div>
<div class="form-group">
    <label for="exampleInputEmaill" class="form-label">Update Brand Image</label>

    <input type="file" name="brand_Image" class="form-control" id="exampleInputEmaill" aria-describedby="emailHelp" value="{{$brands->brand_Image}}">
    @error('brand_Image')
<span class="text-danger">{{$message}}</span>
  @enderror
    
</div>

<div class="form_group">
    <img src="{{asset($brands->brand_Image)}}" style="width:400px;height:200px">
</div>
  <button type="submit" class="btn btn-primary">Update Brand</button>
 
</form>
</div>
@endsection