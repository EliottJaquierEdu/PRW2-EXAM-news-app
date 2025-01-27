<?php

use App\Http\Controllers\PurchaseProposalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [ArticleController::class, "indexTopViewedArticles"])->name('home');
Route::resource('articles', ArticleController::class);
Route::resource('articles.comments', CommentController::class)->only(['store']);
Route::resource('articles.auctions', PurchaseProposalController::class)->only(['create', 'store']);
