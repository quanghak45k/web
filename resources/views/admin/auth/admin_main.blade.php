<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">

                @yield('content')
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
    @include('admin.layout.footer')
</body>
</html>

