<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookWorld | Dashboard & Katalog</title>
    <meta name="description" content="Jelajahi katalog buku pilihan BookWorld dengan desain modern dan bersih.">

    <!-- Font Baru: Outfit (Sans) & Lora (Serif) -->
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
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-200 selection:text-indigo-900">

    <!-- Floating Header -->
    <header
        class="fixed left-0 right-0 top-4 z-50 mx-4 md:mx-auto max-w-7xl rounded-2xl bg-white/85 backdrop-blur-lg shadow-sm border border-slate-200/50 transition-all duration-300">
        <div class="flex h-20 items-center justify-between px-6 lg:px-8">

            <!-- Logo -->
            <a href="{{ route('landing') }}" class="group flex items-center gap-3"> 
                <span
                    class="font-serif text-2xl font-bold tracking-tight text-slate-900 transition-colors group-hover:text-indigo-600">
                    BookWorld<span class="text-indigo-500">.</span>
                </span>
            </a>

            <!-- Navigasi Tengah -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="#buku"
                    class="text-[15px] font-medium text-slate-500 transition-all hover:text-indigo-600">Katalog</a>
                <a href="#kontak"
                    class="text-[15px] font-medium text-slate-500 transition-all hover:text-indigo-600">Kontak</a>
                    
            </nav>

            <!-- Aksi Kanan (Cart & Logout) -->
            <div class="flex items-center gap-5">
                <!-- Ikon Keranjang -->
                <a href="#keranjang"
                    class="relative group flex items-center justify-center h-10 w-10 rounded-full hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5 text-slate-600 group-hover:text-indigo-600 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                    </svg>
                </a>

                <!-- Form Logout -->
                <form method="POST" action="{{ route('logout') }}" class="hidden md:block">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 rounded-full px-4 py-2 text-[14px] font-semibold text-slate-500 transition-colors hover:bg-rose-50 hover:text-rose-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>

                <!-- Mobile Menu Button -->
                <button
                    class="md:hidden flex items-center justify-center h-10 w-10 rounded-full bg-slate-100 text-slate-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="pt-36 pb-24">
        <section id="buku">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <!-- Section Header & Search -->
                <div
                    class="mb-14 flex flex-col md:flex-row md:items-end justify-between gap-8 pb-8 border-b border-slate-200/60">
                    <div class="max-w-2xl">
                        <h1 class="font-serif text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                            Katalog <span class="text-indigo-600">Buku</span>
                        </h1>
                        <p class="mt-4 text-base font-light text-slate-500">
                            Jelajahi koleksi buku pilihan kami yang dikurasi khusus untuk meningkatkan pengetahuan dan
                            menginspirasi hari Anda.
                        </p>
                    </div>

                    <!-- Search Form Ter-update -->
                    <form action="{{ route('user.dashboard') }}" method="GET"
                        class="w-full md:w-auto flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-grow">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari judul, penulis, genre..."
                                class="w-full sm:w-80 pl-12 pr-4 py-3.5 rounded-full border border-slate-200 bg-white text-[15px] shadow-sm transition-all focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/10">
                            <svg class="w-5 h-5 text-slate-400 absolute left-4 top-3.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-indigo-600 px-8 py-3.5 text-[15px] font-semibold text-white shadow-md shadow-indigo-200 transition-all hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-lg">
                            Cari
                        </button>
                    </form>
                </div>

                {{-- Empty State --}}
                @if ($books->isEmpty())
                <div class="rounded-3xl border-2 border-dashed border-slate-200 py-24 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 mb-4">
                        <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900">Tidak ada buku ditemukan</h3>
                    <p class="mt-2 text-sm text-slate-500">Coba gunakan kata kunci lain atau hapus pencarian.</p>
                    <a href="{{ route('user.dashboard') }}"
                        class="mt-6 inline-flex rounded-full bg-slate-100 px-6 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">
                        Lihat Semua Katalog
                    </a>
                </div>
                @else

                {{-- Grid Buku --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($books as $book)
                    @php
                    $imageUrl = $book->image
                    ? (\Illuminate\Support\Str::startsWith($book->image, ['http://', 'https://'])
                    ? $book->image
                    : asset('storage/' . $book->image))
                    : 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=600&auto=format&fit=crop';
                    $isOutOfStock = ($book->stock ?? 0) <= 0; @endphp <article
                        class="group flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200/60 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-indigo-100">
                        <!-- Cover Buku -->
                        <div class="relative aspect-[3/4] bg-slate-50 overflow-hidden">
                            <img src="{{ $imageUrl }}" alt="Cover {{ $book->title }}" loading="lazy"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                            <!-- Status Stok Habis -->
                            @if ($isOutOfStock)
                            <div
                                class="absolute inset-0 bg-slate-900/60 flex items-center justify-center backdrop-blur-[2px] z-10">
                                <span
                                    class="bg-white text-slate-900 text-[11px] font-bold px-4 py-2 rounded-full uppercase tracking-widest shadow-lg">
                                    Stok Habis
                                </span>
                            </div>
                            @endif

                            <a href="{{ route('user.books.show', $book) }}" class="absolute inset-0 z-20"
                                title="Detail {{ $book->title }}"></a>
                        </div>

                        <!-- Informasi Buku -->
                        <div class="flex flex-1 flex-col p-6">
                            <div>
                                @if ($book->category)
                                <span
                                    class="inline-block rounded-full bg-indigo-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-indigo-600 mb-3">
                                    {{ $book->category->name }}
                                </span>
                                @endif
                                <span
                                    class="inline-block rounded-full bg-indigo-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-indigo-600 mb-3">
                                    {{ $book->stock > 0 ? 'Stok: ' . $book->stock : 'Stok Habis' }}
                                </span>

                                <h3
                                    class="text-lg font-bold leading-tight text-slate-900 line-clamp-2 transition-colors group-hover:text-indigo-600">
                                    <a href="{{ route('user.books.show', $book->id) }}">{{ $book->title }}</a>
                                </h3>
                                <p class="mt-1.5 text-sm font-medium text-slate-500">
                                    {{ $book->author }}
                                </p>
                            </div>
                            <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between">
                                <div>
                                    <strong class="text-lg font-bold text-indigo-600 block">
                                        Rp {{ number_format((float) $book->price, 0, ',', '.') }}
                                    </strong>
                                    @if (! $isOutOfStock && $book->stock <= 5) <p
                                        class="text-[11px] font-semibold text-rose-500 mt-1 uppercase tracking-wider">
                                        Sisa {{ $book->stock }}</p>
                                        @endif
                                </div>

                                <!-- Tombol Add to Cart -->
                                @if ($isOutOfStock)
                                <button type="button" disabled
                                    class="flex h-10 w-10 z-30 items-center justify-center rounded-full bg-slate-100 text-slate-400 cursor-not-allowed"
                                    title="Stok Habis">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                                @else
                                <form action="{{ route('user.cart.add', $book->id) }}" method="POST" class="z-30">
                                    @csrf
                                    <button type="submit"
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5"
                                        title="Tambah ke Keranjang">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                        </article>
                        @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-14">
                    {{ $books->withQueryString()->links() }}
                </div>
                @endif
            </div>
        </section>
    </main>
    @include('user.section.keranjang')
    @include('layouts.kontak')
</body>

</html>