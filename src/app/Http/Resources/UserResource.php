<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->whenNotNull($this->id),
            'name' => $this->whenNotNull($this->name),
            'last_name' => $this->whenNotNull($this->last_name),
            'username' => $this->whenNotNull($this->username),
            'email' => $this->whenNotNull($this->email),
            'phone' => $this->whenNotNull($this->phone),
            'image' => $this->whenNotNull($this->image),
            'image_url' => $this->whenNotNull($this->image_url),
            'rate' => $this->whenNotNull($this->rate),
            'full_name' => $this->whenNotNull($this->full_name),
            'trips' => TripResource::collection($this->whenLoaded('trips')),
            'vehicle' => new VehicleResource($this->whenLoaded('vehicle')),
        ];
    }
}
