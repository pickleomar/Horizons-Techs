<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the articles.
     */
    public function index()
    {
        $user = Auth::user();

        // TODO THIS FEATURE ISN'T IMPLEMENTED YET
        // Filter articles based on user role

        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        $themes = Theme::all();   //TODO Remove later , linked automaticly
        return view('articles.create', compact('themes'));
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request, Theme $theme)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'theme_id' => 'required|exists:themes,id',
            'image' => 'nullable|url',
        ]);

        Article::create(array_merge($request->all(), ["author_id" => $request->user()->id]));

        /*Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'theme_id' => $request->theme_id,
            'author_id' => $request->user()->id,
            'status' => 'Pending', // Default status for new articles
        ]);*/

        return redirect()->route('articles.index')
            ->with('success', 'Article created successfully and is now under review.');
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article)
    {
        //$this->authorize('update', $article);
        //$themes = Theme::all();
        return view('articles.edit', compact('article', 'themes'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article)
    {
        /*
        $this->authorize('update', $article);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'theme_id' => 'required|exists:themes,id',
            'image' => 'nullable|url',
        ]);

        $article->update($request->only('title', 'content', 'theme_id', 'image', 'status'));
        */
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article->update($request->all());
        return redirect()->route('articles.index')
            ->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article)
    {
        /* $this->authorize('delete', $article); */
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}