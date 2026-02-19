@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="mx-auto max-w-2xl">
    <h1 class="mb-6 text-2xl font-bold text-slate-800">Tambah Produk Baru</h1>

    <form action="{{ route('products.store') }}" method="POST" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        @csrf

        <div class="space-y-4">
            <div>
                <label for="barcode" class="mb-1 block text-sm font-medium text-slate-700">Barcode (opsional)</label>
                <input type="text" name="barcode" id="barcode" value="{{ old('barcode') }}" placeholder="Kode barang / barcode" class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
            </div>

            <div>
                <label for="name" class="mb-1 block text-sm font-medium text-slate-700">Nama Barang *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Contoh: Beras Pandan Wangi 5kg" class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
            </div>

            <div>
                <label for="category" class="mb-1 block text-sm font-medium text-slate-700">Kategori *</label>
                <select name="category" id="category" required class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                    <option value="">Pilih kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->value }}" {{ old('category') === $cat->value ? 'selected' : '' }}>{{ $cat->value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="cost_price" class="mb-1 block text-sm font-medium text-slate-700">Harga Modal (Rp) *</label>
                    <input type="number" name="cost_price" id="cost_price" value="{{ old('cost_price') }}" required min="0" step="1" class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                </div>
                <div>
                    <label for="selling_price" class="mb-1 block text-sm font-medium text-slate-700">Harga Jual (Rp) *</label>
                    <input type="number" name="selling_price" id="selling_price" value="{{ old('selling_price') }}" required min="0" step="1" class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                </div>
            </div>

            <div>
                <label for="stock" class="mb-1 block text-sm font-medium text-slate-700">Stok *</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" required min="0" step="1" class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="rounded-lg bg-green-600 px-4 py-2.5 font-medium text-white shadow hover:bg-green-700">Simpan Produk</button>
            <a href="{{ route('products.index') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 font-medium text-slate-700 hover:bg-slate-50">Batal</a>
        </div>
    </form>
</div>
@endsection
