<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - BookWorld</title>

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

<body
    class="bg-slate-50 text-slate-800 antialiased selection:bg-indigo-200 selection:text-indigo-900 flex min-h-screen flex-col justify-center py-12 sm:px-6 lg:px-8 relative z-0">

    <!-- Ornamen Background Blur -->
    <div class="absolute inset-x-0 top-0 -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
        <div
            class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-indigo-200 to-indigo-400 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]">
        </div>
    </div>

    <!-- Container Utama -->
    <div class="sm:mx-auto sm:w-full sm:max-w-md px-6 sm:px-0">

        <!-- Logo -->
        <a href="{{ route('landing') }}" class="group flex flex-col items-center gap-3 mb-8"> 
            <span
                class="font-serif text-3xl font-bold tracking-tight text-slate-900 transition-colors group-hover:text-indigo-600">
                BookWorld<span class="text-indigo-500">.</span>
            </span>
        </a>

        <!-- Card Form Register -->
        <div class="bg-white py-10 px-6 sm:px-10 rounded-3xl shadow-xl shadow-slate-200/50 ring-1 ring-slate-200/60">

            <div class="text-center mb-8">
                <h2 class="font-serif text-2xl font-bold text-slate-900">Bergabung Bersama Kami</h2>
                <p class="text-sm text-slate-500 mt-2">Buat akun baru untuk mulai menjelajahi katalog</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">{{ __('Nama Lengkap')
                        }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        autocomplete="name"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-[15px] text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10 @error('name') border-rose-500 focus:border-rose-500 focus:ring-rose-500/10 @enderror">
                    @error('name')
                    <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">{{ __('Alamat Email')
                        }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        autocomplete="username"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-[15px] text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10 @error('email') border-rose-500 focus:border-rose-500 focus:ring-rose-500/10 @enderror">
                    @error('email')
                    <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">{{ __('Kata Sandi')
                        }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-[15px] text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10 @error('password') border-rose-500 focus:border-rose-500 focus:ring-rose-500/10 @enderror">
                    @error('password')
                    <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">{{
                        __('Konfirmasi Kata Sandi') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="block w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-[15px] text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10 @error('password_confirmation') border-rose-500 focus:border-rose-500 focus:ring-rose-500/10 @enderror">
                    @error('password_confirmation')
                    <p class="mt-1.5 text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="flex w-full items-center justify-center rounded-full bg-indigo-600 px-4 py-3.5 text-[15px] font-bold text-white shadow-md shadow-indigo-200 transition-all hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Daftar Sekarang') }}
                    </button>
                </div>
            </form>

            <!-- Login Link -->
            <p class="mt-8 text-center text-sm text-slate-500">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                    class="font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">
                    Masuk di sini
                </a>
            </p>

        </div>
    </div>
</body>

</html>