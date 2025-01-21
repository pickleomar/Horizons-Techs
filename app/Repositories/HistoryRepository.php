<?php

/**
 * Class HistoryRepository
 *
 * This class implements the HistoryRepositoryInterface and provides methods to interact with the History model.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Models\History;
use App\Repositories\HistoryRepositoryInterface;

class HistoryRepository implements HistoryRepositoryInterface
{
    /**
     * @var History The History model instance.
     */
    protected History $model;

    /**
     * HistoryRepository constructor.
     *
     * @param History $model The History model instance.
     */
    public function __construct(History $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all Historys.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All Historys.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a History by its ID.
     *
     * @param int $id The ID of the History.
     * @return History|null The History if found, null otherwise.
     */
    public function find($user_id, $article_id)
    {
        return $this->model->where('user_id', $user_id)
            ->where('article_id', $article_id);
        // TODO SOME OFFSET ERROR COMES FROM HERE
    }

    /**
     * Create a new History.
     *
     * @param array $data The data to create the History.
     * @return History The created History.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing History.
     *
     * @param int $id The ID of the History to update.
     * @param array $data The data to update the History.
     * @return History|null The updated History if found, null otherwise.
     */
    public function update($user_id, $article_id, array $data)
    {
        $History = $this->find($user_id, $article_id);
        if ($History) {
            $History->update($data);
            return $History;
        }
        return null;
    }

    /**
     * Delete a History by its ID.
     *
     * @param int $id The ID of the History to delete.
     * @return bool True if the History was deleted, false otherwise.
     */
    public function delete($user_id, $article_id)
    {
        $History = $this->find($user_id, $article_id);
        if ($History) {
            $History->delete();
            return true;
        }
        return false;
    }
}