<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class authenticationController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    /*public function __construct()
    {
        $this->middleware('auth')->except(['logout','login','register']);
    }*/

    public function login(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'mobile' => 'required',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('mobile'=> $data['mobile'], 'password' => $data['password'])))
        {
            return redirect()->route('index');
        }else{
            return redirect()->route('login')->with('error','بيانات الدخول غير صحيحة');
        }
    }
    public function register(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);
        if ($check){
            return redirect()->route('login');
        }else{
            return redirect()->route('register')->with('err','بيانات الدخول غير صحيحة');
        }
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
    public function edit_profile(){
        return view('website.edit_profile');
    }
    public function my_profile(Request $request){
        if (Auth::check()){
            $profile= $request->user();
            $Ads = Advertisement::where('user_id', Auth::id())->take(8)->get();
            return view('website.my_profile')->with(array(
                'profile'=>$profile ,
                'Ads' => $Ads,
            ));
        }

    }
    public function forget_password(){
        return Redirect::to(URL::route('create_password'));
        //$request = Request::create('api/auth/register', 'POST');
        //$response = json_decode(Route::dispatch($request)->getContent());
    }
    public function reset_password() {
        $request = Request::create('api/auth/reset_password', 'POST');
        $response = json_decode(Route::dispatch($request)->getContent());
        if ($response->status->status == "success"){
            return Redirect::to(URL::route('index'));
        }else{
            return Redirect::to(URL::current())->with('errors', $response->status->message);
        }
    }
    public function update_profile(Request $request){
        if (Auth::check()){
            $user = $request->user();
            request()->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'mobile' => 'numeric|min:6|unique:users,id,'.$user->id,
                'image' => 'sometimes',
                'device_token' => 'string|required_with:device_type',
                'device_type' => 'string|required_with:device_token',
                'app_locale' => 'string|in:ar,en',
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->location = $request->location;

            if ( $request->file('image') != '' ) {
                // $path= $request->photo->store('users');
                $photo = time().'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('upload/users'), $photo);
                $user->image = '/upload/users/' . $photo;
            }
            if ( $request->password != '' ) {
                $request->validate([
                    'password' => ['string', 'min:8'],
                ]);
                $user->password= Hash::make($request->password);
            }
            $user->save();
            $profile= $request->user();
            $Ads = Advertisement::where('user_id', Auth::id())->take(8)->get();
            return view('website.my_profile')->with(array(
                'profile'=>$profile ,
                'Ads' => $Ads,
            ));
        }
    }
}
