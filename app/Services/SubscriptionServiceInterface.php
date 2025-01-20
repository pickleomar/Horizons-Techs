<?php

namespace App\Services;


interface SubscriptionServiceInterface
{
    public function getAllSubscriptions();
    public function getSubscriptionById($id);
    public function createSubscription(array $data);
    public function updateSubscription($id, array $data);
    public function deleteSubscription($id);
}