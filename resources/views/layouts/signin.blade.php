<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal IT</title>
    
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconly/bold.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/portal.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="shortcut icon" href="{{asset('images/logo/logobtx.png')}}" type="image/x-icon">  
</head>
<body>
<div class="cursor-1"></div>
<div class="cursor-2"></div>
<div id="menu-bars" class="fas fa-bars"></div>
    
<header>
</header>

<section class="service" id="service"> 
@yield('content')
</section>

<footer>
    {{-- @include('footer.footer') --}}
</footer>
<script src="{{ asset('/assets/js/portal.js') }}"></script>
<script src="{{ asset('/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/extensions/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script src="{{ asset('/assets/js/datetime.js') }}"></script>
    <script src="{{ asset('/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('/assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>   
@stack('js')
</body>
</html>