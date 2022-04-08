@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">New Post</div>
  <div class="card-body">
      @include('error')
      <form action="{{ url('posts') }}" method="post">
        {!! csrf_field() !!}
        
        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"></br>
        
        <label>Body</label></br>
        <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>

        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" />
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop