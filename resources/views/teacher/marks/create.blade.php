@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">Student Marks</div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('marks.store') }}">
                            @csrf

                            @php
                            $i=0;
                            @endphp

                            <input type="hidden" name="user_id" value="{{ $student->id }}">
                            @foreach($data as $row)

                            <div class="form-group row">
                                <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ $row->name }}</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="marks[{{$i}}][course_id]" value=" {{ $row->id }}">
                                </div>

                                <label for="name" class="col-md-4 col-form-label text-md-right">Marks</label>
                                <div class="col-md-6">
                                    <input type="number" name="marks[{{$i}}][marks]" value="" class="form-control">
                                </div>
                            </div>

                                @php
                                    $i++;
                                @endphp
                            @endforeach

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
