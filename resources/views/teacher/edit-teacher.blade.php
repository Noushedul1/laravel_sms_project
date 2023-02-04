@extends('layout.master')
@section('title','Edit Teacher')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 offset-3">
            <h1 class="text-center">Edit Teacher</h1>
            <h4 class="text-center text-success">{{ Session::get('editMessage') }}</h4>
            <form action="{{ route('update-teacher',['id'=>$teacher->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="md-3">
                    <label for="" class="form-label">Full Name </label>
                    <input type="text" class="form-control" name="name" value="{{ $teacher->name }}">
                </div>
                <div class="md-3">
                    <label for="" class="form-label">Email </label>
                    <input type="text" class="form-control" name="email" value="{{ $teacher->email }}">
                </div>
                <div class="md-3">
                    <label for="" class="form-label">Number </label>
                    <input type="text" class="form-control" name="number" value="{{ $teacher->number }}">
                </div>
                <div class="md-3">
                    <label for="" class="form-label">Address </label>
                    <textarea name="address" id="" cols="30" rows="10" class="form-control">{{ $teacher->address }}</textarea>
                </div>
                <div class="md-3">
                    <label for="" class="form-label">Image </label>
                    <input type="file" class="form-control-file" name="image" accept="image/*">
                </div>
                <label for="" class="form-label">Status</label>
                    <div class="mb-3">
                        <input type="radio" name="status" value="1" {{ $teacher->status == 1 ? 'checked' : '' }}> 
                        <label for="" class="form-label">Active</label>
                        <input type="radio" name="status" {{ $teacher->status == 0 ? 'checked' : '' }} value="0"> 
                        <label for="" class="form-label">Inactive</label>
                    </div>
                <div class="md-2">
                    <img src="{{ asset($teacher->image)}}" alt="" height="100" width="100">
                </div>
                {{-- <div class="md-3">
                    <select name="status" id="" class="form-control">
                        <option value="">Stutus</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div> --}}
                <input type="submit" class="btn btn-outline-primary my-4" value="Update Teacher">
            </form>
        </div>
    </div>
</div>
@endsection
