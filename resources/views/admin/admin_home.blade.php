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
                                        <a type="button" data-attr="{{route('delete.user', $user->id)}}" data-target="#smallModal" class="delete" title="Delete" data-toggle="modal" id="smallButton">
                                            <i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {!! $users->links('pagination.user-paginate') !!}
                    </div>
                </div>

            </div>
    <!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <form action="{{ route('delete.user', $user->id) }}" method="post">
                            <div class="modal-body">
                                @csrf

                                <h5 class="text-center">Are you sure you want to delete Username: {{ $user->name }} ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete this User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // display a modal (small modal)

        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href
                , beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                }
                , complete: function() {
                    $('#loader').hide();
                }
                , error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                }
                , timeout: 8000
            })
        });
    </script>
@endsection


