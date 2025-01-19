<?php

/**
 * Interface ThemeRepositoryInterface
 *
 * This interface defines the contract for a repository that manages themes.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

interface ThemeRepositoryInterface
{
    /**
     * Retrieve all themes.
     *
     * @return mixed
     */
    public function all();

    /**
     * Find a theme by its ID.
     *
     * @param mixed $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create a new theme.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update an existing theme.
     *
     * @param mixed $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete a theme by its ID.
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id);
}