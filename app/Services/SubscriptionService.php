<?php

namespace App\Services;

use App\Repositories\SubscriptionRepositoryInterface;
use App\Services\SubscriptionServiceInterface;

class SubscriptionService implements SubscriptionServiceInterface
{
    protected $subscriptionRepository;
    public function __construct(SubscriptionRepositoryInterface $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function getAllSubscriptions()
    {
        return $this->subscriptionRepository->all();
    }

    public function getSubscriptionById($user_id, $theme_id)
    {
        return $this->subscriptionRepository->find($user_id, $theme_id);
    }

    public function createSubscription(array $data)
    {
        return $this->subscriptionRepository->create($data);
    }

    public function updateSubscription($user_id, $theme_id, array $data)
    {
        return $this->subscriptionRepository->update($user_id, $theme_id, $data);
    }

    public function deleteSubscription($user_id, $theme_id)
    {
        return $this->subscriptionRepository->delete($user_id, $theme_id);
    }

    public function getSubscriptionsByUser($user_id)
    {
        $subscriptions = $this->subscriptionRepository->all()->where("user_id", $user_id);

        return $subscriptions;
    }
}