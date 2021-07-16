<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Models\User;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed name
 * @property mixed mobile
 * @property mixed email
 * @property mixed image
 * @property mixed location
 * @property mixed app_locale
 * @property mixed device_token
 * @property mixed device_type
 */
class UserRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|max:255,',
            //'mobile' => 'numeric|min:6|unique:users,mobile,'. auth()->user()->id,
            //'email' => 'email|unique:users,email,'. auth()->user()->id,
            'mobile' => 'numeric|min:6|unique:users,mobile,',
            'email' => 'email|unique:users,email,',
            'device_token' => 'string|required_with:device_type',
            'device_type' => 'string|required_with:device_token',
            'app_locale' => 'string|in:ar,en',
        ];
    }
    public function run(): JsonResponse
    {
        $logged = $this->user();
        if($this->hasFile('image')){
            $logged->setImage(Functions::StoreImage('image','profile/media'));
        }
        if ($this->filled('name')){
            $logged->setName($this->name);
        }
        if ($this->filled('mobile')){
            $logged->setMobile($this->mobile);
        }
        if ($this->filled('location')){
            $logged->setLocation($this->location);
        }
        if ($this->filled('email')){
            $logged->setEmail($this->email);
        }
        if ($this->filled('app_locale')){
            $logged->setAppLocale($this->app_locale);
        }
        if ($this->filled('device_token')&&$this->filled('device_type')){
            $logged->setDeviceToken($this->device_token);
            $logged->setDeviceType($this->device_type);
        }
        $logged->save();
        DB::table('oauth_access_tokens')->where('user_id', $logged->id)->delete();
        $tokenResult = $logged->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        return $this->successJsonResponse( [__('messages.updated_successful')],new UserResource($logged,$tokenResult->accessToken),'User');
    }
}
