<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'descr',
        'icon',
        'status',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
