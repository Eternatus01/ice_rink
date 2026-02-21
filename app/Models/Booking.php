<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = ['name', 'phone', 'hours', 'skate_id', 'amount', 'payment_id', 'status'];

    protected function casts(): array
    {
        return [
            'hours' => 'integer',
            'amount' => 'integer',
        ];
    }

    public function skate(): BelongsTo
    {
        return $this->belongsTo(Skate::class);
    }
}
