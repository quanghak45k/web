<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Đăng Nhập Trang Quản Trị</p>
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <form action=" {{route('admin.login')}} " method="post">
                @csrf
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>

                        <div class="text-center"><a href="{{url('/admin/ForgetPassword')}}">Forgot password ?</a></div>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
    @include('admin.layout.footer')
</body>
</html>

