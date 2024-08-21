<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstallmentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'due_date' => Carbon::parse($this->due_date)->format('Y-m-d'),
            'amount' => $this->amount,
            'number' => $this->number,
            'down_payment' => (bool)$this->down_payment,
        ];
    }
}
