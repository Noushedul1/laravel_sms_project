@extends('layout.master')
@section('title','Add User')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 offset-3">
            <h1 class="text-center">Add User</h1>
            <h4 class="text-center text-success">{{ Session::get('addMessage') }}</h4>
            <form action="{{ route('new-user') }}" method="POST">
                @csrf
                <div class="md-3">
                    <label for="" class="form-label">Full Name </label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="md-3">
                    <label for="" class="form-label">Email </label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="md-3">
                    <label for="" class="form-label">Password </label>
                    <input type="text" class="form-control" name="password">
                </div>
                <input type="submit" class="btn btn-outline-primary my-4" value="Create User">
            </form>
        </div>
    </div>
</div>
@endsection
