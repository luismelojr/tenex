<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarnerRequest;
use App\Http\Resources\CarnerResource;
use App\Http\Resources\InstallmentsResource;
use App\Models\Carner;
use App\Services\CarnerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarnerController extends Controller
{
    public function __construct(
        private readonly CarnerService $service
    ){}

    /**
     * @param CarnerRequest $request
     * @return CarnerResource
     */
    public function store(CarnerRequest $request): CarnerResource
    {
        $data = $request->validated();
        $carner = $this->service->createCarner($data);

        return new CarnerResource($carner);
    }

    /**
     * @param Carner $carner
     * @return AnonymousResourceCollection
     */
    public function getInstallments(Carner $carner): AnonymousResourceCollection
    {
        return InstallmentsResource::collection($carner->installments);
    }
}
