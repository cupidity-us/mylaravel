<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests\UserCreateBlogPost;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        //第一种session操作    
        //session 
        // $user=['uid'=>1,'uname'=>'admin'];
        // // //存入session
        // session(['user'=>$user]);
        // request()->session()->save();
        // //取
        // $data=session('user');
        // //删除session
         // $data=session(['user'=>null]);
        
       // 第二种session 操作
        // $user=['uid'=>2,'uname'=>'minda'];
        // //存入session
        // request()->session()->put('user',$user);
        // //save存入数据库
        // request()->session()->save();
        // //取出session
        // $user=request()->session()->get('user');
        // //删除session
        // $data=request()->session()->forget('user');
        
       
        //cookie
        $value = request()->cookie('name');
        // dd($value);
        //查询数据库
        $user = DB::table('user')->get();
        //分配
        
        return view('user/index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateBlogPost $request)
    // public function store(Request $request)
    {   

        // 验证一
        // $request->validate([
        //     'name' => 'required|unique:user|max:255',
        //     'age' => 'required',
        // ],[
        //     'name.required'=>'学生姓名不能呢为空'
        //     ,'name.unique'=>'姓名重复了'
        //     ,'age.required'=>'年龄不能为空'
        // ]);

        //验证二
             


        //验证三
        // $post=request()->except(['_token']);
        ////////////////////////////$post
        // $validator = Validator::make($request->all(), [
        //      'name' => 'required|unique:user|max:255',
        //      'age' => 'required',
        //      ],[
        //         'name.required'=>'学生姓名不能呢为空'
        //         ,'name.unique'=>'姓名重复了'
        //         ,'age.required'=>'年龄不能为空'
        //     ]);

        //      if ($validator->fails()) {
        //      return redirect('user/create')
        //      ->withErrors($validator)
        //     ->withInput();
        //      }

        //接收传值   //去除多余字段
        $post=request()->except(['_token']);

        //添加入库
        $res=DB::table('user')->insert($post);

        if ($res) {
            return redirect('user/index');
        }else{
            return redirect('user/create');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login()
    {   
        $res=session('user');
       
        return view('user/login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //根据传递过来的id进行查询
        $data=DB::table('user')->where('u_id',$id)->first();
        //分配数据
        return view('user/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post=request()->input();
        //入库修改
        $res=DB::table('user')->where('u_id',$id)->update($post);
            
        if ($res) {
            return redirect('user/index');
        }else{
            return redirect('user/edit');
        }
   
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $res=DB::table('user')->where('u_id',$id)->delete();

       if ($res) {
            return redirect('user/index');
        }else{
            return redirect('user/index');
        }

    }
}
