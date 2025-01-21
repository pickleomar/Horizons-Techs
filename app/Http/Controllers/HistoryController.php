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
        // $history = History::where("user_id", $request->user()->id)->take(10)->get();
        // return view("history.index", compact("history"));
        $histories = $this->historyService->getHistorysByUser($request->user()->id);

        // $histories = $this->historyService->getAllHistorys();

        return view("dashboard.history", compact("histories"));
    }
}