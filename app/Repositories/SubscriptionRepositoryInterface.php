<?php

/**
 * Interface SubscriptionRepositoryInterface
 *
 * This interface defines the contract for a repository that manages Subscriptions.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

interface SubscriptionRepositoryInterface
{
    public function all();

    public function find($user_id, $theme_id);

    public function create(array $data);

    public function update($user_id, $theme_id, array $data);

    public function delete($user_id, $theme_id);
}