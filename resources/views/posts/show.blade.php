@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Post Details</div>
  <div class="card-body">
    <h5 class="card-title">Title : {{ $post->title }}</h5>
    <p class="card-text">Body : {{ $post->body }}</p>
    <p class="card-text">Author : {{ $post->name }}</p>
    <p class="card-text">Created : {{ $post->created_at }}</p>
    <p class="card-text">Last Modified : {{ $post->updated_at }}</p>
  </div>
</div>

@stop