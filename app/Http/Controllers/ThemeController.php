<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;


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
        $theme->manager_id = Auth::user()->id;
        $theme->description = $request->description;
        $theme->image = "images/$imageName";

        $theme->save();

        return redirect()->route('themes.show', ["theme" => $theme->id])
            ->with('success', 'Article created successfully and is now under review.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $theme = Theme::findOrFail($id);

        // if ($user->role == "user") {
        //     $articles = Article::where('theme_id', $id)
        //         ->where('public', 1)
        //         ->get();
        // } else if ($user->role == "subscriber" || ($user->role == "admin" && $theme->manager_id == $user->id) || $user->role == "editor") {
        //     // TODO Configure this To check if the user is subscribed to the theme
        //     $articles = $theme->articles;
        // }

        $articles = $theme->articles;

        return view("themes.show", compact("theme", "articles"));
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