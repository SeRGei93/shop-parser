<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }


    public function create()
    {
        return view('admin.products.create', [
            'product' => '',
            'product_categories' => ProductCategory::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function store(Request $request)
    {
        $product = Product::create($request->except('categories'));

        //categories
        if ($request->has('categories')){
            $product->categories()->attach($request->input('categories'));
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'product_categories' => ProductCategory::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $product->update($request->except('categories'));

        $product->categories()->detach();

        //categories
        if ($request->has('categories')){
            $product->categories()->attach($request->input('categories'));
        }

        return redirect()->route('admin.product.index');
    }



    public function destroy(Product $product)
    {
        $product->categories()->detach();

        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
