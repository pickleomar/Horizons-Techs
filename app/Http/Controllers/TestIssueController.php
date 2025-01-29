<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class TestIssueController extends Controller
{
    public function index()
    {
        // Get the latest public issue
        $latestIssue = Issue::where('public', true)
            ->orderBy('publication_date', 'desc')
            ->first();
        // Redirect to the latest issue's show page
        if ($latestIssue) {
            return redirect()->route('magazines.test.show', ['id' => $latestIssue->id]);
        }
    }
    public function loadMore(Request $request, $id)
    {
        $offset = $request->input('offset', 0); // Starting point
        $limit = $request->input('limit', 3); // Number of issues to fetch

        $issues = Issue::where('public', true)
            ->where('id', '!=', $id) // Exclude the current issue
            ->orderBy('publication_date', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();

        return response()->json($issues); // Return JSON response
    }


    public function show($id)
    {
        $pastIssues = Issue::where('public', true)
            ->orderBy('publication_date', 'desc')
            ->get();
        // Get the current issue
        $currentIssue = Issue::findOrFail($id);

        // Get the previous issue (based on your logic, e.g., by date or ID)
        $previousIssue = Issue::where('id', '<', $id)->orderBy('id', 'desc')->first();

        // Get the next issue (based on your logic, e.g., by date or ID)
        $nextIssue = Issue::where('id', '>', $id)->orderBy('id', 'asc')->first();

        return view('magazines.test.show', compact('currentIssue', 'previousIssue', 'nextIssue', 'pastIssues'));
    }
}
