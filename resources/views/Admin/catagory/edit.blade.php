<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">


    <div class="py-12">
        
        <div class="container">

        <div class="col-md-8">
<div class="card"> 
<div class="card-header"> Edit Catagory</div>
<div class="card-body">
<form action="{{url('catagory/update/'.$catagories->id)}}" method="post">
@csrf
<div class="form-group">
    <label for="exampleInputEmaill" class="form-label">Update Catagory Name</label>

    <input type="text" name="catagory_name" class="form-control" id="exampleInputEmaill" aria-describedby="emailHelp" value="{{$catagories->catagory_name}}">
    @error('catagory_name')
<span class="text-danger">{{$message}}</span>
  @enderror
    
</div>
  <button type="submit" class="btn btn-primary">Update Catagory</button>
 
</form>
</div>
</div>
</div>
</div>  
</div>  </div>  </div>
        </div>
    </div>
    <div class="py-12">
        
        <div class="container">

        <div class="col-md-8">
<div class="card"> 
<div class="card-header"> Edit Catagory</div>
<div class="card-body">
<form action="{{url('catagory/update/'.$catagories->id)}}" method="post">
@csrf
<div class="form-group">
    <label for="exampleInputEmaill" class="form-label">Update Catagory Name</label>

    <input type="text" name="catagory_name" class="form-control" id="exampleInputEmaill" aria-describedby="emailHelp" value="{{$catagories->catagory_name}}">
    @error('catagory_name')
<span class="text-danger">{{$message}}</span>
  @enderror
    
</div>
  <button type="submit" class="btn btn-primary">Update Catagory</button>
 
</form>
</div>
</x-app-layout>


