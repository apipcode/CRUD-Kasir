@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-800">Detail Produk</h1>
        <a href="{{ route('products.edit', $product) }}" class="rounded-lg bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">Edit</a>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-sm font-medium text-slate-500">Barcode</dt>
                <dd class="mt-1 text-slate-800">{{ $product->barcode ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-slate-500">Nama Barang</dt>
                <dd class="mt-1 text-slate-800">{{ $product->name }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-slate-500">Kategori</dt>
                <dd class="mt-1 text-slate-800">{{ $product->category->value }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-slate-500">Harga Modal</dt>
                <dd class="mt-1 text-slate-800">{{ $product->formatIdr($product->cost_price) }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-slate-500">Harga Jual</dt>
                <dd class="mt-1 text-slate-800">{{ $product->formatIdr($product->selling_price) }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-slate-500">Stok</dt>
                <dd class="mt-1">
                    <span class="inline-flex rounded-full px-2.5 py-0.5 text-sm font-medium {{ $product->isLowStock() ? 'bg-red-200 text-red-800' : 'bg-slate-200 text-slate-800' }}">
                        {{ $product->stock }}
                    </span>
                </dd>
            </div>
        </dl>
        <div class="mt-6">
            <a href="{{ route('products.index') }}" class="text-slate-600 hover:underline">← Kembali ke daftar</a>
        </div>
    </div>
</div>
@endsection
