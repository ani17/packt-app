@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">User Details</div>
    <div class="card-body">
          <h5 class="card-title">Name : {{ $user->name }}</h5>
          <p class="card-text">Email : {{ $user->email }}</p>
          <p class="card-text">Gender : {{ $user->gender }}</p>
          <p class="card-text">Status : {{ $user->status }}</p>
          <p class="card-text">Address Line 1 : {{ $user->address_line1 }}</p>
          <p class="card-text">Address Line 2 : {{ $user->address_line2 }}</p>
          <p class="card-text">City : {{ $user->city }}</p>
          <p class="card-text">Country : {{ $user->country }}</p>
    </div>
</div>

@stop