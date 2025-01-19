<?php

/**
 * Interface ArticleRepositoryInterface
 *
 * This interface defines the contract for a repository that manages Articles.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

interface ArticleRepositoryInterface
{
    /**
     * Retrieve all Articles.
     *
     * @return mixed
     */
    public function all();

    /**
     * Find a Article by its ID.
     *
     * @param mixed $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create a new Article.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update an existing Article.
     *
     * @param mixed $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete a Article by its ID.
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id);
}
