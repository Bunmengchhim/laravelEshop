<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">


    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('admin/css/material-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>

    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        @include('layouts.include.sidebar');
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.include.adminnav');
        <div class="content">
            @yield('content')
        </div>
        @include('layouts.include.adminfooter');
    </main>

    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/js/smooth-scrollbar.min.js')}}"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status'))

        <script>
            swal("{{ session('status') }}");
        </script>
        
    @endif
    @yield('script')
    
</body>
</html>
