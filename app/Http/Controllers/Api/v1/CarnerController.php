<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarnerRequest;
use App\Http\Resources\CarnerResource;
use App\Models\Carner;
use App\Services\CarnerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarnerController extends Controller
{
    public function __construct(
        private readonly CarnerService $service
    ){}

    public function store(CarnerRequest $request): JsonResponse
    {
        $data = $request->validated();
        $carner = $this->service->createCarner($data);

        return response()->json([
            'id' => $carner->id,
            'total_amount' => $carner->total_amount,
            'down_payment' => $carner->down_payment,
            'installments' => $carner->installments()->get()
        ]);
    }

    public function getInstallments(Carner $carner): JsonResponse
    {
        return response()->json([
            'installments' => $carner->installments()->get()
        ]);
    }
}
