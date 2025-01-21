<?php

/**
 * Interface HistoryRepositoryInterface
 *
 * This interface defines the contract for a repository that manages Historys.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

interface HistoryRepositoryInterface
{
    public function all();

    public function find($user_id, $article_id);

    public function create(array $data);

    public function update($user_id, $article_id, array $data);

    public function delete($user_id, $article_id);
}