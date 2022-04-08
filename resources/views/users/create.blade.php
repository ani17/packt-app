@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">New User - Register</div>
  
  <div class="card-body">
      @include('error')
      <form action="{{ url('users') }}" method="post">
        {!! csrf_field() !!}
        
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"></br>
        
        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"></br>

        <label>Gender</label></br>
        <input type="text" name="gender" id="gender" class="form-control" value="{{ old('gender') }}"></br>

         <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control" value="{{ old('status') }}"></br>

        <label>Address Line 1</label></br>
        <input type="text" name="address_line1" id="address_line1" class="form-control" value="{{ old('address_line1') }}"></br>

        <label>Address Line 2</label></br>
        <input type="text" name="address_line2" id="address_line2" class="form-control" value="{{ old('address_line2') }}"></br>

        <label>City</label></br>
        <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}"></br>

        <label>Country</label></br>
        <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}"></br>

        <label>Password</label></br>
        <input type="password" name="password" id="password" value="" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop