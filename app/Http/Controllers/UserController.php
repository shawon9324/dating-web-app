<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Validator;
Use Alert;

class UserController extends Controller
{
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email',
                'gender' => 'required',
            ]);
            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }
            $emailCount = User::where('email',$data['email'])->count();
            if($emailCount>0){
                Alert::warning('Warning', 'Account with this email already exists!');
                return back();
            }
            $geoipInfo = geoip()->getLocation($data['ip']);
            $location = $geoipInfo->city . ',' . $geoipInfo->state_name . ',' . $geoipInfo->country;
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->date_of_birth = $data['dob'];
            $user->gender = $data['gender'];
            $user->location = $location;
            $user->latitude = $geoipInfo->lat;
            $user->longitude = $geoipInfo->lon;
            $user->save();
            // echo "<pre>"; print_r($data);die;
            alert()->success('Registered successfully','Please login!');
            return redirect('/login');
        }
        return view('user.register');
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>" ; print_r($data) ; die;
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                // echo "success";die;
                Session::put('datingSignInSession', $data['email']);
                $msg = Auth::user()->name;
                return redirect('/dating')->with('toast_success','Welcome back,'.$msg);
            } else {
                return back()->with('toast_error', 'The email or password is incorrect, please try again!');
            }
        }
        return view('user.login');
    }
    public function dating()
    {
        $current_user_latitude = Auth::user()->latitude;    //get current logged in user's lat & long
        $current_user_longitude = Auth::user()->longitude;
        function distance($lat1, $lon1, $lat2, $lon2){
            if (($lat1 == $lat2) && ($lon1 == $lon2)){
              return 0;
            }
            else {
              /* Haversine formula - To Calculate circle distance on a sphere */
              $theta = $lon1 - $lon2;
              $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
              $dist = acos($dist);
              $dist = rad2deg($dist);
              $miles = $dist * 60 * 1.1515;
              $km = $miles* 1.609344;
              return round($km,2);
              }
          }
        $userlists = User::get()->except(Auth::id())->toArray();
        $users = [];
        foreach($userlists as $user){
           $distance = distance($current_user_latitude, $current_user_longitude, $user['latitude'], $user['longitude']);
           if($distance<=5){
               $users[] = [
                            'id'=>$user['id'],
                            'name'=>$user['name'],
                            'image'=>$user['image'],
                            'gender'=>$user['gender'],
                            'location'=>$user['location'],
                            'age'=>Carbon::parse($user['date_of_birth'])->age,
                            'distance'=>$distance
                          ];
                }else{
                }
        }
        // $users = array_chunk($users,2);
        //  echo "<pre>"; print_r($users);die;
        return view('dating.dating')->with(compact('users'));
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('datingSignInSession');
        return redirect('/');
    }
}
