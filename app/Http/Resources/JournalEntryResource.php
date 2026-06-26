<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JournalEntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'entry_date' => $this->entry_date,
            'description' => $this->description,
            'lines' => JournalEntryLineResource::collection(
                $this->whenLoaded('journalEntryLines')
            ),
        ];
    }
}
