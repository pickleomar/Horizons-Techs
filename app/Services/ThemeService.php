<?php

namespace App\Services;

use App\Repositories\ThemeRepositoryInterface;
use App\Services\ThemeServiceInterface;

class ThemeService implements ThemeServiceInterface
{
    protected $themeRepository;
    public function __construct(ThemeRepositoryInterface $themeRepository)
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
}