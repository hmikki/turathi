<?php

namespace App\Http\Requests\Api\Home;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\SliderResource;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;

class SliderRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        return $this->successJsonResponse([],SliderResource::collection(Slider::where('is_active',true)->get()),'Slider');
    }
}
