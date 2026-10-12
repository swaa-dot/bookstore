@php
$cart = collect(session('cart', []));
$subtotal = $cart->sum(fn ($item) => $item['price'] * $item['qty']);
@endphp

<section id="keranjang" class="bg-slate-50 px-6 py-24 lg:px-8">
	<div class="mx-auto max-w-4xl">

		{{-- Flash messages --}}
		@if (session('success'))
		<div
			class="mb-8 flex items-center gap-3 rounded-2xl bg-emerald-50 border border-emerald-100 px-5 py-4 text-sm text-emerald-800 shadow-sm">
			<svg class="h-5 w-5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
				stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round"
					d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<span class="font-medium">{{ session('success') }}</span>
		</div>
		@endif

		@if (session('error'))
		<div
			class="mb-8 flex items-center gap-3 rounded-2xl bg-rose-50 border border-rose-100 px-5 py-4 text-sm text-rose-800 shadow-sm">
			<svg class="h-5 w-5 text-rose-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
				stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round"
					d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<span class="font-medium">{{ session('error') }}</span>
		</div>
		@endif

		{{-- Header --}}
		<div class="text-center mb-12">
			<p class="text-sm font-bold uppercase tracking-[0.25em] text-indigo-600">Keranjang Belanja</p>
			<h2 class="mt-4 font-serif text-3xl font-bold text-slate-900 sm:text-4xl">Simpan buku pilihanmu di sini.
			</h2>
		</div>

		@if ($cart->isEmpty())
		{{-- Empty state --}}
		<div class="rounded-3xl border-2 border-dashed border-slate-200 bg-white px-6 py-16 text-center shadow-sm">
			<div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-50 mb-5">
				<svg class="h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
					stroke-width="1.5">
					<path stroke-linecap="round" stroke-linejoin="round"
						d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
				</svg>
			</div>
			<p class="text-xl font-bold text-slate-900">Keranjang masih kosong</p>
			<p class="mt-2 text-sm text-slate-500">Tambahkan buku dari katalog untuk mulai berbelanja.</p>
			<a href="#buku"
				class="mt-8 inline-flex items-center gap-2 rounded-full bg-indigo-600 px-8 py-3 text-[15px] font-semibold text-white transition-all shadow-md hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-lg">
				Lihat Katalog
				<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
				</svg>
			</a>
		</div>
		@else

		{{-- Daftar item --}}
		<div class="space-y-5">
			@foreach ($cart as $id => $item)
			@php
			$imageUrl = $item['image']
			? (\Illuminate\Support\Str::startsWith($item['image'], ['http://', 'https://']) ? $item['image'] :
			asset('storage/' . $item['image']))
			: 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=200&auto=format&fit=crop';
			@endphp

			<div
				class="group flex flex-col sm:flex-row items-start sm:items-center gap-5 sm:gap-6 bg-white rounded-2xl p-5 shadow-sm ring-1 ring-slate-200/60 transition-all hover:shadow-md hover:ring-indigo-100">

				{{-- Cover --}}
				<div class="w-20 h-28 bg-slate-50 rounded-xl overflow-hidden shrink-0 relative border border-slate-100">
					<img src="{{ $imageUrl }}" alt="{{ $item['title'] }}"
						class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
				</div>

				{{-- Info buku --}}
				<div class="grow">
					<h3
						class="text-lg font-bold text-slate-900 leading-snug transition-colors group-hover:text-indigo-600">
						{{ $item['title'] }}</h3>
					<p class="text-sm font-medium text-slate-500 mt-1">{{ $item['author'] }}</p>
					<p class="text-[15px] font-bold text-indigo-600 mt-2">
						Rp {{ number_format($item['price'], 0, ',', '.') }}
					</p>
					<p class="text-[11px] font-semibold text-slate-400 mt-1 uppercase tracking-wider">
						Stok tersedia: <span class="{{ $item['stock'] < 5 ? 'text-rose-500' : 'text-slate-600' }}">{{
							$item['stock'] }}</span>
					</p>
				</div>

				{{-- Qty + Subtotal --}}
				<div
					class="flex flex-col items-end gap-4 w-full sm:w-auto pt-4 sm:pt-0 border-t sm:border-t-0 border-slate-100">

					<form action="{{ route('user.cart.update', $id) }}" method="POST" class="flex items-center gap-2">
						@csrf
						@method('PATCH')
						<input type="number" name="qty" value="{{ $item['qty'] }}" min="1" max="{{ $item['stock'] }}"
							class="w-16 text-center rounded-full border border-slate-200 bg-slate-50 py-1.5 text-sm font-semibold text-slate-700 transition-all focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
						<button type="submit"
							class="rounded-full bg-slate-100 px-4 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:bg-indigo-50 hover:text-indigo-600">
							Update
						</button>
					</form>

					<div class="flex items-center gap-4">
						<div class="text-right">
							<p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider mb-0.5">Subtotal
							</p>
							<p class="text-base font-bold text-slate-900">
								Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
							</p>
						</div>

						<div class="h-8 w-px bg-slate-200"></div>

						<form action="{{ route('user.cart.remove', $id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit"
								class="flex h-9 w-9 items-center justify-center rounded-full text-slate-400 hover:bg-rose-50 hover:text-rose-600 transition-colors"
								title="Hapus item">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
									stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round"
										d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
								</svg>
							</button>
						</form>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		{{-- Ringkasan --}}
		<div
			class="mt-8 rounded-3xl bg-white p-6 sm:p-8 shadow-xl shadow-slate-200/40 ring-1 ring-slate-200/60 relative overflow-hidden">

			<!-- Dekorasi background blur -->
			<div class="absolute -right-20 -top-20 h-40 w-40 rounded-full bg-indigo-50 blur-3xl"></div>

			<div class="relative z-10 flex flex-col sm:flex-row items-center justify-between gap-6">
				<div>
					<p class="text-sm font-medium text-slate-500 mb-1">Total Item</p>
					<p class="text-xl font-bold text-slate-900">
						{{ $cart->sum('qty') }} <span class="text-base font-medium text-slate-500">Buku</span>
					</p>
				</div>
				<div
					class="text-center sm:text-right w-full sm:w-auto border-t sm:border-t-0 border-slate-100 pt-4 sm:pt-0">
					<p class="text-sm font-medium text-slate-500 mb-1">Total Pembayaran</p>
					<p class="text-3xl font-extrabold text-indigo-600">
						Rp {{ number_format($subtotal, 0, ',', '.') }}
					</p>
				</div>
			</div>

			<div
				class="relative z-10 mt-8 flex flex-col-reverse sm:flex-row gap-4 justify-end border-t border-slate-100 pt-6">
				<form action="{{ route('user.cart.clear') }}" method="POST" class="w-full sm:w-auto">
					@csrf
					@method('DELETE')
					<button type="submit"
						class="w-full sm:w-auto rounded-full border-2 border-rose-100 px-6 py-3.5 text-[15px] font-semibold text-rose-600 transition-colors hover:bg-rose-50 hover:border-rose-200"
						onclick="return confirm('Apakah Anda yakin ingin mengosongkan keranjang?')">
						Kosongkan
					</button>
				</form>
				<a href="#checkout"
					class="flex w-full sm:w-auto items-center justify-center gap-2 rounded-full bg-indigo-600 px-10 py-3.5 text-[15px] font-semibold text-white shadow-md shadow-indigo-200 transition-all hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-lg">
					Checkout Sekarang
					<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m-4 4m4-4H3" />
					</svg>
				</a>
			</div>
		</div>
		@endif

	</div>
</section>