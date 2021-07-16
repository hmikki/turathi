<?php

namespace App\Http\Requests\Api\Home;

use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Home\SliderResource;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;

class storeSliderRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'title_ar' => 'required',
            'image' => 'required',
        ];
    }

    public function run(): JsonResponse
    {
        $Object =new  Slider();
        $Object->setTitle($this->title);
        $Object->setTitleAr($this->title_ar);
        $Object->setImage(Functions::StoreImage('image','Sliders/media'));
        $Object->save();
        $Object->refresh();
        return $this->successJsonResponse([__('messages.saved_successfully')],new SliderResource($Object),'Sliders');
    }
}
