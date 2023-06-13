<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Http\Requests\StoreChatMessageRequest;
use App\Http\Resources\ChatMessageResource;
use App\Models\ChatMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChatController extends Controller {
    /**
     * This method is used to display the messages on the chat.
     * @return Response
     */
    public function index(): Response {
        return Inertia::render('Chat/Index', [
            'messages' =>
                ChatMessageResource::collection(
                    ChatMessage::latest()
                        ->take(50)
                        ->get()
                        ->reverse()
                ),
            ]
        );
    }

    /**
     * This method is used to send a message to the chat.
     * @param StoreChatMessageRequest $request
     * @return RedirectResponse
     */
    public function store(StoreChatMessageRequest $request): RedirectResponse {
        ChatMessage::create([
            'message' => $request->validated()['message'],
            'user_id' => $request->user()->id,
        ]);

        return redirect()->back();
    }
}
