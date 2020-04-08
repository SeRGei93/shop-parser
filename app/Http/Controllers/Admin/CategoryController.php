<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::paginate(10),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create', [
            'category' => '',
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except('slug'));

        return redirect(route('admin.category.index'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('admin.category.index'));
    }
}
