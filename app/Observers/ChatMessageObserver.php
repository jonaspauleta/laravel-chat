<?php

namespace App\Observers;

use App\Events\ChatMessageEvent;
use App\Models\ChatMessage;

class ChatMessageObserver {
    /**
     * Handle the ChatMessage "created" event.
     */
    public function created(ChatMessage $chatMessage): void {
        ChatMessageEvent::dispatch(
            $chatMessage->message,
            $chatMessage->user_id,
        );
    }

    /**
     * Handle the ChatMessage "updated" event.
     */
    public function updated(ChatMessage $chatMessage): void
    {
        //
    }

    /**
     * Handle the ChatMessage "deleted" event.
     */
    public function deleted(ChatMessage $chatMessage): void
    {
        //
    }

    /**
     * Handle the ChatMessage "restored" event.
     */
    public function restored(ChatMessage $chatMessage): void
    {
        //
    }

    /**
     * Handle the ChatMessage "force deleted" event.
     */
    public function forceDeleted(ChatMessage $chatMessage): void
    {
        //
    }
}
