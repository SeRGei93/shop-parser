<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }


    public function create()
    {
        return view('admin.articles.create', [
            'article' => '',
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function store(Request $request)
    {
        $article = Article::create($request->all());

        //categories
        if ($request->input('categories')){
            $article->categories()->attach($request->input('categories'));
        }

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }


    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article' => $article,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }


    public function update(Request $request, Article $article)
    {
        $article->update($request->except('slug'));

        $article->categories()->detach();

        //categories
        if ($request->input('categories')){
            $article->categories()->attach($request->input('categories'));
        }

        return redirect()->route('admin.article.index');
    }


    public function destroy(Article $article)
    {
        $article->categories()->detach();

        $article->delete();

        return redirect()->route('admin.article.index');
    }
}
