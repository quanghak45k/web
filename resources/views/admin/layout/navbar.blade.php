<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top  position-fixed" style="padding-top: 10px; padding-bottom: 10px">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Admin Dropdown Menu -->
        <li class="nav-item dropdown">
            <div class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="#" class="avatar" alt=""> Admin <b class="caret"></b></a>
                <div class="dropdown-menu">
                    <a href="{{route('admin.profile')}}" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('admin.logout')}}" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
                </div>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
