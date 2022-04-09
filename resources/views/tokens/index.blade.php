@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Generate New Token</div>
  <div class="card-body">
    <div id="error-div" class="alert alert-danger" style="display:none">
    </div>
    <form action="{{ url('tokens') }}" method="post">
        {!! csrf_field() !!}
        
        <label>Enter a string <small id="passwordHelpBlock" class="form-text text-muted">(Your string must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.)</small></label></br>
        <div class="col-xs-4">
          <input type="text" name="token-string" id="token-string" class="form-control" style="width:500px" value="">
          </br>
        <a class="btn btn-success" id="submitTokenData" onclick="event.preventDefault();">Generate</a>
        </div>
        
        <br/><br/>
         
        <div id="token-div" style="display:none">
          <label>Your Token</label>
          <input type="text" name="token" id="token" class="form-control" disabled style="width:500px" value="">
        </div>

    </form>
   
  </div>
</div>
 
@stop