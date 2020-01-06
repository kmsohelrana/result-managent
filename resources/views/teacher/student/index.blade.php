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

                            <div align="center" class="loader"></div>
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
                                                <a href="{{ route('marks.create',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i> </a>
                                                <a href="javascript:void(0)"  class="btn btn-primary btn-sm show-user"  data-id="{{ $row->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <p>No Student Have Found</p>
                                @endforelse
                                </tbody>
                                {{ $data->links() }}
                            </table>
                        </div>

                            <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="infoModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p id="info-name"></p>
                                            <p id="info-email"></p>
                                            <p id="info-phone"></p>
                                            <p id="info-gender"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--                                            <button type="button" class="btn btn-primary">Save changes</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript" >
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.loader').hide();

            $('.show-user').on('click',function () {
                $('.loader').show();
                var user_id = $(this).data('id');


                $.get('students-bd/' + user_id , function (data) {
                    $('.loader').hide();
                    $('#infoModal').modal('show');
                    $('#info-name').html(data.name);
                    $('#info-email').html(data.email);
                    $('#info-phone').html(data.phone);
                    $('#info-gender').html(data.gender);
                })
            });
        });
    </script>
@endsection


