<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
        <p class="text-sm text-stone-500 mt-1">Kelola data pelanggan yang terdaftar di sistem.</p>
    </x-slot>
    <div class="py-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white border border-stone-200">
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-stone-50/50">
                                <th
                                    class="px-6 py-4 text-[10px] font-semibold tracking-[0.15em] text-stone-500 uppercase">
                                    Nama
                                    Lengkap</th>
                                <th
                                    class="px-6 py-4 text-[10px] font-semibold tracking-[0.15em] text-stone-500 uppercase">
                                    Email
                                </th>
                                <th
                                    class="px-6 py-4 text-[10px] font-semibold tracking-[0.15em] text-stone-500 uppercase">
                                    Tanggal Daftar</th>
                                <th
                                    class="px-6 py-4 text-[10px] font-semibold tracking-[0.15em] text-stone-500 uppercase text-right">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr class="border-t border-stone-100 transition-colors hover:bg-stone-50/50">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-[#1A1A1A]">{{ $user->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-stone-500">{{ $user->email }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-stone-500">{{ $user->created_at->format('d M Y') }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#"
                                        class="text-[11px] font-medium tracking-[0.1em] text-stone-400 uppercase transition-colors hover:text-[#1A1A1A]">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-16 text-center">
                                    <p class="text-sm text-stone-400">Belum ada pengguna yang mendaftar.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>