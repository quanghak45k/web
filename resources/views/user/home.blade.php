<!DOCTYPE html>
<html lang="en">

@include('user.layout.head')

<body>

<!-- ======= Header ======= -->
@include('user.layout.header')

<main id="main">

@include('user.layout.mainHeader')

    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
        <div class="container">
            <div class="row">
                @include('user.layout.leftBody')
            <!-- End left sidebar -->

            <!-- Start single blog -->
                @include('user.layout.mainBody')
            </div>
        </div>
    </div>
    <!-- End Blog Page -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('user.layout.footer')

</body>

</html>
