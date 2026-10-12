@extends('layouts.app-landing')

@section('title', 'Tentang Kami | BookWorld')
@section('description', 'Kenali lebih dekat BookWorld dan misi kami.')

@section('content')
<section id="aboutus" class="bg-white px-6 py-24 lg:px-8">
    <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-center">
        <div>
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-indigo-600">Tentang kami</p>
            <h2 class="mt-4 text-3xl font-bold text-black sm:text-4xl">Membuat membaca terasa lebih dekat.</h2>
        </div>
        <p class="text-lg leading-8 text-black">BookWorld adalah platform perpustakaan digital yang hadir untuk
            memudahkan siapa saja dalam menemukan, mengenal, dan
            mengakses berbagai koleksi buku dalam satu tempat.

            Kami percaya bahwa membaca bukan hanya tentang mendapatkan informasi, tetapi juga tentang membuka wawasan,
            menemukan ide
            baru, dan terus mengembangkan diri. Karena itu, BookWorld dirancang dengan pengalaman yang sederhana dan
            nyaman agar
            pengguna dapat menjelajahi koleksi buku dengan lebih mudah.

            Mulai dari mencari buku berdasarkan kategori hingga menemukan bacaan baru yang menarik, BookWorld membantu
            menjadikan
            aktivitas membaca lebih praktis dan menyenangkan.

            Temukan buku favoritmu, perluas wawasanmu, dan mulai perjalanan membaca bersama BookWorld.</p>
    </div>
</section>
@endsection