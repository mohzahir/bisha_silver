<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::orderBy('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
        $photo = $request->file('photo')->store('category_photo', 'public_folder');
        Category::create(
            [
                'name' => $request->input('name'),
                'descr' => $request->input('descr'),
                'photo' => $photo
            ]
        );
        return redirect()->route('admin.category.index')->with('success', 'تمت اضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(AddCategoryRequest $request, Category $category)
    {
        // dd($request->all());
        $photo = $category->photo;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('category_photo', 'public_folder');
        }
        $category->update(
            [
                'name' => $request->input('name'),
                'descr' => $request->input('descr'),
                'photo' => $photo
            ]
        );

        return redirect()->route('admin.category.index')->with('success', 'تم تحديث بيانات القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
