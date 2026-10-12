<section id="buku" class="bg-white px-6 py-24 lg:px-8">
    <div class="mx-auto max-w-7xl">

        <div class="max-w-2xl">
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-indigo-600">
                Katalog pilihan
            </p>
            <h2 class="mt-4 font-serif text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Temukan cerita berikutnya.
            </h2>
            <p class="mt-4 text-base leading-8 text-slate-500 font-light">
                Koleksi bacaan pilihan untuk menemani waktu belajar, beristirahat, dan menjelajah dunia baru.
            </p>
        </div>

        <!-- Book Grid -->
        <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">

            @forelse ($books as $book)
            <article
                class="group flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200/60 transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-indigo-100">

                <div class="relative aspect-[3/4] overflow-hidden bg-slate-50">
                    @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    @else
                    <div class="flex h-full items-center justify-center bg-slate-100">
                        <span class="text-sm font-semibold text-slate-400">
                            BookWorld
                        </span>
                    </div>
                    @endif

                    <!-- Overlay Gradient (opsional, agar gambar tidak terlalu flat) -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/10 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    </div>
                </div>

                <div class="flex flex-1 flex-col p-6">
                    <div>
                        <span
                            class="inline-block rounded-full bg-indigo-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-indigo-600">
                            {{ $book->category->name ?? 'Tanpa kategori' }}
                        </span>

                        <h3 class="mt-4 text-lg font-bold leading-tight text-slate-900 line-clamp-2">
                            {{ $book->title }}
                        </h3>

                        <p class="mt-1.5 text-sm text-slate-500">
                            {{ $book->author }}
                        </p>
                    </div>

                    <div class="mt-auto pt-6">
                        <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                            <strong class="text-lg font-bold text-indigo-600">
                                Rp{{ number_format($book->price, 0, ',', '.') }}
                            </strong>
                        </div>
                    </div>
                </div>
            </article>

            @empty
            <div class="col-span-full rounded-2xl border-2 border-dashed border-slate-200 py-16 text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 mb-4">
                    <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-slate-900">Belum ada buku</h3>
                <p class="mt-1 text-sm text-slate-500">Koleksi buku saat ini sedang kosong.</p>
            </div>
            @endforelse

        </div>

        <!-- CTA Bottom Banner -->
        <div
            class="mt-20 relative overflow-hidden rounded-3xl bg-indigo-600 px-6 py-12 text-center sm:px-10 lg:py-16 shadow-xl shadow-indigo-900/10">
            <!-- Latar belakang dekoratif (Glow Effect) -->
            <div class="absolute -top-24 -right-24 h-64 w-64 rounded-full bg-indigo-400/30 blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 h-64 w-64 rounded-full bg-indigo-800/40 blur-3xl"></div>

            <div class="relative z-10">
                <h3 class="font-serif text-2xl font-bold text-white sm:text-3xl">
                    Buku yang kamu cari belum ada?
                </h3>
                <p class="mt-4 text-indigo-100 max-w-xl mx-auto text-sm sm:text-base">
                    Hubungi kami dan beritahu apa yang Anda cari. Tim kami akan dengan senang hati membantu
                    mencarikannya untuk Anda.
                </p>
              <a href="https://wa.me/6281231973100?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20BookWorld" target="_blank"
                rel="noopener"
                class="mt-8 inline-flex items-center gap-2 rounded-full bg-white px-8 py-3.5 text-[15px] font-bold text-indigo-600 shadow-md transition-all hover:-translate-y-1 hover:bg-slate-50 hover:shadow-lg">
                Hubungi BookWorld
            </a>
            </div>
        </div>

    </div>
</section>