<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductOption;
use App\Models\ProductOptionItem;
use App\Models\ProductOptionValue;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->input('sub_category_id'), function ($q) use ($request) {
                $q->where(['sub_category_id' => $request->input('sub_category_id')]);
            })
            ->when($request->input('searchText'), function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->input('searchText') . '%');
            })
            ->orderBy('id', 'desc')->paginate(10);
        // dd($products);
        $categories = Category::orderBy('id', 'asc')->get();
        return view('admin.product.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * getOptionValues gets options values for product create view
     *
     * @return void
     */
    public function getOptionValues(Request $request)
    {
        $option_id = $request->input('option');
        $options = ProductOption::with('productOptionsValues')->findOrFail($option_id)->toArray();
        $options_values = ProductOptionValue::where('product_option_id', $option_id)->get()->toArray();
        $options_values = json_encode($options_values);
        // dd(json_encode($options_values, true));
        $append = "
        <div class=\"tab-pane active\" id=\"OptionNo_ID\" data-index=\"OptionNo_Key\">
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"table-responsive\">
                        <table class=\"table mt-10 table-bordered table-striped table_options table-condensed flip-content\">
                            <thead class=\"flip-content\">
                            <tr>
                                <th> قيمة الخيارات </th>
                                <th> الكمية </th>
                                <th style=\"width: 100px;\">التحكم</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                            <tr>
                                <td colspan=\"2\"></td>
                                <td>
                                    <button type=\"button\" title=\"أضافة خيار\" class=\"btn btn-primary AddOptionValue\"><i class=\"fa fa-plus\"></i></button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <div class=\"display-none\">
                            <input type=\"hidden\" class=\"valuesOptions\" name=\"options[values_option]\" value='$options_values'>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        $options['append'] = $append;
        return response()->json([
            'status' => true,
            'message' => null,
            'data' => $options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.product.create', [
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'options' => ProductOption::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        // dd($request->all());

        try {
            DB::transaction(function () use ($request) {
                //Add Product
                $photo = $request->file('photo')->store('product_photo', 'public_folder');
                $product = Product::create([
                    'title' => $request->input('title'),
                    'slug' => Str::slug($request->input('title')),
                    'sub_category_id' => $request->input('sub_category_id'),
                    'brand_id' => $request->input('brand_id'),
                    'price' => $request->input('price'),
                    'discount' => $request->input('discount') ?? 0,
                    'qty' => $request->input('qty'),
                    'sku' => $request->input('sku'),
                    'short_descr' => $request->input('short_descr'),
                    'descr' => $request->input('descr'),
                    'keywords_meta' => $request->input('keywords_meta'),
                    'descriptive_meta' => $request->input('descriptive_meta'),
                    'photo' => $photo,
                ]);

                //Add Product Images
                $product_imgs = [];
                foreach ($request->file('product_imgs') as $key => $img) {
                    array_push($product_imgs, [
                        'product_id' => $product->id,
                        'path' => $img->store('product_imgs', 'public_folder'),
                    ]);
                }
                ProductImage::insert($product_imgs);

                //Add product Attributes
                $attributes = [];
                foreach ($request->input('specifications') as $key => $specification) {
                    array_push($attributes, [
                        'product_id' => $product->id,
                        'name' => $specification['name'],
                        'text' => $specification['text'],
                    ]);
                }
                ProductAttribute::insert($attributes);

                //Add Product Option Item
                if ($request->input('options')) {
                    $product_option_items = [];
                    foreach ($request->input('options')['values'] as $key => $value) {
                        array_push($product_option_items, [
                            'product_id' => $product->id,
                            'product_option_id' => $request->input('options')['option_id'],
                            'product_option_value_id' => $value['option_value_id'],
                            'qty' => $value['qty'],
                        ]);
                    }
                    ProductOptionItem::insert($product_option_items);
                }
            });
        } catch (\Throwable $th) {
            throw $th;
        }



        return redirect()->route('admin.product.index')->with(['success' => 'تم اضافة المنتج بنجاح']);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show')->with([
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', [
            'product' => $product,
            'options' => ProductOption::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(AddProductRequest $request, Product $product)
    {

        try {
            DB::transaction(function () use ($request, $product) {
                //update product
                $photo = $product->photo;
                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo')->store('files', 'public_folder');
                }
                $product->update([
                    $request->only([
                        'brand_id',
                        'sub_category_id',
                        'title',
                        'qty',
                        'sku',
                        'price',
                        'discount',
                        'short_descr',
                        'descriptive_meta',
                        'keywords_meta',
                        'descr',
                    ]),
                    'photo' => $photo,
                ]);

                //Update Product Images
                if ($request->hasFile('photo')) {
                    $product_imgs = [];

                    foreach ($request->file('product_imgs') as $key => $img) {
                        array_push($product_imgs, [
                            'product_id' => $product->id,
                            'path' => $img->store('product_imgs', 'public_folder'),
                        ]);
                    }
                    ProductImage::insert($product_imgs);
                }
                //Delete Exists Product Attributes
                ProductAttribute::where('product_id', $product->id)->delete();
                //Add product Attributes
                $attributes = [];
                foreach ($request->input('specifications') as $key => $specification) {
                    array_push($attributes, [
                        'product_id' => $product->id,
                        'name' => $specification['name'],
                        'text' => $specification['text'],
                    ]);
                }
                ProductAttribute::insert($attributes);

                //Delete Exists ProductOptionItems
                ProductOptionItem::where('product_id', $product->id)->delete();
                //Add Product Option Item
                if ($request->input('options')) {
                    $product_option_items = [];
                    foreach ($request->input('options')['values'] as $key => $value) {
                        array_push($product_option_items, [
                            'product_id' => $product->id,
                            'product_option_id' => $request->input('options')['option_id'],
                            'product_option_value_id' => $value['option_value_id'],
                            'qty' => $value['qty'],
                        ]);
                    }
                    ProductOptionItem::insert($product_option_items);
                }
            });
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }

        return redirect()->route('admin.product.show', ['product' => $product->id])->with(['success' => 'تم تحديث بيانات المنتج بنجاخ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * deleteProductImage
     *
     * @return void
     */
    public function deleteProductImage(Request $request, $product_id, $img_id)
    {
        $img = ProductImage::findOrFail($img_id);
        // dd($img_id);
        $img->delete();
        return redirect()->back();
    }
}
