<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



@include('admin.layout.navbar')
{{--    <section>--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <h1>dsad</h1>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}

@include('admin.layout.silebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper ">

            <section class="content-header" style="margin-top: 50px">
                @yield('content-header')

            </section>


        <section class="content">
            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022-2025 <a href="#">Admin Demo</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> Demo 1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layout.footer')

@yield('script')
</body>
</html>

