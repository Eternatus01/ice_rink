<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skate extends Model
{
    protected $fillable = ['model', 'size', 'quantity'];

    protected function casts(): array
    {
        return [
            'size' => 'integer',
            'quantity' => 'integer',
        ];
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getDisplayNameAttribute(): string
    {
        return "{$this->model}, размер {$this->size}";
    }
}
