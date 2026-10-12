<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} | BookWorld</title>
    <meta name="description" content="{{ Str::limit(strip_tags($book->description ?? ''), 150) }}">

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

    <!-- Floating Header (sama seperti index) -->
    <header
        class="fixed left-0 right-0 top-4 z-50 mx-4 md:mx-auto max-w-7xl rounded-2xl bg-white/85 backdrop-blur-lg shadow-sm border border-slate-200/50 transition-all duration-300">
        <div class="flex h-20 items-center justify-between px-6 lg:px-8">

            <a href="{{ route('landing') }}" class="group flex items-center gap-3">
                <span
                    class="font-serif text-2xl font-bold tracking-tight text-slate-900 transition-colors group-hover:text-indigo-600">
                    BookWorld<span class="text-indigo-500">.</span>
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('user.dashboard') }}#buku"
                    class="text-[15px] font-medium text-slate-500 transition-all hover:text-indigo-600">Katalog</a>
                <a href="{{ route('user.dashboard') }}#aboutus"
                    class="text-[15px] font-medium text-slate-500 transition-all hover:text-indigo-600">Tentang Kami</a>
                <a href="{{ route('user.dashboard') }}#kontak"
                    class="text-[15px] font-medium text-slate-500 transition-all hover:text-indigo-600">Kontak</a>
            </nav>

            <div class="flex items-center gap-5">
                <a href="{{ route('user.dashboard') }}"
                    class="relative group flex items-center justify-center h-10 w-10 rounded-full hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5 text-slate-600 group-hover:text-indigo-600 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                    </svg>
                </a>

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
            </div>
        </div>
    </header>

    <main class="pt-36 pb-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500">
                <a href="{{ route('user.dashboard') }}" class="hover:text-indigo-600 transition-colors">Katalog</a>
                <span>/</span>
                @if ($book->category)
                <span class="text-slate-400">{{ $book->category->name }}</span>
                <span>/</span>
                @endif
                <span class="text-slate-800 font-medium line-clamp-1">{{ $book->title }}</span>
            </nav>

            {{-- Flash --}}
            @if (session('success'))
            <div
                class="mb-6 flex items-center gap-3 rounded-2xl bg-emerald-50 border border-emerald-200 px-5 py-4 text-emerald-800">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
            @endif

            @php
            $imageUrl = $book->image
            ? (Str::startsWith($book->image, ['http://', 'https://'])
            ? $book->image
            : asset('storage/' . $book->image))
            : 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=600&auto=format&fit=crop';
            $isOutOfStock = ($book->stock ?? 0) <= 0; @endphp {{-- Detail Buku --}} <div
                class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                {{-- Cover --}}
                <div class="lg:col-span-5 xl:col-span-4">
                    <div class="sticky top-32">
                        <div
                            class="relative aspect-[3/4] overflow-hidden rounded-3xl bg-white shadow-xl ring-1 ring-slate-200/60">
                            <img src="{{ $imageUrl }}" alt="Cover {{ $book->title }}"
                                class="w-full h-full object-cover">

                            @if ($isOutOfStock)
                            <div
                                class="absolute inset-0 bg-slate-900/60 flex items-center justify-center backdrop-blur-[2px]">
                                <span
                                    class="bg-white text-slate-900 text-[11px] font-bold px-4 py-2 rounded-full uppercase tracking-widest shadow-lg">
                                    Stok Habis
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Info --}}
                <div class="lg:col-span-7 xl:col-span-8 flex flex-col">

                    @if ($book->category)
                    <span
                        class="inline-flex self-start rounded-full bg-indigo-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-indigo-600 mb-4">
                        {{ $book->category->name }}
                    </span>
                    @endif

                    <h1 class="font-serif text-4xl sm:text-5xl font-bold tracking-tight text-slate-900 leading-tight">
                        {{ $book->title }}
                    </h1>

                    <p class="mt-3 text-lg text-slate-500">
                        oleh <span class="font-medium text-slate-800">{{ $book->author }}</span>
                    </p>

                    <div class="mt-6 flex flex-wrap items-center gap-3">
                        <span
                            class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-700">
                            Stok: {{ $book->stock ?? 0 }}
                        </span>

                        @if (! $isOutOfStock && $book->stock <= 5) <span
                            class="inline-flex items-center rounded-full bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-600">
                            Sisa {{ $book->stock }} lagi!
                            </span>
                            @endif
                    </div>

                    {{-- Harga --}}
                    <div class="mt-8 pb-8 border-b border-slate-200/60">
                        <span
                            class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Harga</span>
                        <span class="font-serif text-4xl font-bold text-indigo-600">
                            Rp {{ number_format((float) $book->price, 0, ',', '.') }}
                        </span>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mt-8">
                        <h2 class="font-serif text-xl font-bold text-slate-900 mb-3">Deskripsi</h2>
                        <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed whitespace-pre-line">
                            {{ $book->description ?? 'Belum ada deskripsi untuk buku ini.' }}
                        </div>
                    </div>

                    {{-- Aksi --}}
                    <div class="mt-10 flex flex-wrap items-center gap-3">
                        @if ($isOutOfStock)
                        <button disabled
                            class="inline-flex items-center gap-2 rounded-full bg-slate-200 px-8 py-3.5 text-[15px] font-semibold text-slate-500 cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Stok Habis
                        </button>
                        @else
                        <form action="{{ route('user.cart.add', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center gap-2 rounded-full bg-indigo-600 px-8 py-3.5 text-[15px] font-semibold text-white shadow-md shadow-indigo-200 transition-all hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                                </svg>
                                Tambah ke Keranjang
                            </button>
                        </form>
                        @endif

                        <a href="{{ route('user.cart.index') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-slate-300 bg-white px-8 py-3.5 text-[15px] font-semibold text-slate-700 transition-all hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17" />
                            </svg>
                            Lihat Keranjang
                        </a>

                        <a href="{{ route('user.dashboard') }}#buku"
                            class="inline-flex items-center gap-2 rounded-full px-6 py-3.5 text-[15px] font-semibold text-slate-500 transition-colors hover:text-indigo-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
        </div>

        {{-- Buku Terkait --}}
        @if (isset($relatedBooks) && $relatedBooks->count())
        <section class="mt-24">
            <div class="mb-8 flex items-end justify-between pb-6 border-b border-slate-200/60">
                <div>
                    <h2 class="font-serif text-3xl font-bold tracking-tight text-slate-900">
                        Buku <span class="text-indigo-600">Terkait</span>
                    </h2>
                    <p class="mt-2 text-sm text-slate-500">Koleksi lain dari kategori yang sama.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($relatedBooks as $related)
                @php
                $relatedImage = $related->image
                ? (Str::startsWith($related->image, ['http://', 'https://'])
                ? $related->image
                : asset('storage/' . $related->image))
                : 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=600&auto=format&fit=crop';
                $relatedOut = ($related->stock ?? 0) <= 0; @endphp <article
                    class="group flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200/60 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-indigo-100">
                    <div class="relative aspect-[3/4] bg-slate-50 overflow-hidden">
                        <img src="{{ $relatedImage }}" alt="Cover {{ $related->title }}" loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                        @if ($relatedOut)
                        <div
                            class="absolute inset-0 bg-slate-900/60 flex items-center justify-center backdrop-blur-[2px] z-10">
                            <span
                                class="bg-white text-slate-900 text-[11px] font-bold px-4 py-2 rounded-full uppercase tracking-widest shadow-lg">
                                Stok Habis
                            </span>
                        </div>
                        @endif

                        <a href="{{ route('user.books.show', $related) }}" class="absolute inset-0 z-20"
                            title="Detail {{ $related->title }}"></a>
                    </div>

                    <div class="flex flex-1 flex-col p-6">
                        <div>
                            @if ($related->category)
                            <span
                                class="inline-block rounded-full bg-indigo-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-indigo-600 mb-3">
                                {{ $related->category->name }}
                            </span>
                            @endif

                            <h3
                                class="text-lg font-bold leading-tight text-slate-900 line-clamp-2 transition-colors group-hover:text-indigo-600">
                                <a href="{{ route('user.books.show', $related) }}">{{ $related->title }}</a>
                            </h3>
                            <p class="mt-1.5 text-sm font-medium text-slate-500">
                                {{ $related->author }}
                            </p>
                        </div>

                        <div class="mt-auto pt-6 border-t border-slate-100">
                            <strong class="text-lg font-bold text-indigo-600 block">
                                Rp {{ number_format((float) $related->price, 0, ',', '.') }}
                            </strong>
                        </div>
                    </div>
                    </article>
                    @endforeach
            </div>
        </section>
        @endif

        </div>
    </main>
    @include('user.section.keranjang')
    @include('layouts.kontak')
</body>

</html>