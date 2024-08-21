<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Installment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'carner_id',
        'due_date',
        'amount',
        'number',
        'down_payment',
    ];

    protected $casts = [
        'due_date' => 'date',
        'amount' => 'float',
        'down_payment' => 'boolean',
    ];

    /**
     * Get the carner that owns the installment.
     * @return BelongsTo
     */
    public function carner(): BelongsTo
    {
        return $this->belongsTo(Carner::class);
    }
}
