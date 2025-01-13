<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $history = History::where("user_id", $request->user()->id)->take(10)->get();
        return view("history.index", compact("history"));
    }
}
