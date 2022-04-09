@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Posts</h2>
    </div>
    <div class="card-body">
        <a href="{{ url('/posts/create') }}" class="btn btn-success btn-sm" title="Add New user">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table" id="posts-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <!-- <th>Id</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</div>
@endsection