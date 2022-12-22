<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip_user extends Model
{
    use HasFactory;

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
