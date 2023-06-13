<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Http\Resources\ChatMessageResource;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChatController extends Controller {
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

    public function store(Request $request) {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        ChatMessage::create([
            'message' => $request->input('message'),
            'user_id' => $request->user()->id,
        ]);

        return redirect()->back();
    }
}
