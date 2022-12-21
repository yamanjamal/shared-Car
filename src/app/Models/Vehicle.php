<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasUUID;

class Vehicle extends Model
{
    use HasFactory, HasUUID;
}
