<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Repositories\ThemeRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class ThemeController extends Controller
{

    protected $themeRepository;


    public function __construct(ThemeRepositoryInterface $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }



    public function index()
    {
        $themes = $this->themeRepository->all();
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

        $theme = $this->themeRepository->create($data);

        return redirect()->route('themes.show', ["theme" => $theme->id])
            ->with('success', 'Article created successfully and is now under review.');
    }

    public function show($id)
    {

        // if ($user->role == "user") {
        //     $articles = Article::where('theme_id', $id)
        //         ->where('public', 1)
        //         ->get();
        // } else if ($user->role == "subscriber" || ($user->role == "admin" && $theme->manager_id == $user->id) || $user->role == "editor") {
        //     // TODO Configure this To check if the user is subscribed to the theme
        //     $articles = $theme->articles;
        // }
        $theme = $this->themeRepository->find($id);

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
        // TODO Check Permission
        $this->themeRepository->delete($id);
        // Return the the Themes Page
        return $this->index();
    }
}