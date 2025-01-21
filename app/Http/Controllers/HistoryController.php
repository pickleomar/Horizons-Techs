<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Services\HistoryServiceInterface;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    protected $historyService;

    public function __construct(HistoryServiceInterface $historyService)
    {
        $this->historyService = $historyService;
    }

    public function index(Request $request)
    {
        $histories = $this->historyService->getHistorysByUser($request->user()->id);
        return view("dashboard.history", compact("histories"));
    }

    public function destroy(Request $request)
    {

        $request->validate([
            "article_id" => "required|exists:articles,id"
        ]);

        $this->historyService->deleteHistory($request->user()->id, $request->article_id);

        $histories = $this->historyService->getHistorysByUser($request->user()->id);

        return redirect()->route("dashboard.history");
    }
}
