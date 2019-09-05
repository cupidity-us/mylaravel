<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reg/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=request()->input();
        //添加
        $res=DB::table('account')->insert($data);
        if ($res) {
            return redirect('/login');
        }else{
            return redirect('reg/index');
        }
    }

    public function sendemail()
    {
        //接收传过来的邮箱号
        $email=request()->post('email');
        //设置随机数
        $info=rand(1000,9999);
        //传入send方法
        $this->send($email,$info);
        //存入session
        $num=request()->session()->put('info',$info);
        //取出session
        $session=request()->session()->get('info');
        if ($session) {
            return ['code'=>1];
        }else{
            return ['code'=>0];
        }
        
    }


   public function send($email,$info)
   {    
        
        \Mail::raw('傻沟你的验证码是----'.$info ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册优秀天成有限公司");
        //设置接收方
            $message->to($email);
        });
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        //接收传值
         $num=request()->post('num');
        //session里的验证码和传过来的做比对
         $data=session('info');
         if ($num==$data) {
             return ['code'=>1];
         }else{
             return ['code'=>2];
         }
         
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
