<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasUUID
{
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            if ($model->getKey() === null) {
                $model->setAttribute(
                    $model->getKeyName(),
                    Str::uuid()->toString(),
                );
            }
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
