<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->whenNotNull($this->name),
            'make' => $this->whenNotNull($this->make),
            'model' => $this->whenNotNull($this->model),
            'year' => $this->whenNotNull($this->year),
            'plate' => $this->whenNotNull($this->plate),
            'capacity' => $this->whenNotNull($this->capacity),
            'color' => $this->whenNotNull($this->color),
            'driver' => new UserResource($this->whenLoaded('driver')),
            'trips' => TripResource::collection($this->whenLoaded('trips')),
        ];
    }
}
