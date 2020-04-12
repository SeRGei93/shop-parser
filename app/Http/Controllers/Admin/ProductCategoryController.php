<?php

namespace App\Http\Controllers\Admin;

use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{

    public function index()
    {
        return view('admin.productCategories.index', [
            'product_categories' => ProductCategory::paginate(10),
        ]);
    }


    public function create()
    {
        return view('admin.productCategories.create', [
            'product_category' => '',
            'product_categories' => ProductCategory::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function store(Request $request)
    {
        ProductCategory::create($request->all());

        return redirect(route('admin.product-category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }


    public function edit(ProductCategory $productCategory)
    {
        return view('admin.productCategories.edit', [
            'product_category' => $productCategory,
            'product_categories' => ProductCategory::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function update(Request $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->except('slug'));

        return redirect(route('admin.product-category.index'));
    }


    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect(route('admin.product-category.index'));
    }
}
