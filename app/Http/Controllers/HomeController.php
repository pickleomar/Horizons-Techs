<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\ThemeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $themeService;
    protected $articleService;
    public function __construct(ThemeService $themeService, ArticleService $articleService)
    {
        $this->articleService = $articleService;
        $this->themeService = $themeService;
    }
    public function index()
    {
        $articles = $this->articleService->getRandomArticles();
        // dd($articles);
        return view("home", compact("articles"));
    }
}
