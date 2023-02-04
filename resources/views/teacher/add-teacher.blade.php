@extends('layout.master')
@section('title','Add Teacher')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 offset-3">
            <h1 class="text-center">Add Teacher</h1>
            <h4 class="text-center text-success">{{ Session::get('addMessage') }}</h4>
            <form action="{{ route('new-teacher') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="" class="form-label">Number </label>
                    <input type="text" class="form-control" name="number">
                </div>
                <div class="md-3">
                    <label for="" class="form-label">Address </label>
                    <textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="md-3">
                    <label for="" class="form-label">Image </label>
                    <input type="file" class="form-control-file" name="image" accept="image/*">
                </div>
                {{-- <div class="md-3">
                    <select name="status" id="" class="form-control">
                        <option value="">Stutus</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div> --}}
                <input type="submit" class="btn btn-outline-primary my-4" value="Create Teacher">
            </form>
        </div>
    </div>
</div>
@endsection
