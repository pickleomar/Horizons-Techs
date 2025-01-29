<?php

/**
 * Class IssueRepository
 *
 * This class implements the IssueRepositoryInterface and provides methods to interact with the Issue model.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Models\Issue;

class IssueRepository
{
    /**
     * @var Issue The Issue model instance.
     */
    protected Issue $model;

    /**
     * IssueRepository constructor.
     *
     * @param Issue $model The Issue model instance.
     */
    public function __construct(Issue $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all Issues.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All Issues.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a Issue by its ID.
     *
     * @param int $id The ID of the Issue.
     * @return Issue|null The Issue if found, null otherwise.
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new Issue.
     *
     * @param array $data The data to create the Issue.
     * @return Issue The created Issue.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing Issue.
     *
     * @param int $id The ID of the Issue to update.
     * @param array $data The data to update the Issue.
     * @return Issue|null The updated Issue if found, null otherwise.
     */
    public function update($id, array $data)
    {
        $Issue = $this->find($id);
        if ($Issue) {
            $Issue->update($data);
            return $Issue;
        }
        return null;
    }

    /**
     * Delete a Issue by its ID.
     *
     * @param int $id The ID of the Issue to delete.
     * @return bool True if the Issue was deleted, false otherwise.
     */
    public function delete($id)
    {
        $Issue = $this->find($id);
        if ($Issue) {
            $Issue->delete();
            return true;
        }
        return false;
    }
}
