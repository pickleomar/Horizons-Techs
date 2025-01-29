<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Services\IssueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{



    protected $issueService;
    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
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
}
