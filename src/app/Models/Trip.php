<?php

namespace App\Models;

use App\Enums\TripStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasUUID;

class Trip extends Model
{
    use HasFactory, HasUUID;

    protected $guarded = [];

    protected $casts = [
        'status' => TripStatus::class,
    ];
}
