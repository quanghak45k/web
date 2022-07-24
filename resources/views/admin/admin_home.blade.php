@extends('admin.layout.admin_home_main')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
            <div class="container-fluid">
                <div class="table-wrapper">
                    <div style="width: 80%; margin-right: auto; margin-left: auto">
                        <div class="table-title" >
                            <div class="row">
                                <div class="col-sm-4" ><h4><b>User list:</b></h4></div>
                                <div class="col-sm-4 ">

                                    <div class="d-flex">
                                        <div class="mx-auto">

                                            <form action="{{ route('dashboard') }}" method="GET" role="search">

                                                <div class="d-flex">

                                                    <button class="btn btn-primary t" type="submit" title="Search username" style="margin-right: 5px">
                                                        <span class="fas fa-search"></span>
                                                    </button>
                                                    <input type="text" class="form-control mr-2" name="term" placeholder="Search usernames" id="term">
                                                    <a href="{{ route('dashboard') }}" class="">
                                                        <button class="btn btn-success" type="button" title="Refresh page">
                                                            <span class="fas fa-sync-alt"></span>
                                                        </button>

                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

{{--                                    <div class=" d-flex  ">--}}
{{--                                        <input type="text" class="form-control" placeholder="Search&hellip;" style="margin-right: 5px">--}}
{{--                                        <button class="btn btn-primary" type="button"  title="Refresh page">--}}
{{--                                            <span class="fas fa-sync-alt"></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                </div>
                                <div class=" col-sm-4 ">
                                    <div class="pull-right" >
                                        <b style="margin-right: 5px;">Add User:  </b><a class="btn btn-primary" href="{{route('create.user')}}" title="Create a user"> <i class="fas fa-plus-circle"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered " style="width: 80%; margin-right: auto; margin-left: auto">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name <i class="fa fa-sort"></i></th>
                                <th>Email</th>
                                <th>Created Date <i class="fa fa-sort"></i></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date_format($user->created_at, 'jS M Y') }}</td>
                                    <td>
                                        <a href="{{route('show.user', $user->id)}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                        <a href="{{route('edit.user', $user->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

{{--                                        <a data-toggle="modal" id="smallButton" data-target="#smallModal"--}}
{{--                                           data-attr="{{ route('delete.user', $user->id) }}" title="Delete Project" >--}}
{{--                                            <i class="material-icons">&#xE872;</i></a>--}}
                                        <button type="button" class="btn-danger  deleteUser" id="deleteUser" value="{{$user->id}}" data-toggle="modal" >
                                            <i class="material-icons">&#xE872;</i></button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {!! $users->links('pagination.user-paginate') !!}
                    </div>
                </div>

            </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >ban muon xoa cai id nay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('delete.user')}}" method="post">
                    @csrf
                <div class="modal-body">

                        <input type="hidden" name="id" id="user_id">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
                </form>
            </div>
        </div>
    </div>>



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
