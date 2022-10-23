@extends('Admin.Admin_master')
   @section('admin')

    <div class="py-12">
        
        <div class="container">
<div class="row">

<h4>Home Slider</h4>
<a href="{{ route('add.slider') }}"> <button class="btn btn-info">Add About</button></a>
<br><br>
<div class="col-md-12">
     <div class="card">


     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>
   @endif

<div class="card-header"> All Sliders</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">Sl  </th>
      <th scope="col" width="15%">Title </th>
      <th scope="col" width="15%">Description </th>
      <th scope="col"width="15%">Image</th>



    </tr>
  </thead>
  <tbody>
  @php($i=1)
    @foreach($slider as $slide)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$slide->title}}</td>
      <td>{{$slide->description}}</td>
      <td><img src="{{asset($slide->image)}}" style="height:40px ;width:70px" alt=""></td>

    

    
    </tr>


@endforeach      
     
  </tbody>
</table>

</div>
        </div>
        
</div>
</div>
</div>  
</div>  </div>  </div>
        </div>


@endsection
































