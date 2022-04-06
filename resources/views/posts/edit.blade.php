@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Post Details</div>
  <div class="card-body">
      
      <form action="{{ url('posts/' .$post->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$post->id}}" />
        
        <label>Title</label></br>
        <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control"></br>
        
        <label>Body</label></br>
        <textarea name="body" id="body" class="form-control">{{$post->body}}</textarea>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop