<?php

namespace App\Services;

use App\Repositories\ChatRepository;

class ChatService
{
    protected $chatRepository;
    public function __construct(ChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    public function getAllChats()
    {
        return $this->chatRepository->all();
    }

    public function getChatById($chat_id)
    {
        return $this->chatRepository->find($chat_id,);
    }

    public function createChat(array $data)
    {
        return $this->chatRepository->create($data);
    }

    public function updateChat($chat_id, array $data)
    {
        return $this->chatRepository->update($chat_id, $data);
    }

    public function deleteChat($chat_id)
    {
        return $this->chatRepository->delete($chat_id);
    }
}
