@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Post Details</div>
  <div class="card-body">
    <h5 class="card-title">Title : {{ $post->title }}</h5>
    <p class="card-text">Body : {{ $post->body }}</p>
    <p class="card-text">Id : {{ $post->id }}</p>
  </div>
</div>

@stop