<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'sub_category_id',
        'title',
        'slug',
        'qty',
        'sku',
        'price',
        'discount',
        'short_descr',
        'descriptive_meta',
        'keywords_meta',
        'descr',
        'status',
        'rate',
        'review',
        'photo',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productOptionItems()
    {
        return $this->hasMany(ProductOptionItem::class, 'product_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function productRate()
    {
        if (count($this->reviews)) {
            $total_votes = 0;
            $one_vote = 0;
            $tow_vote = 0;
            $three_vote = 0;
            $four_vote = 0;
            $five_vote = 0;
            foreach ($this->reviews as $key => $review) {
                $total_votes++;
                switch ($review->rate) {
                    case '1':
                        $one_vote++;
                        break;
                    case '2':
                        $tow_vote++;
                        break;
                    case '3':
                        $three_vote++;
                        break;
                    case '4':
                        $four_vote++;
                        break;
                    case '5':
                        $five_vote++;
                        break;
                }
            }

            return ((1 * $one_vote + 2 * $tow_vote + 3 * $three_vote + 4 * $four_vote + 5 * $five_vote) / $total_votes);
        } else {
            return 0;
        }
    }
}
