<?php

namespace App\Services;

use App\Models\Carner;
use App\Models\Installment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CarnerService
{
    /**
     * Create a new carner
     *
     * @param $data
     * @return Carner
     */
    public function createCarner($data): Carner
    {
        $carner = Carner::create([
            'total_amount' => $data['total_amount'],
            'installment_count' => $data['installment_count'],
            'first_due_date' => $data['first_due_date'],
            'frequency' => $data['frequency'],
            'down_payment' => $data['down_payment'] ?? 0,
        ]);

        $totalInstallments = $data['installment_count'];
        $downPayment = $data['down_payment'] ?? 0;
        $installmentAmount = ($data['total_amount'] - $downPayment) / $totalInstallments;
        $dueDate = Carbon::parse($data['first_due_date']);

        if ($downPayment > 0) {
            Installment::create([
                'carner_id' => $carner->id,
                'due_date' => $dueDate->toDateString(),
                'amount' => $downPayment,
                'number' => 1,
                'down_payment' => true
            ]);
            $totalInstallments--;
        }

        for ($i = 1; $i <= $totalInstallments; $i++) {
            if ($data['frequency'] === 'monthly') {
                $dueDate->addMonth();
            } else {
                $dueDate->addWeek();
            }

            Installment::create([
                'carner_id' => $carner->id,
                'due_date' => $dueDate->toDateString(),
                'amount' => $installmentAmount,
                'number' => $i + ($downPayment > 0 ? 1 : 0),
                'down_payment' => false
            ]);
        }

        return $carner;
    }

    /**
     * Get installments for a carner
     *
     * @param $id
     * @return Collection
     */
    public function getInstallments($id): Collection
    {
        return Installment::where('carner_id', $id)->get();
    }
}
