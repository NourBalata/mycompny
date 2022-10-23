@extends('Admin.Admin_master')
   @section('admin')

    <div class="py-12">
        
        <div class="container">
<div class="row">

<h4>Contact Page</h4>
<a href="{{ route('add.contact') }}"> <button class="btn btn-info">Add Contact</button></a>
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

<div class="card-header"> All About Data</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">Sl  </th>
      <th scope="col"width="15%">Contact Address </th>
      <th scope="col" width="25%"> Contact Email </th>
      <th scope="col"width="15%">Contact Phone </th>
     


    </tr>
  </thead>
  <tbody>
  @php($i=1)
    @foreach($contacts as $con)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$con->address}}</td>
      <td>{{$con->email}}</td>
      <td>{{$con->phone}}</td>
      

    

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