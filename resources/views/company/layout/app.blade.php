<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    @section('style')
        @include('company.layout.style')
    @show
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body>

    <div class="page-wrapper dashboard ">
        <div class="preloader"></div>

        <!-- Header Span -->
        <span class="header-span"></span>
        @include('company.layout.header')

        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop"></div>

        @include('company.layout.sidebar')

        <!-- Dashboard -->
        <section class="user-dashboard">
            <div class="dashboard-outer">
              @yield('content')
            </div>
        </section>
        <!-- End Dashboard -->

    </div><!-- End Page Wrapper -->

    @section('script')
        @include('company.layout.script')
    @show
</body>


</html>
