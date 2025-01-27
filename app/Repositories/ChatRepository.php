<?php

/**
 * Class chatRepository
 *
 * This class implements the chatRepositoryInterface and provides methods to interact with the chat model.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Models\Chat;

class ChatRepository
{
    /**
     * @var Chat The chat model instance.
     */
    protected Chat $model;

    /**
     * chatRepository constructor.
     *
     * @param Chat $model The chat model instance.
     */
    public function __construct(Chat $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all chats.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All chats.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a chat by its ID.
     *
     * @param int $id The ID of the chat.
     * @return Chat|null The chat if found, null otherwise.
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new chat.
     *
     * @param array $data The data to create the chat.
     * @return Chat The created chat.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing chat.
     *
     * @param int $id The ID of the chat to update.
     * @param array $data The data to update the chat.
     * @return Chat|null The updated chat if found, null otherwise.
     */
    public function update($id, array $data)
    {
        $chat = $this->find($id);
        if ($chat) {
            $chat->update($data);
            return $chat;
        }
        return null;
    }

    /**
     * Delete a chat by its ID.
     *
     * @param int $id The ID of the chat to delete.
     * @return bool True if the chat was deleted, false otherwise.
     */
    public function delete($id)
    {
        $chat = $this->find($id);
        if ($chat) {
            $chat->delete();
            return true;
        }
        return false;
    }
}
