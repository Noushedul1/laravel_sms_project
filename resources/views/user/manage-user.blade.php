@extends('layout.master')
@section('title', 'Manage User')
@section('content')
    <div class="container">
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
        <div class="row">
            <div class="col-md-8 offset-2">
                <form action="">
                    <div class="mb-3">
                        <input type="search" name="search" class="form-control" placeholder="Search by Name and Email" value="{{ $search }}">
                        <button class="btn btn-primary my-2">Search</button>
                        <a href="{{ route('manage-user') }}" class="btn btn-primary">Reset</a>
                    </div>
                </form>
                <table class="table table-bordered text-center">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at}}</td>
                        <td>
                            <a href="{{ route('edit-user',['id'=>$user->id]) }}" class="btn btn-success btn-sm {{ $user->id == 1 ? 'disabled' : '' }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('delete-user',['id'=>$user->id]) }}" class="btn btn-danger btn-sm {{ $user->id == 1 ? 'disabled' : '' }}")"">
                                <i class="fa fa-trash btn-sm"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-md-6 offset-3">
                        {{ $user->paginate(2) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection