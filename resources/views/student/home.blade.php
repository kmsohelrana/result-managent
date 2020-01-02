@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <div class="card-header">
                   <form action="{{ route('image.update') }}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div>
                           <label>Upload Your Profile Picture</label>
                           <input type="file" name="image" accept="image/">
                       </div>
                       <button type="submit" class="btn btn-success" name="btn">Add</button>
                   </form>
               </div>

                <div class="card-header">Student Dashboard</div>

                <div class="card-header">
                    <a href="{{ route('student.result') }}">View Student Result</a>
                </div>

                @if(!empty($student->image))
                <div class="img-thumbnail">
                    <img src="{{ asset($student->image) }}" alt="{{ $student->name }}">
                </div>
                @endif

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
                                <td><a href="{{ route('student-edit') }}">Edit</a></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
