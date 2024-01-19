<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PurchaseProposal;
use Illuminate\Http\Request;

class PurchaseProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Article $article)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $article, Request $request)
    {
        //TODO : Discuss about the possibility to block purchase proposal for archived articles
        $validated = $request->validate([
            'email' => 'required|max:255',
            'amount' => 'required|numeric|min:1|max:9999999',
        ]);
        $article->purchaseProposals()->create($validated);
        return redirect()->route('articles.show', $article);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Article $article)
    {
        return view('purchase-proposals.create', [
            'article' => $article,
            'proposal' => new PurchaseProposal()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseProposal $purchaseProposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseProposal $purchaseProposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseProposal $purchaseProposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseProposal $purchaseProposal)
    {
        //
    }
}
