<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Theme;

class ArticleController extends Controller
{
    /**
     * Class ArticleController
     *
     * This controller handles the CRUD operations for the Article model.
     *
     * Methods:
     * - index(): Display a listing of the articles.
     * - create(): Show the form for creating a new article.
     * - store(Request $request): Store a newly created article in storage.
     * - show(Article $article): Display the specified article.
     * - edit(Article $article): Show the form for editing the specified article.
     * - update(Request $request, Article $article): Update the specified article in storage.
     * - destroy(Article $article): Remove the specified article from storage.
     *
     * @package App\Http\Controllers
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $themes = Theme::all(); //TODO Remove later , linked automaticly
        return view('articles.create', compact("themes"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Article::create([$request->all(), "status" => "Pending"]);
        Article::create(array_merge($request->all(), ["author_id" => $request->user()->id]));

        return redirect()->route('articles.index')
            ->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
