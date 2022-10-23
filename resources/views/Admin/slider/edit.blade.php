@extends('Admin.Admin_master')
   @section('admin')



    <div class="py-12">
        
        <div class="container">

        <div class="col-md-8">
<div class="card"> 
<div class="card-header"> Edit Slider</div>

@if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>
   @endif

<div class="card-body">
<form action="{{url('slider/update/'.$slider->id)}}" method="post" enctype="multipart/form-data">
@csrf





<div class="form-group">
													<label for="exampleFormControlInput1">Slider Title</label>
													<input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$slider->name}}>
                                                    @error('title')
<span class="text-danger">{{$message}}</span>
  @enderror
    
</div>
											
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Slider Description</label>
													<textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3" value="{{$slider->description}}"></textarea>
												</div>
												<div class="form-group">
													<label for="exampleFormControlFile1">Slider Image</label>
													<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="{{$slider->image}}>
                                                    @error('image')
<span class="text-danger">{{$message}}</span>
  @enderror
  <div class="form_group">
    <img src="{{asset($slider->image)}}" style="width:400px;height:200px">
</div>
  <button type="submit" class="btn btn-primary">Update slider</button>
 
</form>
  
 
                                                
                                                </div>















<input type="hidden" name="old_image" value="{{$slider->image}}">
<div class="form-group">

<div class="form-group">
   
</div>

<div class="form_group">
    <img src="{{asset($slider->imsge)}}" style="width:400px;height:200px">
</div>
  <button type="submit" class="btn btn-primary">Update Brand</button>
 
</form>
</div>
@endsection