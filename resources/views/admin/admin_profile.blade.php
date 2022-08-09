@extends('admin.layout.admin_home_main')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>User list</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Admin</li>
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
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Admin Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.update')}}" method="post">
                        @csrf
                                    <div class="card-body container " style="width: 50%;">
                                        <div class="form-group">
                                            <label for="name">Admin</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$admin->name}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$admin->email}}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group d-flex flex-column">
                                            <label for="password">Password</label>
                                            <div style="display: inline-flex">
                                                <input type="" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="******"  autocomplete="current-password" >
                                                <i class="bi bi-eye-slash" id="togglePassword"></i>

                                                <button type="button" class="btn btn-primary " onclick="randomPassword(8);"  style="margin-left: 10px">Generate</button>
                                            </div>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                        <!-- /.card-body -->
                        <div class="card-footer" style="text-align: center">
                            <button type="submit" class="btn btn-primary  ">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


