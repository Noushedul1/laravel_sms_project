@extends('layout.master')
@section('title','Manage Teacher')
@section('content')
<div class="container my-4">
    <h4 class="text-center">Manage Teachers</h4>
    <h4 class="text-center text-success">{{ Session::get('updateMessage') }}</h4>
    <h4 class="text-center text-danger">{{ Session::get('deleteMessage') }}</h4>
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="mb-3">
                    <input type="search" name="search" class="form-control" placeholder="Search By Name or Email" value="{{ $search }}">
                    <button class="my-3 btn btn-primary">Search</button>
                    <a href="{{ route('manage-teacher') }}" class="btn btn-primary">Reset</a>
                </div>
            </form>
            <a href="{{ route('manage-teacher-trash') }}" class="btn btn-primary">Go To Trash</a>
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
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->code }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->number }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>
                        <img src="{{ asset($teacher->image) }}" alt="" height="50" width="50">
                    </td>
                    <td class="{{ $teacher->status==1?'text-success':'text-danger' }}">{{ $teacher->status == 1? 'Active' : 'Deactive' }}</td>
                    <td>
                        <a href="{{ route('edit-teacher',['id'=>$teacher->id]) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('delete-teacher',['id'=>$teacher->id]) }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-undo"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row">
                <div class="col-md-6 offset-3">
                    {{ $teachers->links() }}
                    {{-- {{ $teachers->onEachSide(1)->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection