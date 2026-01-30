@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('products.index') }}"
                class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 flex items-center gap-2 group transition">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition duration-200" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="mt-4 text-3xl font-bold text-slate-900 dark:text-slate-100 transition-colors">Tambah Produk Baru</h1>
            <p class="text-slate-500 dark:text-slate-400 transition-colors">Lengkapi formulir di bawah untuk menambahkan
                produk inventori baru.</p>
        </div>

        <div
            class="bg-white dark:bg-slate-900 shadow-xl shadow-slate-200/50 dark:shadow-none rounded-2xl border border-slate-100 dark:border-slate-800 overflow-hidden transition-colors">
            <form action="{{ route('products.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="nama_produk"
                        class="text-sm font-bold text-slate-700 dark:text-slate-300 tracking-tight transition-colors">Nama
                        Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}"
                        class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('nama_produk') ? 'border-rose-300 ring-rose-100 dark:ring-rose-900/20' : 'border-slate-200 dark:border-slate-700 ring-indigo-50 dark:ring-indigo-900/10' }} focus:ring-4 focus:border-indigo-500 transition outline-none bg-white dark:bg-slate-800 dark:text-slate-100"
                        placeholder="Masukkan nama lengkap produk">
                    @error('nama_produk')
                        <p class="text-xs font-bold text-rose-500 dark:text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label for="harga"
                            class="text-sm font-bold text-slate-700 dark:text-slate-300 tracking-tight transition-colors">Harga
                            Jual</label>
                        <div class="relative">
                            <span
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 font-bold text-sm transition-colors">Rp</span>
                            <input type="number" name="harga" id="harga" value="{{ old('harga') }}"
                                class="w-full pl-11 pr-4 py-2.5 rounded-xl border {{ $errors->has('harga') ? 'border-rose-300 ring-rose-100 dark:ring-rose-900/20' : 'border-slate-200 dark:border-slate-700 ring-indigo-50 dark:ring-indigo-900/10' }} focus:ring-4 focus:border-indigo-500 transition outline-none bg-white dark:bg-slate-800 dark:text-slate-100"
                                placeholder="0">
                        </div>
                        @error('harga')
                            <p class="text-xs font-bold text-rose-500 dark:text-rose-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="kategori_id"
                            class="text-sm font-bold text-slate-700 dark:text-slate-300 tracking-tight transition-colors">Kategori</label>
                        <select name="kategori_id" id="kategori_id"
                            class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('kategori_id') ? 'border-rose-300 ring-rose-100 dark:ring-rose-900/20' : 'border-slate-200 dark:border-slate-700 ring-indigo-50 dark:ring-indigo-900/10' }} focus:ring-4 focus:border-indigo-500 transition outline-none bg-white dark:bg-slate-800 dark:text-slate-100 transition-colors">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_kategori }}"
                                    {{ old('kategori_id') == $category->id_kategori ? 'selected' : '' }}>
                                    {{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-xs font-bold text-rose-500 dark:text-rose-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="status_id"
                            class="text-sm font-bold text-slate-700 dark:text-slate-300 tracking-tight transition-colors">Status
                            Produk</label>
                        <select name="status_id" id="status_id"
                            class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('status_id') ? 'border-rose-300 ring-rose-100 dark:ring-rose-900/20' : 'border-slate-200 dark:border-slate-700 ring-indigo-50 dark:ring-indigo-900/10' }} focus:ring-4 focus:border-indigo-500 transition outline-none bg-white dark:bg-slate-800 dark:text-slate-100 transition-colors">
                            <option value="">Pilih Status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id_status }}"
                                    {{ old('status_id') == $status->id_status ? 'selected' : '' }}>
                                    {{ $status->nama_status }}</option>
                            @endforeach
                        </select>
                        @error('status_id')
                            <p class="text-xs font-bold text-rose-500 dark:text-rose-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-6 flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-2xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900/50 transition shadow-xl shadow-indigo-100 dark:shadow-none">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
