<?php

namespace App\Services;


interface HistoryServiceInterface
{
    public function getAllHistorys();
    public function getHistorysByUser($user_id);
    public function getHistoryById($user_id, $article_id);
    public function createHistory(array $data);
    public function updateHistory($user_id, $article_id, array $data);
    public function deleteHistory($user_id, $article_id);
    public function trackHistory($user_id, $article_id);
}
