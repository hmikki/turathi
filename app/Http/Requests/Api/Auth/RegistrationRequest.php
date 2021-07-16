<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed name
 * @property mixed password
 * @property mixed mobile
 * @property mixed email
 * @property mixed type
 * @property mixed lat
 * @property mixed lng
 * @property mixed app_locale
 * @property mixed device_token
 * @property mixed device_type
 */
class RegistrationRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'mobile' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            //'type'=>'required|in:'.Constant::USER_TYPE_RULES,
            'device_token' => 'string|required_with:device_type',
            'device_type' => 'string|required_with:device_token',
            'app_locale' => 'sometimes|in:en,ar',
        ];
    }
    public function run(): JsonResponse
    {
        $user = new User();
        $user->setName($this->name);
        $user->setPassword($this->password);
        $user->setMobile($this->mobile);
        $user->setEmail($this->email);
        //$user->setLat(@$this->lat);
        //$user->setLng(@$this->lng);
        //$user->setType($this->type);
        $user->setAppLocale($this->filled('app_locale')?$this->app_locale:'ar');
        if ($this->filled('device_token') && $this->filled('device_type')) {
            $user->setDeviceToken($this->device_token);
            $user->setDeviceType($this->device_type);
        }
        $user->save();
         $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        $user->refresh();
        /*try {
            Functions::SendVerification($user);
        }catch (\Exception $e){

        }*/
        //return Redirect::route('login');
        return $this->successJsonResponse( [__('auth.login')], new UserResource($user,$tokenResult->accessToken),'User');
    }

}
