<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CRUD-Kasir') — {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700" rel="stylesheet" />
    <style>
        body { font-family: 'DM Sans', ui-sans-serif, system-ui, sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen antialiased">
    <nav class="bg-emerald-700 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14 items-center">
                <a href="{{ route('products.index') }}" class="text-xl font-bold tracking-tight">CRUD-Kasir</a>
                <div class="flex gap-3">
                    <a href="{{ route('products.index') }}" class="px-3 py-2 rounded-md text-emerald-100 hover:bg-emerald-600 font-medium">Daftar Produk</a>
                    <a href="{{ route('products.create') }}" class="px-4 py-2 rounded-md bg-emerald-500 hover:bg-emerald-600 font-medium shadow">+ Tambah Produk</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-4 rounded-lg bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-800 px-4 py-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="max-w-7xl mx-auto px-4 py-4 text-center text-slate-500 text-sm">Toko Sembako — Manajemen Stok</footer>
</body>
</html>
