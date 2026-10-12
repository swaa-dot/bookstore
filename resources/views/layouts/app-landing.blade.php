<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BookWorld | Curated Collection')</title>
    <meta name="description" content="@yield('description', 'Koleksi buku kurasi terbaik untuk ruang baca Anda.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        .font-serif {
            font-family: 'Lora', serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-200 selection:text-indigo-900">

    @include('landing.section.header')

    <main class="pt-32">
        @yield('content')
    </main>

    @include('layouts.kontak')

    @stack('scripts')
</body>

</html>