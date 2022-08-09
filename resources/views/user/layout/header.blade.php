<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div class="logo">
            <h1><a href="index.html"><span>web</span>Survey</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li class="dropdown"><a href="#"><span>User</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <a href="{{route('user.logout')}}" >Logout</a>
                            @else
                                <a href="{{route('user.login')}}" >Login</a>
                            @endif




                            </li>
                        <li disabled><a href="#">Change Password</a></li>
                        <li disabled><a href="#">Profile</a></li>
                    </ul>
                </li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->


