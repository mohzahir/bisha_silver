<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'option_type',
        'field_type',
    ];

    public function productOptionsValues()
    {
        return $this->hasMany(ProductOptionValue::class);
    }
}
