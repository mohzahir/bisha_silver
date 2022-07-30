<?php

namespace App\Http\Livewire\Product;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProductLivewireComponent extends Component
{
    use WithFileUploads;

    public $brand_id, $sub_category_id, $title, $slug, $qty, $sku, $price, $discount, $short_descr, $descriptive_meta, $keywords_meta, $descr, $status, $photo;
    public $product_imgs = [];
    public function render()
    {
        return view('livewire.product.create-product-livewire-component', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }


    // public function updatedProductImgs($val)
    // {
    //     dd($val);
    // }
}
