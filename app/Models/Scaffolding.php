<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scaffolding extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'material',
        'rental_price',
        'sale_price',
        'dimensions',
        'max_height',
        'max_load',
        'image',
        'is_available',
        'stock_quantity',
        'specifications'
    ];

    protected $casts = [
        'rental_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_available' => 'boolean',
        'stock_quantity' => 'integer',
        'max_height' => 'integer',
        'max_load' => 'integer'
    ];

    public function getFormattedRentalPriceAttribute()
    {
        return $this->rental_price ? 'Rp ' . number_format($this->rental_price, 0, ',', '.') : null;
    }

    public function getFormattedSalePriceAttribute()
    {
        return $this->sale_price ? 'Rp ' . number_format($this->sale_price, 0, ',', '.') : null;
    }
}

