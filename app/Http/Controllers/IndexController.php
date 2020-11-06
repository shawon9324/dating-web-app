<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        if(empty(Session::has('datingSignInSession'))){
            return view('index');
        }else{
            return redirect('/dating');
        }
        
    }
}
