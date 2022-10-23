

@extends('Admin.Admin_master')
   @section('admin')


    <div class="py-12">    
        <div class="container">
<div class="row">

<div class="col-md-8">
     <div class="card-group">
@foreach($images as $multi)
<div class="col-md-4 mt-5">
<div class="card">
<img src="{{asset($multi->image)}}" alt="">
</div>
</div>
@endforeach
</div>

</div>



        <div class="col-md-4">
<div class="card"> 
<div class="card-header"> Add Brand</div>
<div class="card-body">
<form action="{{route('store.image')}}" method="post" enctype="multipart/form-data">
@csrf

  <div class="form-group">
    <label for="exampleInputEmaill" class="form-label"> Image</label>
 
    <input type="file" name="image[]" class="form-control" id="exampleInputEmaill" multiple="" aria-describedby="emailHelp">
    @error('image')
<span class="text-danger">{{$message}}</span>
  @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">ِAdd Image</button>
 
</form>
</div>
</div>
</div>
</div>  
</div>  </div>  </div>
        </div>
@endsection































