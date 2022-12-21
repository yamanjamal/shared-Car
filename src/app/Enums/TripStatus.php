<?php

namespace App\Enums;
use Illuminate\Support\Collection;

enum TripStatus: string
{
    case Active = 'active';
    case Ideal = 'ideal';
    case Finished = 'finished';
    case None = 'none';

    public static function toSelect(): Collection
    {
        return collect(TripStatus::cases())->map(function ($item) {
            return ['label' => $item->name, 'value' => $item->value];
        });
    }

    public function toLabel(): string
    {
        return __('gamehub.' . $this->name);
    }

    public function is(TripStatus $tripStatus): bool
    {
        return $this === $tripStatus;
    }

    public function not(TripStatus $tripStatus): bool
    {
        return $this !== $tripStatus;
    }
}
