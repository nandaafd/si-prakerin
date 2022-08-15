<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'PGG - CENTRE' }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/simple-datatables/style.css') }}">


    {{-- <style>
        body{
            background-color: var(--bs-body-bg);
        }
    </style> --}}
    @stack('css')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('nav.navbar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>


            @yield('content')


            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ date('Y') }} &copy; {{ env('APP_NAME') }} - Behaestex Group</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted by <a href="">IT BTX</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script src="{{ asset('/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    @stack('js')


</body>

</html>
