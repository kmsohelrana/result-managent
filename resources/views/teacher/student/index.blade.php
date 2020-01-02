@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Student Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table">
                             <a class="btn btn-success btn-sm float-right" href="{{ route('students.create') }}"><i class="fa fa-plus"></i>Add</a>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->gender }}</td>
                                    <td>

                                        <div class="btn-group">
                                            <form action="{{ route('students.destroy',$row->id) }}" method="POST">
                                                <a href="{{ route('students.edit',$row->id) }}" class="btn btn-dark btn-sm"> <i class="fa fa-edit"></i> </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                                            </form>
                                            <a href="{{ route('marks.create',$row->id) }}" class="btn btn-dark btn-sm"> Marks </a>

                                        </div>

{{--                                        <div class="btn-group">--}}
{{--                                            <a class="btn btn-dark btn-sm " href="{{ $row->id }}">Edit</a>--}}
{{--                                            <a class="btn btn-danger btn-sm " href="{{ $row->id }}">Delete</a>--}}
{{--                                        </div>--}}

                                    </td>
                                </tr>
                                @empty
                                    <p>No Student Have Found</p>
                                @endforelse
                                </tbody>
                                {{ $data->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
