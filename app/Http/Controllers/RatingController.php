<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{   
    public function store(Request $request){
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Rating::create($validatedData);

        return response()->json(['message' => 'Rating submitted successfully!']);
        //
    }
}
