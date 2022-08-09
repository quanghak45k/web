<!DOCTYPE html>
<html lang="en">

@include('user.layout.head')

<body>

<!-- ======= Header ======= -->
@include('user.layout.header')

<main id="main">
    <div class="blog-page area-padding">
        <div class="container  d-flex justify-content-center">
            @yield('content')
        </div>
    </div>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('user.layout.footer')
@yield('script')
</body>

</html>
