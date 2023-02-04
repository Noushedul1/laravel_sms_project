@extends('layout.master')
@section('title','Master Login')
@section('content')
<div class="container my-5">
    <h4 class="text-center">Login</h4>
    <h4 class="text-center text-danger">{{ Session::get('message') }}</h4>
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{ route('new-login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password">
                </div>
                <label for="" class="form-label">Login As</label>
                <div class="mb-3">
                    
                    <label for="" class="form-label">
                        <input type="radio" name="check" value="1" checked> Teacher</label>
                    <label for="" class="form-label">
                        <input type="radio" name="check" value="0"> 
                        User</label>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-success" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection