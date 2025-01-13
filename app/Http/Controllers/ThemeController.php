<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::all();
        return view("themes.index", compact("themes"));
    }

    public function create(Request $request)
    {
        return view("themes.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:themes',
            'description' => 'nullable|string',
        ]);

        $theme = Theme::create(array_merge($request->all(), ["manager_id" => $request->user()->id]));

        return redirect()->route('themes.show', ["theme" => $theme->id])
            ->with('success', 'Article created successfully and is now under review.');
    }

    public function show($id)
    {
        $theme = Theme::findOrFail($id);
        return view("themes.show", compact("theme"));
    }

    public function update(Request $request, $id)
    {
        $theme = Theme::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:themes,name,' . $id,
            'description' => 'nullable|string',
            'manager_id' => 'required|exists:users,id',
        ]);

        $theme->update($request->all());
        // return view();

    }

    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);
        $theme->delete();
        // return view();
    }
    public function index()
    {
        $themes = Theme::all();
        return view('themes.index', compact('themes'));
    }
}