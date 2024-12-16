<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tutoriel Laravel - Agence immobilière">
    <meta name="author" content="Alexis Avenel">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{Storage::disk('public')->url('/css/core-ui.min.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="canonical" href="https://localhost/">
    <style>
        @layer main {
            button {
                all: unset;
            }
        }
    </style>
</head>
<body>

@includeWhen(!Route::currentRouteNamed(['login']), 'header')

<main>@yield('content')</main>

@includeWhen(!Route::currentRouteNamed(['login']), 'footer')
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
        crossorigin="anonymous"
        async></script>
<script src="{{Storage::disk('public')->url('/js/core-ui.min.js')}}"></script>
</body>
</html>
