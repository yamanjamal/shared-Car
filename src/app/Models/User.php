<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Concerns\HasUUID;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUUID;

    protected $fillable = ['name', 'last_name', 'username', 'email', 'password', 'phone', 'rate'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name', 'image_url'];

//    public function calculateThePrize(): float
//    {
//        $total = GameLobbyUser::where('game_lobby_id', $this->id)->sum('entrance_fee');
//
//        return (float) ($total - ($total * $this->commission) / 100.0);
//    }

    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class, 'id');
    }

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->name . ' ' . $this->last_name;
            },
        );
    }

    public function imageUrl(): Attribute
    {
        return new Attribute(
            get: function () {
                return "https://avatars.dicebear.com/api/adventurer/{$this->username}.svg";
            },
        );
    }
}
