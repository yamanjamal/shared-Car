<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->whenNotNull($this->id),
            'from' => $this->whenNotNull($this->from),
            'to' => $this->whenNotNull($this->to),
            'status' => $this->status ? $this->status->toLabel() : '',
            'driver' => new UserResource($this->whenLoaded('driver')),
            'vehicle' => new VehicleResource($this->whenLoaded('vehicle')),
            'users' => UserResource::collection($this->whenLoaded('users')),
            'steps' => StepResource::collection($this->whenLoaded('steps')),
        ];
    }
}
