<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StepResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->whenNotNull($this->id),
            'long' => $this->whenNotNull($this->long),
            'lat' => $this->whenNotNull($this->lat),
            'trip' => new TripResource($this->whenLoaded('trip')),
        ];
    }
}
