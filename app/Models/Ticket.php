<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['payment_id', 'amount', 'status'];

    protected function casts(): array
    {
        return [
            'amount' => 'integer',
        ];
    }
}
