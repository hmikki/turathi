<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = (app()->getLocale() == 'ar')?$this->getNameAr():$this->getName();
        $Objects['rate'] = $this->getRate();
        $Objects['advertisement_id'] = $this->getAdvertisementId();
        $Objects['image'] = asset($this->getImage());
        return $Objects;
    }
}
