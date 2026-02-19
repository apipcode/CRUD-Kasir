<?php

namespace App\Models;

use App\Enums\ProductCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'barcode',
        'name',
        'category',
        'cost_price',
        'selling_price',
        'stock',
    ];

    protected function casts(): array
    {
        return [
            'category' => ProductCategory::class,
            'cost_price' => 'decimal:0',
            'selling_price' => 'decimal:0',
            'stock' => 'integer',
        ];
    }

    /**
     * Format price to Indonesian Rupiah (IDR).
     */
    public function formatIdr(float|int|string $amount): string
    {
        return 'Rp ' . number_format((float) $amount, 0, ',', '.');
    }

    /**
     * Accessor: Cost price formatted as IDR.
     */
    protected function costPriceFormatted(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(
            fn () => $this->formatIdr($this->cost_price)
        );
    }

    /**
     * Accessor: Selling price formatted as IDR.
     */
    protected function sellingPriceFormatted(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::get(
            fn () => $this->formatIdr($this->selling_price)
        );
    }

    /**
     * Check if stock is low (< 10).
     */
    public function isLowStock(): bool
    {
        return $this->stock < 10;
    }
}
