<?php

namespace App\Http\Controllers;


use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Slider;
use App\Models\User;
use App\Models\VerifyAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function index(){
        $Sliders = Slider::all();
        $Categories = Category::all();
        $Advertisements = Advertisement::all();
        return view('website.index')->with(array(
            'Sliders'=>$Sliders ,
            'Categories' => $Categories,
            'Advertisements' => $Advertisements
        ));
    }
    public function login(){
        return view('website.login');
    }
    public function Register(){
        return view('website.register');
    }
    public function categories(){
        $categories = Category::all();
        return view('website.categories')->with('categories',$categories);
    }
    public function advertisements(){
        $Advs = Advertisement::paginate(8);
        return view('website.advertisments')->with('advertisements',$Advs);
    }
    public function home(){
        return view('website.home');
    }
    public function about(){
        return view('website.about');
    }
    public function profile(){
        return view('website.profile');
    }
    public function forget_password(){
        return view('website.forget_password');
    }
    public function create_password(){
        return view('website.create_password');
    }
    public function privacy(){
        return view('privacy');
    }
    public function verify(Request $request){
        if($request->has('token')){
            $verify = VerifyAccounts::where('token',$request->token)->first();
            if($verify){
                $User = User::where('id',$verify->user_id)->first();
                if($User->email_verified_at == null){
                    $User->email_verified_at = now();
                    $User->save();
                    $message = 'Email Verified Successfully';
                }else
                    $message = 'Email Verified Before !';
            }else
                $message = 'Verification Token is invalid !';
        }else
            $message = 'Verification Token is required !';
        return view('verification',compact('message'));
    }
}
