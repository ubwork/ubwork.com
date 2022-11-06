<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Home')</title>
    @section('style')
        @include('client.candidate.layout.style')
    @show
    <link rel="shortcut icon" href="{{ asset('assets/client-bower/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/client-bower/images/favicon.png') }}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body data-anm=".anm">

  <div class="page-wrapper dashboard ">
    <!-- Preloader -->
    <div class="preloader"></div>
    <!-- Header Span -->
    <span class="header-span"></span>
    <!-- Main Header-->
    @include('client.candidate.layout.header')
    <!--End Main Header -->
    <!-- Sidebar Backdrop -->
    <div class="sidebar-backdrop"></div>
    <!-- User Sidebar -->

    <!-- End User Sidebar -->
    <!-- Dashboard -->
    @yield('content')
    <!-- End Dashboard -->
    <!-- Copyright -->
    <div class="copyright-text">
      <p>© 2021 Superio. All Right Reserved.</p>
    </div>

  </div><!-- End Page Wrapper -->

    @section('script')
        @include('client.candidate.layout.script')
    @show
</body>

</html>