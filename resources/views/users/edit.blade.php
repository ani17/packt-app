@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Users Details</div>
  <div class="card-body">
      @include('error')
      <form action="{{ url('users/' .$user->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$user->id}}" id="id" />
        
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"></br>
        
        <label>Email</label></br>
        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control"></br>

        <!-- <label>Gender</label></br>
        <input type="text" name="gender" id="gender" value="{{$user->gender}}" class="form-control"></br>

        <label>Status</label></br>
        <input type="text" name="status" id="status" value="{{$user->status}}" class="form-control"></br> -->

        <div class="form-group">
          <label><strong>Gender :</strong></label>
          <select id='gender' name="gender" class="form-control" style="width: 350px">
              <option value="">Select</option>
              <option value="M" {{$user->gender == "M" ? "selected" : ""}}>Male</option>
              <option value="F" {{$user->gender == "F" ? "selected" : ""}}>Female</option>
          </select>
        </div>

        <div class="form-group">
          <label><strong>Status :</strong></label>
          <select id='status' name="status" class="form-control" style="width: 350px">
              <option value="">Select</option>
              <option value="1" {{$user->status == "1" ? "selected" : ""}}>Active</option>
              <option value="0" {{$user->status == "0" ? "selected" : ""}}>In-Active</option>
          </select>
        </div>

        <label>Address Line 1</label></br>
        <input type="text" name="address_line1" id="address_line1" value="{{$user->address_line1}}" class="form-control"></br>

        <label>Address Line 2</label></br>
        <input type="text" name="address_line2" id="address_line2" value="{{$user->address_line2}}" class="form-control"></br>

        <label>City</label></br>
        <input type="text" name="city" id="city" value="{{$user->city}}" class="form-control"></br>

        <label>Country</label></br>
        <input type="text" name="country" id="country" value="{{$user->country}}" class="form-control"></br>

        <!-- <label>New Password</label></br>
        <input type="password" name="password" id="password" value="" class="form-control"></br> -->
        <br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop