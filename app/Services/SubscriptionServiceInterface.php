<?php

namespace App\Services;


interface SubscriptionServiceInterface
{
    public function getAllSubscriptions();
    public function getSubscriptionsByUser($user_id);
    public function getSubscriptionById($user_id, $theme_id);
    public function createSubscription(array $data);
    public function updateSubscription($user_id, $theme_id, array $data);
    public function deleteSubscription($user_id, $theme_id);
}