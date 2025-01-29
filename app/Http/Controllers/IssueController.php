<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Services\IssueService;
use Illuminate\Http\Request;

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
        return view("magazines.show", compact("issue"));
    }
}
