<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = request()->has('archived') ? Article::archived() : Article::unarchived();
        if (request()->has('search'))
            $articles = $articles->searchBody(request()->get('search'));

        return view('articles.index', ['articles' => $articles->get()]);
    }

    /**
     *Display a listing of the most viewed articles.
     */
    public function indexTopViewedArticles()
    {
        //TODO : Discuss if articles displayed are all or only taken from Article::unarchived()
        $articles = Article::orderByViewCount()->take(5);
        return view('articles.index', ['articles' => $articles->get(), 'showViewCount' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create', ['article' => new Article()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->incrementViewCount();
        $bestProposal = $article->purchaseProposals()->orderByBestAmount()->first();
        return view('articles.show', compact('article', 'bestProposal'));
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
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->archive();
        return redirect()->route('articles.index');
    }
}
