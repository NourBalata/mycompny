<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Hi.....<b>{{Auth::user()->name}}</b>
        <b style="float:right;">Total Users
    <span class="badge badge-danger">{{count($users)}}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
    <div class="row">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Creaated At</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
    </tr>
  
  </tbody>
@endforeach
</table>

            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
