<?php

namespace App\Services;


interface ThemeServiceInterface
{
    public function getAllThemes();
    public function getThemeById($id);
    public function createTheme(array $data);
    public function updateTheme($id, array $data);
    public function deleteTheme($id);
}