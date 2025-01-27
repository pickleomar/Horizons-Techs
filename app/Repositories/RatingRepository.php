<?php

/**
 * Class ratingRepository
 *
 * This class implements the ratingRepositoryInterface and provides methods to interact with the rating model.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Models\Rating;

class RatingRepository
{
    /**
     * @var Rating The rating model instance.
     */
    protected Rating $model;

    /**
     * ratingRepository constructor.
     *
     * @param Rating $model The rating model instance.
     */
    public function __construct(Rating $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all ratings.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All ratings.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a rating by its ID.
     *
     * @param int $id The ID of the rating.
     * @return Rating|null The rating if found, null otherwise.
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new rating.
     *
     * @param array $data The data to create the rating.
     * @return Rating The created rating.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing rating.
     *
     * @param int $id The ID of the rating to update.
     * @param array $data The data to update the rating.
     * @return Rating|null The updated rating if found, null otherwise.
     */
    public function update($id, array $data)
    {
        $rating = $this->find($id);
        if ($rating) {
            $rating->update($data);
            return $rating;
        }
        return null;
    }

    /**
     * Delete a rating by its ID.
     *
     * @param int $id The ID of the rating to delete.
     * @return bool True if the rating was deleted, false otherwise.
     */
    public function delete($id)
    {
        $rating = $this->find($id);
        if ($rating) {
            $rating->delete();
            return true;
        }
        return false;
    }
}
