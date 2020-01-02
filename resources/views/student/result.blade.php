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
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    @if($student->gender == 1)
                                        <td>Male</td>
                                    @endif
                                    @if($student->gender == 0)
                                        <td>Female</td>
                                    @endif
{{--                                    <td><a href="{{ route('student-edit') }}">Edit</a></td>--}}
                                </tr>
                                </tbody>
                            </table>

                        </div>

                            <div class="table">
                                <table class="table">
                                    <thead>
                                    @foreach($student->score as $row)
                                    <tr>
                                        <th scope="col">{{ $row->course->name }}</th>
                                        <td>{{ $row->marks }}</td>
                                    </tr>
                                        @endforeach
                                    </thead>

                                </table>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
