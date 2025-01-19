<?php

/**
 * Class ThemeRepository
 *
 * This class implements the ThemeRepositoryInterface and provides methods to interact with the Theme model.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Models\Theme;
use App\Repositories\ThemeRepositoryInterface;

class ThemeRepository implements ThemeRepositoryInterface
{
    /**
     * @var Theme The Theme model instance.
     */
    protected Theme $model;

    /**
     * ThemeRepository constructor.
     *
     * @param Theme $model The Theme model instance.
     */
    public function __construct(Theme $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all themes.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All themes.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a theme by its ID.
     *
     * @param int $id The ID of the theme.
     * @return Theme|null The theme if found, null otherwise.
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new theme.
     *
     * @param array $data The data to create the theme.
     * @return Theme The created theme.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing theme.
     *
     * @param int $id The ID of the theme to update.
     * @param array $data The data to update the theme.
     * @return Theme|null The updated theme if found, null otherwise.
     */
    public function update($id, array $data)
    {
        $theme = $this->find($id);
        if ($theme) {
            $theme->update($data);
            return $theme;
        }
        return null;
    }

    /**
     * Delete a theme by its ID.
     *
     * @param int $id The ID of the theme to delete.
     * @return bool True if the theme was deleted, false otherwise.
     */
    public function delete($id)
    {
        $theme = $this->find($id);
        if ($theme) {
            $theme->delete();
            return true;
        }
        return false;
    }
}