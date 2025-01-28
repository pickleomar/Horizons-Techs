<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChatRequest;
use App\Services\ChatService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    /**
     * Store a newly created chat message.
     */

    protected $chatService;

    public  function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }




    public function store(StoreChatRequest $request)
    {
        // Find the article
        $article = Article::findOrFail($request->article_id);


        // Create the chat message
        $chat = Chat::create([
            'user_id' => Auth::user()->id,
            'article_id' => $article->id,
            'message' => $request->message,
            'message_date' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message posted successfully!');
    }

    /**
     * Delete a chat message.
     */
    public function destroy(Chat $chat)
    {
        // Delete the chat message
        $chat->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message deleted successfully!');
    }
}
