<header
    class="fixed left-0 right-0 top-4 z-50 mx-4 md:mx-auto max-w-6xl rounded-2xl bg-white/85 backdrop-blur-lg shadow-sm border border-slate-200/50 transition-all duration-300">
    <div class="flex h-20 items-center justify-between px-6 lg:px-8">

        <!-- Logo Area -->
        <a href="{{ route('landing') }}" class="group flex items-center gap-3">
            <span
                class="font-serif text-2xl font-bold tracking-tight text-slate-900 transition-colors group-hover:text-indigo-600">
                BookWorld<span class="text-indigo-500">.</span>
            </span>
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="{{ route('landing') }}#hero"
                class="text-[15px] font-medium text-slate-500 transition-all hover:text-indigo-600 hover:underline hover:underline-offset-4 decoration-indigo-300 decoration-2">Dashboard</a>
            <a href="{{ route('landing') }}#buku"
                class="text-[15px] font-medium text-slate-500 transition-all hover:text-indigo-600 hover:underline hover:underline-offset-4 decoration-indigo-300 decoration-2">Katalog</a>
            <a href="{{ route('about-us') }}"
                class="text-[15px] font-medium text-slate-500 transition-all hover:text-indigo-600 hover:underline hover:underline-offset-4 decoration-indigo-300 decoration-2">Tentang
                Kami</a>
        </nav>

        <!-- Auth Buttons -->
        <div class="hidden items-center gap-4 md:flex">
            <a href="{{ route('login') }}"
                class="rounded-full px-5 py-2.5 text-[15px] font-semibold text-slate-600 transition-colors hover:bg-slate-100 hover:text-indigo-600">
                Masuk
            </a>
            <a href="{{ route('register') }}"
                class="rounded-full bg-indigo-600 px-6 py-2.5 text-[15px] font-semibold tracking-wide text-white shadow-md shadow-indigo-200 transition-all hover:bg-indigo-700 hover:shadow-lg hover:-translate-y-0.5">
                Daftar Sekarang
            </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="rounded-lg bg-slate-100 p-2 text-slate-600 transition-colors hover:bg-slate-200 md:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>
</header>