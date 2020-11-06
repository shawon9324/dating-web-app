<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
        $data = $request->all();
        $geoipInfo = geoip()->getLocation($data['ip']);
        $location = $geoipInfo->city.','.$geoipInfo->state_name.','.$geoipInfo->country;
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->date_of_birth = $data['dob'];
        $user->gender = $data['gender'];
        $user->location = $location;
        $user->latitude = $geoipInfo->lat;
        $user->longitude =$geoipInfo->lon;   
        $user->save(); 
        // echo "<pre>"; print_r($data);die;
        return redirect('/login');
        }
        return view ('user.register');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>" ; print_r($data) ; die;
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                // echo "success";die;
                Session::put('datingSignInSession',$data['email']);
                return redirect('/dating');
            }else{
                return redirect()->back();
            }
        }
        return view('user.login');
    }
    public function dating(){
        return view('dating.dating');
    }
    public function logout(){
        Auth::logout();
        Session::forget('datingSignInSession');
        return redirect('/');
    }
}
