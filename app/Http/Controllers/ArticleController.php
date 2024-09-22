<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Article;

use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        // Define permissions for actions
        $this->middleware('permission:article create', ['only' => ['create', 'store']]);
        $this->middleware('permission:article edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:article delete', ['only' => ['destroy']]);
        $this->middleware('permission:article view', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles =Article::latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        Article::create($request->validated());
        toast('Article created successfully','success');
        return to_route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->validated());
        toast('Article updated successfully','success');
        return to_route ('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        toast('Article deleted successfully','success');
        return back();
    }
}
