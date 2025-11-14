<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <style>
        .font-bebas {
            font-family: "Bebas Neue", ui-sans-serif, system-ui;
        }

        .font-poppins {
            font-family: "Poppins", ui-sans-serif, system-ui;
        }

        html {
            scroll-behavior: smooth;
        }

        /* biar tombol 'Profil Kami' mulus scrollnya */
    </style>
    <style>
        .font-roboc {
            font-family: "Roboto Condensed", system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
    <link rel="icon" href="{{ asset('images/ikon-isuzu.png') }}" type="image/png">

    <title>@yield('title', 'Isuzu Karabha')</title>
    @vite(['resources/js/app.js'])
</head>

<body class="antialiased bg-white text-neutral-900">
    @include('components.ui.navbar')

    <main id="page-transition" class="page-transition">
        @yield('content')
    </main>
    @include('layouts.footer')
    @vite(['resources/js/app.js'])
</body>


</html>
