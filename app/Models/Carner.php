<?php

namespace App\Models;

use App\Enums\FrequencyEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carner extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'total_amount',
        'installment_count',
        'first_due_date',
        'frequency',
        'down_payment',
    ];

    protected $casts = [
        'first_due_date' => 'date',
        'down_payment' => 'float',
        'frequency' => FrequencyEnum::class,
    ];

    /**
     * Get the installments for the carner.
     * @return HasMany
     */
    public function installments(): HasMany
    {
        return $this->hasMany(Installment::class);
    }
}
