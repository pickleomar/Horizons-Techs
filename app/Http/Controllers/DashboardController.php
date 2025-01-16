<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view("dashboard.index");
    }


    public function subscription(Request $request)
    {
        return view("dashboard.subscription");
    }

    public function history(Request $request)
    {
        return view("dashboard.history");
    }
}