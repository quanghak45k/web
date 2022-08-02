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
                <a href="{{route('dashboard')}}" type="button" class="btn btn-primary float-right" style="font-size: small; color: lightyellow"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </div>
        </div>

    </div>

@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Information</h3>
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
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at }}</td>
                                    <td>{{ $user->active }}</td>
                                    <td>{{ date_format($user->created_at, 'jS M Y') }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

