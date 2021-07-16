<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\AdvertisementResource;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed product_id
 */
class ShowRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'advertisement_id'=>'required|exists:advertisements,id'
        ];
    }
    public function run(): JsonResponse
    {
        return $this->successJsonResponse([],new AdvertisementResource((new  Advertisement())->find($this->advertisement_id)),'Advertisement');
    }
}
