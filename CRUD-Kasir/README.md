# CRUD-Kasir — Toko Sembako Inventory

A simple Laravel CRUD application for grocery store (Toko Sembako) inventory management.

## Requirements

- PHP 8.2+
- Composer
- SQLite (default; no extra setup needed)

## Setup (if starting from scratch)

```bash
# From the folder where you want the project (e.g. Documents/kasir)
composer create-project laravel/laravel CRUD-Kasir
cd CRUD-Kasir
```

Tailwind CSS is included via CDN in the layout; no build step required.

## Run the application

```bash
cd CRUD-Kasir
php artisan migrate
php artisan serve
```

Then open **http://localhost:8000**. You will be redirected to the product list. Use **+ Tambah Produk** to add items.

## Features

- **Products CRUD**: Barcode (optional), Nama Barang, Kategori, Harga Modal, Harga Jual, Stok
- **Categories**: Sembako, Minuman, Makanan Ringan, Bumbu, Perlengkapan
- **Low stock**: Rows with stock &lt; 10 are highlighted in red
- **IDR formatting**: Prices shown as Rp 55.000 via `$product->formatIdr($product->selling_price)`

## Project structure

- `app/Models/Product.php` — Model with fillable, casts, `formatIdr()`, `isLowStock()`
- `app/Enums/ProductCategory.php` — Category enum
- `app/Http/Controllers/ProductController.php` — Resource controller
- `resources/views/layouts/app.blade.php` — Main layout with navbar (Tailwind CDN)
- `resources/views/products/` — index, create, edit, show
- `routes/web.php` — `Route::resource('products', ProductController::class)`
- `database/migrations/*_create_products_table.php` — Products table

## UI colors (POS style)

- **Add product**: Green
- **Edit**: Blue
- **Delete**: Red
