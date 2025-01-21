<?php

namespace App\Services;

use App\Repositories\HistoryRepositoryInterface;
use App\Services\HistoryServiceInterface;

class HistoryService implements HistoryServiceInterface
{
    protected $historyRepository;
    public function __construct(HistoryRepositoryInterface $historyRepository)
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
}