@extends('Admin.Admin_master')
   @section('admin')

    <div class="py-12">
        
        <div class="container">
<div class="row">
<div class="col-md-8">
     <div class="card">


     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>
   @endif

<div class="card-header"> All Brand</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No </th>
      <th scope="col">Brand_Name </th>
      <th scope="col">Brand_Image </th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
  {{--@php($i=1)--}}
    @foreach($brands as $brand)
    <tr>
      <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
      <td>{{$brand->brand_Name}}</td>
      <td><img src="{{asset($brand->brand_Image)}}" style="height:40px ;width:70px" alt=""></td>

      <td>
      @if($brand->created_at==Null)
      <span class="text_danger">No Date Set!!</span>
      @else
     {{Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}
    @endif
    </td>

    <td>
      <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
      <a href="{{url('brand/delete/'.$brand->id)}}" onclick="return confirm('Are you sure to delete it')"  class="btn btn-danger">Delete</a>
    </td>
    </tr>


@endforeach      
     
  </tbody>
</table>
{{$brands->links()}}
</div>
        </div>
        <div class="col-md-4">
<div class="card"> 
<div class="card-header"> Add Brand</div>
<div class="card-body">
<form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="exampleInputEmaill" class="form-label">Brand Name</label>
 
    <input type="text" name="brand_Name" class="form-control" id="exampleInputEmaill" aria-describedby="emailHelp">
    @error('brand_Name')
<span class="text-danger">{{$message}}</span>
  @enderror
  <div class="form-group">
    <label for="exampleInputEmaill" class="form-label">Brand Image</label>
 
    <input type="file" name="brand_Image" class="form-control" id="exampleInputEmaill" aria-describedby="emailHelp">
    @error('brand_Image')
<span class="text-danger">{{$message}}</span>
  @enderror
 
  <button type="submit" class="btn btn-primary">ِAdd Brand</button>
 
</form>
</div>
</div>
</div>
</div>  
</div>  </div>  </div>
        </div>


@endsection
































