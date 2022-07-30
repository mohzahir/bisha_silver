<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOptionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_option_id',
        'product_option_value_id',
        'qty',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productOption()
    {
        return $this->belongsTo(ProductOption::class);
    }
    public function productOptionValue()
    {
        return $this->belongsTo(ProductOptionValue::class);
    }
}
