@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teacher  Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{  route('students.index')  }}">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{  route('courses.index')  }}">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>



                </div>

            </div>
        </div>
    </div>
</div>
@endsection
