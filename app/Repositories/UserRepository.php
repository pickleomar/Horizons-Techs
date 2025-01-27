<?php

/**
 * Class userRepository
 *
 * This class implements the userRepositoryInterface and provides methods to interact with the user model.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @var User The user model instance.
     */
    protected User $model;

    /**
     * userRepository constructor.
     *
     * @param User $model The user model instance.
     */
    public function __construct(user $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All users.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a user by its ID.
     *
     * @param int $id The ID of the user.
     * @return User|null The user if found, null otherwise.
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new user.
     *
     * @param array $data The data to create the user.
     * @return User The created user.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing user.
     *
     * @param int $id The ID of the user to update.
     * @param array $data The data to update the user.
     * @return User|null The updated user if found, null otherwise.
     */
    public function update($id, array $data)
    {
        $user = $this->find($id)->first();
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    /**
     * Delete a user by its ID.
     *
     * @param int $id The ID of the user to delete.
     * @return bool True if the user was deleted, false otherwise.
     */
    public function delete($id)
    {
        $user = $this->find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
