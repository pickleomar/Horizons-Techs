<?php

namespace App\Services;

use App\Repositories\HistoryRepository;

class HistoryService
{
    protected $historyRepository;
    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    public function getAllHistorys()
    {
        return $this->historyRepository->all();
    }

    public function getHistoryById($user_id, $article_id)
    {
        return $this->historyRepository->find($user_id, $article_id);
    }

    public function createHistory(array $data)
    {
        return $this->historyRepository->create($data);
    }

    public function updateHistory($user_id, $article_id, array $data)
    {
        return $this->historyRepository->update($user_id, $article_id, $data);
    }

    public function deleteHistory($user_id, $article_id)
    {
        return $this->historyRepository->delete($user_id, $article_id);
    }

    public function getHistorysByUser($user_id)
    {
        return $this->historyRepository->all()->where("user_id", $user_id);
    }


    public function trackHistory($user_id, $article_id)
    {
        $history = $this->getHistoryById($user_id, $article_id)->first();
        if (!$history) {
            return $this->createHistory(["user_id" => $user_id, "article_id" => $article_id, "consultation_date" => now()]);
        }
        return $this->updateHistory($user_id, $article_id, ["consultation_date" => now()]);
    }
}
