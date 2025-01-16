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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $theme = new Theme();

        $theme->name = $request->name;
        $theme->manager_id = $request->user()->id;
        $theme->description = $request->description;
        $theme->image = "images/$imageName";

        $theme->save();

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
}