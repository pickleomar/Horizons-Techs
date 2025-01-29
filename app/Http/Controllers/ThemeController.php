<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Services\SubscriptionService;
use App\Services\ThemeService;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\search;

class ThemeController extends Controller
{

    protected $themeService;
    protected $subscriptionService;


    public function __construct(ThemeService $themeService, SubscriptionService $subscriptionService)
    {
        $this->themeService = $themeService;
        $this->subscriptionService = $subscriptionService;
    }



    public function index(Request $request)
    {
        $search = $request->input('search');
        $themes = $this->themeService->getAllThemes();

        if ($search) {
            $themes = $this->themeService->searchInThemes($search);
        }

        return view("themes.index", compact("themes", "search"));
    }

    public function create(Request $request)
    {
        return view("themes.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:themes',
            'description' => 'required|string|max:65535', // Limit description to fit TEXT type
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

        $articles = $theme->articles->whereIn("status", ["Approved", "Published", "Proposed"]);


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

    public function destroy(Request $request)
    {
        $request->validate(["theme_id" => "required|exists:themes,id"]);
        $user = Auth::user();

        if ($user->role == "editor" || $this->themeService->isUserThemeManager($user->id, $request->theme_id)) {
            $this->themeService->deleteTheme($request->theme_id);
            return redirect()->route('themes.index')->with("success", "Theme deleted with success");
        }
        // TODO Configure redirection
        return redirect()->route('themes.index')->with("error", "An error occured !");
    }



    public function manage(Request $request)
    {
        $themes = [];
        if (Auth::user()->role === "editor") {
            $themes = $this->themeService->getAllThemes();
        } else if (Auth::user()->role === "admin") {

            $themes = $this->themeService->getThemeByManger(Auth::user()->id);
        }

        return view("dashboard.themes-manage", compact("themes"));
    }
}
