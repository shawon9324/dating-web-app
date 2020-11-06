<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

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
        return redirect()->back();
        }
        return view ('user.register');
    }
}
