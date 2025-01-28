<?php

namespace App\Services;

use App\Repositories\ThemeRepository;

class ThemeService
{
    protected $themeRepository;
    public function __construct(ThemeRepository $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }

    public function getAllThemes()
    {
        return $this->themeRepository->all();
    }
    public function getThemeById($id)
    {
        return $this->themeRepository->find($id);
    }
    public function createTheme(array $data)
    {
        return $this->themeRepository->create($data);
    }
    public function updateTheme($id, array $data)
    {
        return $this->themeRepository->update($id, $data);
    }
    public function deleteTheme($id)
    {
        return $this->themeRepository->delete($id);
    }


    public function isUserThemeManager($user_id, $theme_id)
    {
        $theme = $this->themeRepository->find($theme_id);
        return $theme->manager_id === $user_id;
    }

    public function getThemeByManger($user_id)
    {
        $themes = $this->themeRepository->all()->where("manager_id", $user_id);
        return $themes;
    }


    public function getRandomThemes($number = 4)
    {
        return $this->themeRepository->random($number);
    }
}
