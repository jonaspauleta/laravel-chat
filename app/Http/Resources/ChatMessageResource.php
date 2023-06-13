<?php

namespace App\Http\Resources;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ChatMessageResource
 *
 * @mixin ChatMessage
 * */
class ChatMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message,
            'user_id' => $this->user_id,
        ];
    }
}
