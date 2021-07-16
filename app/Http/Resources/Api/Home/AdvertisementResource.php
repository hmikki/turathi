<?php

namespace App\Http\Resources\Api\Home;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['user_id'] = $this->getUserId();
        $Objects['title'] = (app()->getLocale() == 'ar')?$this->getTitleAr():$this->getTitle();
        $Objects['description'] = (app()->getLocale() == 'ar')?$this->getDescriptionAr():$this->getDescription();
        $Objects['image'] = asset($this->getImage());
        $Objects['category_id'] = new CategoryResource($this->category);
        $Objects['price'] = $this->getPrice();
        $Objects['rate'] = $this->getRate();
        $Objects['location'] = $this->getLocation();
        $Objects['page_id'] = $this->getPageId();
        $Objects['Advertisement_date'] = date_format(Carbon::parse($this->created_at), 'd-m-y');
        return $Objects;
    }
}
