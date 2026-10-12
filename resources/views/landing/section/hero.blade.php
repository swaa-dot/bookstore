<section id="hero" class="relative overflow-hidden bg-slate-50 pt-16 pb-20 lg:pt-24 lg:pb-28">

    <!-- Ornamen Background Blur (Opsional untuk estetika modern) -->
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div
            class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-indigo-200 to-indigo-400 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]">
        </div>
    </div>

    <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2 lg:gap-16 lg:px-8">

        <!-- Bagian Teks -->
        <div class="max-w-2xl">
            <h1
                class="font-serif text-4xl font-bold leading-tight tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                Beli Buku <span class="text-indigo-600">Lebih Mudah</span> dan Terorganisir.
            </h1>
            <p class="mt-6 max-w-xl text-base leading-8 text-slate-600 sm:text-lg font-light">
                BookWorld membantu mengelola seluruh koleksi bacaan dan kebutuhan literasi Anda secara lebih sederhana,
                cepat, dan terstruktur dalam satu platform digital.
            </p>

            <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-indigo-600 px-8 py-3.5 text-[15px] font-semibold text-white shadow-lg shadow-indigo-200 transition-all hover:-translate-y-1 hover:bg-indigo-700 hover:shadow-xl">
                    Mulai Sekarang
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
                <a href="#buku"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-8 py-3.5 text-[15px] font-semibold text-slate-700 shadow-sm border border-slate-200 transition-all hover:bg-slate-100 hover:text-indigo-600">
                    Lihat Katalog
                </a>
            </div>

            <!-- List Fitur -->
            <div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-4 pt-6 border-t border-slate-200/60">
                <div class="flex items-center gap-2.5">
                    <div class="flex h-5 w-5 items-center justify-center rounded-full bg-indigo-100 text-indigo-600">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-600">Mudah digunakan</span>
                </div>
                <div class="flex items-center gap-2.5">
                    <div class="flex h-5 w-5 items-center justify-center rounded-full bg-indigo-100 text-indigo-600">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-600">Terorganisir</span>
                </div>
                <div class="flex items-center gap-2.5">
                    <div class="flex h-5 w-5 items-center justify-center rounded-full bg-indigo-100 text-indigo-600">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-600">Berbasis digital</span>
                </div>
            </div>
        </div>

        <!-- Bagian Gambar -->
        <div class="relative flex justify-center lg:justify-end mt-8 lg:mt-0">
            <!-- Elemen dekoratif di belakang gambar -->
            <div class="absolute -inset-4 z-0 rounded-[3rem] bg-indigo-100/40 blur-2xl lg:-inset-8"></div>

            <img src="https://plus.unsplash.com/premium_photo-1677567996070-68fa4181775a?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bGlicmFyeXxlbnwwfHwwfHx8MA%3D%3D"
                alt="Library"
                class="relative z-10 w-full max-w-xl rounded-2xl object-cover shadow-2xl shadow-indigo-900/10 ring-1 ring-slate-900/5 rotate-2 transition-transform duration-500 hover:rotate-0">
        </div>

    </div>
</section>