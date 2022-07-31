<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.sub_category.index', [
            'sub_categories' => SubCategory::where('category_id', $request->category)->orderBy('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sub_category.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSubCategoryRequest $request)
    {
        SubCategory::create($request->except(['_token']));
        return redirect()->route('admin.sub_category.index')->with('success', 'تمت اضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $sub_category)
    {
        return view('admin.sub_category.edit', [
            'sub_category' => $sub_category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(AddSubCategoryRequest $request, SubCategory $sub_category)
    {
        $sub_category->update($request->except('_token'));

        return redirect()->route('admin.sub_category.index')->with('success', 'تم تحديث بيانات القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        //
    }
}
