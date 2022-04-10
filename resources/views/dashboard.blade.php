@extends('layout')
@section('content')
<div class="card">
    <div class="card-body">
        <p>Welcome {{ Auth::user()->name }} !</p>
    </div>
</div>
@endsection