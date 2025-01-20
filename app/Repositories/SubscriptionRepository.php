<?php

/**
 * Class subscriptionRepository
 *
 * This class implements the subscriptionRepositoryInterface and provides methods to interact with the subscription model.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Models\Subscription;
use App\Repositories\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    /**
     * @var Subscription The subscription model instance.
     */
    protected Subscription $model;

    /**
     * subscriptionRepository constructor.
     *
     * @param Subscription $model The subscription model instance.
     */
    public function __construct(subscription $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all subscriptions.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All subscriptions.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a subscription by its ID.
     *
     * @param int $id The ID of the subscription.
     * @return Subscription|null The subscription if found, null otherwise.
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new subscription.
     *
     * @param array $data The data to create the subscription.
     * @return Subscription The created subscription.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing subscription.
     *
     * @param int $id The ID of the subscription to update.
     * @param array $data The data to update the subscription.
     * @return Subscription|null The updated subscription if found, null otherwise.
     */
    public function update($id, array $data)
    {
        $subscription = $this->find($id);
        if ($subscription) {
            $subscription->update($data);
            return $subscription;
        }
        return null;
    }

    /**
     * Delete a subscription by its ID.
     *
     * @param int $id The ID of the subscription to delete.
     * @return bool True if the subscription was deleted, false otherwise.
     */
    public function delete($id)
    {
        $subscription = $this->find($id);
        if ($subscription) {
            $subscription->delete();
            return true;
        }
        return false;
    }
}
