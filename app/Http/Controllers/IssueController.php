<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Services\ArticleService;
use App\Services\IssueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{



    protected $issueService;
    protected $articleService;
    public function __construct(IssueService $issueService, ArticleService $articleService)
    {
        $this->issueService = $issueService;
        $this->articleService = $articleService;
    }
    public function index(Request $request)
    {

        $issues = $this->issueService->getPublicIssues();
        // dd($issues);
        return view("magazines.index", compact("issues"));
    }


    public function show(Issue $issue)
    {

        if (!$issue->public && Auth::user()->role !== "editor") {
            return redirect()->back();
        }


        return view("magazines.show", compact("issue"));
    }


    public function create(Request $request)
    {
        return view("magazines.create",);
    }

    public function store(Request $request)
    {
        $request->validate(["title" => "required|max:255", "description" => "required", "image" => "required"]);


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "image" => "images/$imageName",
            "publication_date" => now(),
            "public" => 0,
        ];

        $this->issueService->createIssue($data);
        return view("dashboard.issues");
    }

    public function manage(Request $request)
    {
        $issues = $this->issueService->getAllIssues();
        return view("dashboard.issues", compact("issues"));
    }



    public function publish($issue_id)
    {
        $user  = Auth::user();
        // if ($user->role !== "editor" && !$theme->manager_id === $user->id) {
        //     abort(403, "Not allowed to accomplish this action");
        // }

        $issue = $this->issueService->publicIssue($issue_id)->first();
        if (!$issue) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        return redirect()->back()->with('success', 'Issue published.');
    }

    public function private($issue_id)
    {

        $issue = $this->issueService->privateIssue($issue_id)->first();
        if (!$issue) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        return redirect()->back()->with('success', 'Issue Private .');
    }


    public function manage_articles(Request $request, Issue $issue)
    {


        $articles = $this->articleService->getAllArticles()->where("status", "Proposed");
        return view("dashboard.issue-manage.articles", compact("articles", "issue"));
    }




    public function approve_article(Request $request, $issue_id, $article_id)
    {
        $article = $this->articleService->publishArticle($article_id, $issue_id)->first();
        if (!$article) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        return redirect()->back()->with('success', 'Article approved.');
    }
    public function reject_article(Request $request, $issue_id, $article_id)
    {
        $article = $this->articleService->approveArticle($article_id)->first();
        if (!$article) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        return redirect()->back()->with('success', 'Article approved.');
    }
}
