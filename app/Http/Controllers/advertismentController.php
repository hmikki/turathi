<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class advertismentController extends Controller
{
    use ResponseTrait;
    public function index()
    {
        return date('Y-m-d H:i:s');
        if (Auth::check()){
            $advertisements = Advertisement::where('user_id', Auth::id())->take(8)->get();
            return view('website.my_advs')->with(['advertisements'=>$advertisements]);
        }
    }
    public function show(Request $request)
    {
        if (Auth::check()) {
            $adv_id = session('advertisement_id');
            $advertisement = Advertisement::where('id', $adv_id)->first();
            return view('website.home')->with(['response' => $advertisement]);
        }
    }
    public function add_adv(){
        return view('website.add_adv');
    }
    public function edit_adv(){
        return view('website.edit_adv');
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'title_ar' => 'required',
            'description' => 'sometimes',
            'description_ar' => 'sometimes',
            'image' => 'required',
            'price' => 'required',
            'location' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'category_id' => 'required',
            'page_id' => 'required',
            'rate' => 'required',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        if ($check){
            return redirect()->route('my_adv');
        }else{
            return redirect()->route('add_adv')->with('errors','خطأ في البيانات المدخلة');
        }

    }
    public function create(array $data, Request $request)
    {
        return Advertisement::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'title_ar' => $data['title_ar'],
            'description' => $data['description'],
            'description_ar' => $data['description_ar'],
            'price' => $data['price'],
            'location' => $data['location'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'category_id' => $data['category_id'],
            'page_id' => $data['page_id'],
            'rate' => $data['rate'],
        ]);
    }
    public function update(Request $request)
    {
        $adv_id = Session::get('advertisement_id');
        $update_request = Request::create('api/advertisements/update', 'POST', [
            'user_id' => $request->filled('user_id'),
            'advertisement_id' => $request->filled('advertisement_id'),
            'title'=>$request->filled('title'),
            'title_ar'=>$request->filled('title_ar'),
            'price'=>$request->filled('price'),
            'location'=>$request->filled('location'),
            'email'=>$request->filled('email'),
            'mobile'=>$request->filled('mobile'),
            'page_id'=>$request->filled('page_id'),
            'category_id'=>$request->filled('category_id'),
            'image'=>$request->filled('image'),
            'rate'=> 5,
        ]);
        $update_response = json_decode(Route::dispatch($update_request)->getContent());
        if($update_response->status->status == "success"){
            return Redirect::to(URL::route('my_advs'));
        }else{
            return Redirect::to(URL::route('edit_adv'))->with(['errors' =>$update_response->status->message]);
        }
    }
    public function destroy(Request $request)
    {
        $destroy_request = Request::create('api/advertisements/destroy', 'POST', [
            'advertisement_id' => $request->filled('advertisement_id'),
        ]);
        $destroy_response = json_decode(Route::dispatch($destroy_request)->getContent());
            return Redirect::to(URL::route('my_advs'));
    }
}
