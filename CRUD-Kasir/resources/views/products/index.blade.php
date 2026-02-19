@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-slate-800">Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-green-600 px-4 py-2.5 font-medium text-white shadow hover:bg-green-700">
        + Tambah Produk
    </a>
</div>

<div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-100">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">Barcode</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">Nama Barang</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">Kategori</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-600">Harga Modal</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-600">Harga Jual</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-600">Stok</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($products as $product)
                <tr class="{{ $product->isLowStock() ? 'bg-red-50' : 'bg-white hover:bg-slate-50' }}">
                    <td class="whitespace-nowrap px-4 py-3 text-sm text-slate-700">{{ $product->barcode ?? '—' }}</td>
                    <td class="px-4 py-3 text-sm font-medium text-slate-800">{{ $product->name }}</td>
                    <td class="px-4 py-3 text-sm text-slate-600">{{ $product->category->value }}</td>
                    <td class="whitespace-nowrap px-4 py-3 text-right text-sm text-slate-700">{{ $product->formatIdr($product->cost_price) }}</td>
                    <td class="whitespace-nowrap px-4 py-3 text-right text-sm text-slate-700">{{ $product->formatIdr($product->selling_price) }}</td>
                    <td class="whitespace-nowrap px-4 py-3 text-right">
                        <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium {{ $product->isLowStock() ? 'bg-red-200 text-red-800' : 'bg-slate-200 text-slate-800' }}">
                            {{ $product->stock }}
                        </span>
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('products.edit', $product) }}" class="rounded-lg bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg bg-red-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-red-700">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-slate-500">Belum ada produk. <a href="{{ route('products.create') }}" class="font-medium text-green-600 hover:underline">Tambah produk pertama</a>.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
