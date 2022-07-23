@extends('admin.layout.admin_home_main')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4"><h2> <b>User Profile:</b></h2></div>

                        <div class=" col-sm-8 ">
                            <div class="pull-right">
                                <b style="margin-bottom: 0px;">Back:  </b><a class="btn btn-primary" href="{{route('dashboard')}}" title="back"> <i class="fas fa-backward"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <table class="table table-striped table-hover table-bordered text-center" style="width: 50%; margin-left: auto; margin-right: auto">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created Date</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>1</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date_format($user->created_at, 'jS M Y') }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection


