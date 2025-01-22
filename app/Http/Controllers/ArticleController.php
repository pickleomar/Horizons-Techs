<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Theme;
use App\Services\ArticleService;
use App\Services\HistoryService;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    protected $articleService;
    protected $historyService;

    public function __construct(ArticleService $articleService, HistoryService $historyService)
    {
        $this->articleService = $articleService;
        $this->historyService = $historyService;
    }
    /**
     * Display a listing of the articles.
     */
    public function index(Theme $theme)
    {
        $user = Auth::user();

        // TODO THIS FEATURE ISN'T IMPLEMENTED YET : Filtering

        $articles = $theme->articles;

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create(Theme $theme)
    {

        return view('articles.create', compact('theme'));
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request, Theme $theme)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "image" => "images/$imageName",
            "author_id" => Auth::user()->id,
            "theme_id" => $theme->id,
            "status" => "Pending"
        ];


        $this->articleService->createArticle($data);

        return redirect()->route('articles.index', ["theme" => $theme->id])
            ->with('success', 'Article created successfully and is now under review.');
    }

    /**
     * Display the specified article.
     */
    public function show(Theme $theme, Article $article)
    {
        $this->historyService->trackHistory(Auth::user()->id, $article->id);
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
    public function destroy($id)
    {
        $this->articleService->deleteArticle($id);

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
