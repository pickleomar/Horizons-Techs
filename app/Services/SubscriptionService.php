<?php

namespace App\Services;

use App\Repositories\SubscriptionRepository;

class SubscriptionService
{
    protected $subscriptionRepository;
    public function __construct(SubscriptionRepository $subscriptionRepository)
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
        return $this->subscriptionRepository->all()->where("user_id", $user_id);
    }

    public function isUserSubscribed($user_id, $theme_id)
    {
        $subscription = $this->subscriptionRepository->find($user_id, $theme_id)->first();
        if ($subscription) {
            return true;
        }
        return false;
    }


    public function getSubscriptionRequestByTheme($theme_id)
    {
        $subscriptions = $this->subscriptionRepository->all()->where("theme_id", $theme_id)->where("status", "pending");
        return $subscriptions;
    }
}
