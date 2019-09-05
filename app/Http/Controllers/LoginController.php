<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Account;
class LoginController extends Controller
{
    public function index()
    {
    	return view('login/index');
    }

    public function store()
    {
    	$email=request()->post('email');
        // dd($email);
    	$pwd=request()->post('pwd');

        $where=[
            'a_email'=>$email,
            'a_pwd'=>$pwd
        ];
         // dd($where);
    	//查询
    	$res=Account::where($where)->first()->toArray();
        // dd($res);

    	
    	if ($res) {
            // dd($res);
    		//存sessionjm0
            request()->session()->put('emailname',$res);
    		// session(['emailname'$res]);
            // session(['emailname'=>$res]);

    		return ['code'=>1];
    	}else{
    		return ['code'=>2];
    	}

        

    }




    
}
