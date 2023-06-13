<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatMessageRequest;
use App\Http\Resources\ChatMessageResource;
use App\Models\ChatMessage;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ChatController extends Controller
{
    /**
     * This method is used to display the messages on the chat.
     */
    public function index(): Response
    {
        return Inertia::render('Chat/Index', [
            'messages' => ChatMessageResource::collection(
                ChatMessage::latest()
                    ->take(20)
                    ->get()
                    ->reverse()
            ),
        ]
        );
    }

    /**
     * This method is used to send a message to the chat.
     */
    public function store(StoreChatMessageRequest $request): RedirectResponse
    {
        ChatMessage::create([
            'message' => $request->validated()['message'],
            'user_id' => $request->user()->id,
        ]);

        return redirect()->back();
    }
}
