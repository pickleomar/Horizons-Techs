<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Services\ThemeService;
use Illuminate\Support\Facades\Auth;


class ThemeController extends Controller
{

    protected $themeService;


    public function __construct(ThemeService $themeService)
    {
        $this->themeService = $themeService;
    }



    public function index()
    {
        $themes = $this->themeService->getAllThemes();
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

        $data = [
            "name" => $request->name,
            "manager_id" => Auth::user()->id,
            "description" => $request->description,
            "image" => "images/$imageName"
        ];

        $theme = $this->themeService->createTheme($data);

        return redirect()->route('themes.show', ["theme" => $theme->id])
            ->with('success', 'Article created successfully and is now under review.');
    }

    public function show($id)
    {
        $theme = $this->themeService->getThemeById($id);

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
        $user = Auth::user();

        if ($user->role == "editor" || $this->themeService->isUserThemeManager($user->id, $id)) {
            $this->themeService->deleteTheme($id);
            return redirect()->route('themes.index')->with("success", "Theme deleted with success");
        }
        return redirect()->route('themes.index')->with("error", "An error occured !");
    }
}
