@extends('admin.layout.admin_home_main')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>User list</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid " style="margin-top: 20px">
        <div class="row">
            <div class="col-12 float-right">
                <a href="{{route('create.user')}}" type="button" class="btn btn-primary float-right" style="font-size: small; color: lightyellow"><i class="fa fa-plus" aria-hidden="true"></i> Add New User</a>
            </div>
        </div>

    </div>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User List</h3>

                        <div class="card-tools">
                            <form action="{{ route('dashboard') }}" method="GET" role="search">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                        <input type="text" name="term" class="form-control float-right" placeholder="Search" id="term">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Verified date</th>
                                <th>Active</th>
                                <th>Created date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            <tr>
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at }}</td>
                                    <td>{{ $user->active }}</td>
                                    <td>{{ date_format($user->created_at, 'jS M Y') }}</td>
                                    <td>
                                        <a href="{{route('show.user', $user->id)}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                        <a href="{{route('edit.user', $user->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <button type="button" class="btn-danger  deleteUser" id="deleteUser" value="{{$user->id}}" data-toggle="modal" >
                                            <i class="material-icons">&#xE872;</i></button>
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
    {!! $users->links('pagination.user-paginate') !!}

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" ><b>Confirmation</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('delete.user')}}" method="post">
                    @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="user_id">
                        <h3>Are you sure to delete this username?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.deleteUser').click(function (e) {
                e.preventDefault();

                var user_id = $(this).val();
                $('#user_id').val(user_id);
                $('#deleteModal').modal('show');

            });

        });
    </script>
@endsection
