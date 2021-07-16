<?php

namespace App\Http\Resources\Api\Home;

use App\Models\Category;
use App\Models\FreelancerCategory;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        $Object['id'] = $this->getId();
        $Object['name'] = $this->getName();
        $Object['mobile'] = $this->getMobile();
        $Object['email'] = $this->getEmail();
        $Object['image'] = $this->getImage();
        $Object['location'] = $this->getLocation();
        $Object['mobile_verified_at'] = $this->getMobileVerifiedAt()?Carbon::parse($this->getMobileVerifiedAt())->format('Y-m-d'):null;
        $Object['email_verified_at'] = $this->getEmailVerifiedAt()?Carbon::parse($this->getEmailVerifiedAt())->format('Y-m-d'):null;
        // $Object['type'] = $this->getType();
        $Object['access_token'] = $this->token;
        $Object['token_type'] = 'Bearer';
    }

}
