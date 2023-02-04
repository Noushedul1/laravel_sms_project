@extends('layout.master')
@section('title','Teacher Trash Data')
@section('content')
<div class="container my-4">
    <h4 class="text-center">Manage Teachers</h4>
    <h4 class="text-center text-success">{{ Session::get('updateMessage') }}</h4>
    <h4 class="text-center text-danger">{{ Session::get('deleteMessage') }}</h4>
    <div class="row">
        <div class="col-md-12">
            {{-- <form action="">
                <div class="mb-3">
                    <input type="search" name="search" class="form-control" placeholder="Search By Name or Email" value="{{ $search }}">
                    <button class="my-3 btn btn-primary">Search</button>
                    <a href="{{ route('manage-teacher') }}" class="btn btn-primary">Reset</a>
                </div>
            </form> --}}
            <div class="my-3">
                <a href="{{ route('manage-teacher') }}" class="btn btn-primary">Go To Manage</a>
            </div>
            <table class="table table-bordered text-center">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($trashTeachers as $trashTeacher)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trashTeacher->name }}</td>
                    <td>{{ $trashTeacher->code }}</td>
                    <td>{{ $trashTeacher->email }}</td>
                    <td>{{ $trashTeacher->number }}</td>
                    <td>{{ $trashTeacher->address }}</td>
                    <td>
                        <img src="{{ asset($trashTeacher->image) }}" alt="" height="50" width="50">
                    </td>
                    <td class="{{ $trashTeacher->status==1?'text-success':'text-danger' }}">{{ $trashTeacher->status == 1? 'Active' : 'Deactive' }}</td>
                    <td>
                        <a href="{{ route('restore-teacher',['id'=>$trashTeacher->id]) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-redo"></i>
                        </a>
                        <a href="{{ route('force-delete-teacher',['id'=>$trashTeacher->id]) }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{-- <div class="row">
                <div class="col-md-6 offset-3">
                    {{ $trashTeacher->links() }}
                    {{ $teachers->onEachSide(1)->links() }}
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection