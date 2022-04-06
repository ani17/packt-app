@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">New User - Register</div>
  <div class="card-body">
      
      <form action="{{ url('users') }}" method="post">
        {!! csrf_field() !!}
        
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        
        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>

        <label>Gender</label></br>
        <input type="text" name="gender" id="gender" class="form-control"></br>

         <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control"></br>

        <label>Address Line 1</label></br>
        <input type="text" name="address_line1" id="address_line1" class="form-control"></br>

        <label>Address Line 2</label></br>
        <input type="text" name="address_line2" id="address_line2" class="form-control"></br>

        <label>City</label></br>
        <input type="text" name="city" id="city" class="form-control"></br>

        <label>Country</label></br>
        <input type="text" name="country" id="country" class="form-control"></br>

        <label>Password</label></br>
        <input type="password" name="password" id="password" value="" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop