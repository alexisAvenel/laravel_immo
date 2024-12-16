<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tutoriel Laravel - Admin">
    <meta name="author" content="Alexis Avenel">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://localhost/admin/">
    <!-- Custom styles for this template -->
    <link href="{{Storage::disk('public')->url('/css/core-ui.min.css')}}" rel="stylesheet">
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
</head>
<body>
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-coreui-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white"
       href="{{route('home')}}">
        <img class="img-fluid"
             src="{{Storage::disk('public')->url('/images/logo.svg')}}"
             alt="logo">
    </a>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-coreui-toggle="collapse"
                    data-coreui-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="Toggle search">
                <i class="bi bi-search"></i>
            </button>
        </li>
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-coreui-toggle="offcanvas"
                    data-coreui-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </li>
    </ul>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
        <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-2">
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp"
        crossorigin="anonymous"></script>
<script src="{{Storage::disk('public')->url('/js/core-ui.min.js')}}"></script>
</body>
</html>
