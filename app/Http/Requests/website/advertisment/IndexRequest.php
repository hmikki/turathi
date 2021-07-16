<?php

namespace App\Http\Requests\website\advertisment;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Product\ProductResource;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

/**
 * @property mixed category_id
 * @property mixed sub_category_id
 * @property mixed type
 * @property mixed per_page
 * @property mixed user_id
 */
class IndexRequest extends ApiRequest
{
    public function run(): RedirectResponse
    {
        $logged = auth()->user();
        $Objects = new  Advertisement();
        if($this->filled('user_id')){
            $Objects = $Objects->where('user_id',$this->user_id);
        }else{
            $Objects = $Objects->where('user_id',$logged->getId());
        }
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        return Redirect::route('my_advs');
        //return $this->successJsonResponse([],ProductResource::collection($Objects->items()),'Products',$Objects);
    }
}
