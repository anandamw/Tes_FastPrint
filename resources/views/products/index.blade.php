@extends('layouts.app')

@section('content')
    <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex-grow">
            <h1
                class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-slate-100 tracking-tight transition-colors">
                Katalog
                Produk</h1>
            <p class="mt-2 text-slate-500 dark:text-slate-400 text-base md:text-lg transition-colors">Daftar produk dengan
                status <span
                    class="font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-0.5 rounded-lg border border-emerald-100 dark:border-emerald-800/50 italic">"bisa
                    dijual"</span>.</p>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('products.create') }}"
                class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-bold rounded-2xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900/50 transition shadow-xl shadow-indigo-100 dark:shadow-none">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Produk
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <!-- Bisa Dijual Card -->
        <div
            class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-emerald-100 dark:border-emerald-800/50 shadow-xl shadow-emerald-500/5 dark:shadow-none flex items-center justify-between transition-colors">
            <div>
                <p class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Bisa Dijual</p>
                <h3 class="text-3xl font-black text-slate-900 dark:text-slate-100 mt-1">{{ $totalCanSell }} <span
                        class="text-sm font-medium text-slate-400 dark:text-slate-500">Produk</span></h3>
            </div>
            <div
                class="w-14 h-14 bg-emerald-50 dark:bg-emerald-900/20 rounded-2xl flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Tidak Bisa Dijual Card -->
        <div
            class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-rose-100 dark:border-rose-800/50 shadow-xl shadow-rose-500/5 dark:shadow-none flex items-center justify-between transition-colors">
            <div>
                <p class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Tidak Bisa Dijual
                </p>
                <h3 class="text-3xl font-black text-slate-900 dark:text-slate-100 mt-1">{{ $totalCannotSell }} <span
                        class="text-sm font-medium text-slate-400 dark:text-slate-500">Produk</span></h3>
            </div>
            <div
                class="w-14 h-14 bg-rose-50 dark:bg-rose-900/20 rounded-2xl flex items-center justify-center text-rose-600 dark:text-rose-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div
        class="overflow-hidden bg-white dark:bg-slate-900 shadow-xl shadow-slate-200/50 dark:shadow-none rounded-2xl border border-slate-100 dark:border-slate-800 transition-colors">
        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-slate-100 dark:divide-slate-800">
                <thead class="bg-slate-50/50 dark:bg-slate-800/50">
                    <tr>
                        <th scope="col"
                            class="px-4 md:px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            No</th>
                        <th scope="col"
                            class="px-4 md:px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Produk</th>
                        <th scope="col"
                            class="px-4 md:px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Harga</th>
                        <th scope="col"
                            class="hidden md:table-cell px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Kategori
                        </th>
                        <th scope="col"
                            class="hidden sm:table-cell px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-4 md:px-6 py-4 text-center text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 bg-white dark:bg-slate-900">
                    @forelse($products as $product)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition duration-150">
                            <td
                                class="px-4 md:px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-400 dark:text-slate-500">
                                #{{ $products->firstItem() + $loop->index }}</td>
                            <td class="px-4 md:px-6 py-4">
                                <div
                                    class="text-sm font-semibold text-slate-900 dark:text-slate-100 transition-colors truncate max-w-[150px] md:max-w-xs">
                                    {{ $product->nama_produk }}</div>
                                <div class="md:hidden mt-0.5 space-y-0.5">
                                    <span
                                        class="text-[10px] font-medium text-slate-400 uppercase">{{ $product->kategori->nama_kategori }}</span>
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-indigo-600 dark:text-indigo-400">Rp
                                    {{ number_format($product->harga, 0, ',', '.') }}</div>
                            </td>
                            <td class="hidden md:table-cell px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 transition-colors">
                                    {{ $product->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td class="hidden sm:table-cell px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold uppercase tracking-wider {{ $product->status->nama_status == 'bisa dijual' ? 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400' }} transition-colors">
                                    <span
                                        class="w-1.5 h-1.5 rounded-full mr-2 {{ $product->status->nama_status == 'bisa dijual' ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    {{ $product->status->nama_status }}
                                </span>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('products.edit', $product->id_produk) }}"
                                        class="text-amber-600 dark:text-amber-400 hover:text-amber-700 dark:hover:text-amber-300 font-bold transition">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id_produk) }}" method="POST"
                                        class="inline-block delete-form transition-colors">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-rose-600 dark:text-rose-400 hover:text-rose-700 dark:hover:text-rose-300 font-bold transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="w-16 h-16 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4 text-slate-300 dark:text-slate-600 transition-colors">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-slate-500 dark:text-slate-400 font-medium text-lg transition-colors">
                                        Belum ada produk untuk ditampilkan.</p>
                                    <a href="{{ route('products.create') }}"
                                        class="mt-4 text-indigo-600 dark:text-indigo-400 font-bold hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors transition">Tambahkan
                                        produk pertama anda &rarr;</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div
                class="px-6 py-4 border-t border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50 transition-colors">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm(
                        'Apakah anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.'
                    )) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush
