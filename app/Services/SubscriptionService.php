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
    public function getSubscriptionById($id)
    {
        return $this->subscriptionRepository->find($id);
    }
    public function createSubscription(array $data)
    {
        return $this->subscriptionRepository->create($data);
    }
    public function updateSubscription($id, array $data)
    {
        return $this->subscriptionRepository->update($id, $data);
    }
    public function deleteSubscription($id)
    {
        return $this->subscriptionRepository->delete($id);
    }
}
