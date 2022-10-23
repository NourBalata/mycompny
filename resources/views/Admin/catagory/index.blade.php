<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       Hi... <b>
        {{Auth::user()->name}}
       </b>
       <b style="float:right;">
        Total User
       
       <span class="badge badge-danger"></span>
</b>   
    </h2>
    </x-slot>

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

<div class="card-header"> All Catagory</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No </th>
      <th scope="col">catagory_Name </th>
      <th scope="col">User </th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
  {{--@php($i=1)--}}
  
    @foreach($catagories as $Catagory)
    <tr>
      <th scope="row">{{$catagories->firstItem()+$loop->index}}</th>
      <td>{{$Catagory->catagory_name}}</td>
      <td>{{$Catagory->user->name}}</td>

      <td>
      @if($Catagory->created_at==Null)
      <span class="text_danger">No Date Set!!</span>
      @else
     {{Carbon\Carbon::parse($Catagory->created_at)->diffForHumans()}}
    @endif
    </td>

    <td>
      <a href="{{url('catagory/edit/'.$Catagory->id)}}" class="btn btn-info">Edit</a>
      <a href="{{url('softdelete/catagory/'.$Catagory->id)}}" class="btn btn-danger">Delete</a>
    </td>
    </tr>


@endforeach      
     
  </tbody>
</table>
{{$catagories->links()}}
</div>
        </div>
        <div class="col-md-4">
<div class="card"> 
<div class="card-header"> Add Catagory</div>
<div class="card-body">
<form action="{{route('store.catagory')}}" method="post">
@csrf
<div class="form-group">
    <label for="exampleInputEmaill" class="form-label">Catagory Name</label>

    <input type="text" name="catagory_name" class="form-control" id="exampleInputEmaill" aria-describedby="emailHelp">
    @error('catagory_name')
<span class="text-danger">{{$message}}</span>
  @enderror
    
 
  <button type="submit" class="btn btn-primary">ِAdd Catagory</button>
 
</form>
</div>
</div>
</div>
</div>  
</div>  </div>  </div>
        </div>



































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

<div class="card-header"> All Catagory</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sl No </th>
      <th scope="col">catagory_Name </th>
      <th scope="col">User </th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
  {{--@php($i=1)--}}
    @foreach($trachcat as $Catagory)
    <tr>
      <th scope="row">{{$catagories->firstItem()+$loop->index}}</th>
      <td>{{$Catagory->catagory_name}}</td>
      <td>{{$Catagory->user->name}}</td>

      <td>
      @if($Catagory->created_at==Null)
      <span class="text_danger">No Date Set!!</span>
      @else
     {{Carbon\Carbon::parse($Catagory->created_at)->diffForHumans()}}
    @endif
    </td>

    <td>
      <a href="{{url('catagory/restore/'.$Catagory->id)}}" class="btn btn-info">Restore</a>
      <a href="{{url('pdelete/catagory/'.$Catagory->id)}}" class="btn btn-danger"> P Delete</a>
    </td>
    </tr>
    


@endforeach      
     
  </tbody>
</table>
{{$trachcat->links()}}
</div>
       
    
 

</div>
</div>
</div>
</div>  
</div>  </div>  </div>
        </div>
   



      </div>
</x-app-layout>


