<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Theme;
use App\Services\ArticleService;
use App\Services\HistoryService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RatingController;
use App\Services\RatingService;

class ArticleController extends Controller
{

    protected $articleService;
    protected $historyService;
    protected $ratingController;

    protected $ratingService;

    public function __construct(ArticleService $articleService, HistoryService $historyService, RatingController $ratingController, RatingService $ratingService)
    {
        $this->articleService = $articleService;
        $this->historyService = $historyService;
        $this->ratingController = $ratingController;
        $this->ratingService = $ratingService;
    }

    public function index(Theme $theme)
    {
        $user = Auth::user();

        $articles = $this->articleService->getArticleByUser($user->id);

        return view('dashboard.articles', compact('articles'));
    }


    public function public_index(Request $request)
    {
        $articles = $this->articleService->getPublicArticles();

        return view("articles.index", compact("articles"));
    }

    public function public_show(Article $article)
    {
        return view("articles.show", compact("article"));
    }
    public function create(Theme $theme)
    {
        return view('articles.create', compact('theme'));
    }


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

        return redirect()->route('dashboard.articles', ["theme" => $theme->id])
            ->with('success', 'Article created successfully and is now under review.');
    }


    public function show(Theme $theme, Article $article)
    {
        if ($article->status === "Published") {
            $this->historyService->trackHistory(Auth::user()->id, $article->id);
        }
        $userRating = $this->ratingController->getUserRating($article);

        $avgRating  = round($this->ratingService->getAverageRating($article->id), 2);


        return view('articles.show', compact('article', 'userRating', "avgRating"));
    }

    public function edit(Article $article)
    {
        //$this->authorize('update', $article);
        //$themes = Theme::all();
        return view('articles.edit', compact('article', 'themes'));
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


    public function destroy(Request $request)
    {
        $request->validate(["article_id" => "required|exists:articles,id"]);

        $this->articleService->deleteArticle($request->article_id);

        return redirect()->route('dashboard.articles')
            ->with('success', 'Article deleted successfully.');
    }


    public function manage_articles(Request $request, $theme_id)
    {
        $articles = $this->articleService->getAllArticles()->where("theme_id", $theme_id)->where("status", "Pending");

        return view("dashboard.themes-manage.articles", compact("articles"));
    }


    public function approve($article_id)
    {
        $article = $this->articleService->approveArticle($article_id)->first();
        if (!$article) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        return redirect()->back()->with('success', 'Article approved.');
    }


    public function reject($article_id)
    {
        $article = $this->articleService->rejectArticle($article_id)->first();
        if (!$article) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        return redirect()->back()->with('success', 'Article rejected.');
    }


    public function publish($article_id)
    {
        $user  = Auth::user();
        // if ($user->role !== "editor" && !$theme->manager_id === $user->id) {
        //     abort(403, "Not allowed to accomplish this action");
        // }

        $article = $this->articleService->publishArticle($article_id)->first();
        if (!$article) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        return redirect()->back()->with('success', 'Article rejected.');
    }


    public function make_public($article_id)
    {
        $user  = Auth::user();
        // if ($user->role !== "editor" && !$theme->manager_id === $user->id) {
        //     abort(403, "Not allowed to accomplish this action");
        // }

        $article = $this->articleService->publicArticle($article_id)->first();

        if (!$article) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

        return redirect()->back()->with('success', 'Articles is Public.');
    }
}
