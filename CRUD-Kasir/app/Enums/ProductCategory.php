<?php

namespace App\Enums;

enum ProductCategory: string
{
    case Sembako = 'Sembako';
    case Minuman = 'Minuman';
    case MakananRingan = 'Makanan Ringan';
    case Bumbu = 'Bumbu';
    case Perlengkapan = 'Perlengkapan';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
