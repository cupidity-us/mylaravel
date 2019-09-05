<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cargo;
class CargoController extends Controller
{   

    public function login()
    {   
        $name=request()->post('name');
        $pwd=request()->post('pwd');
        // dump($name);
        $where=[
            'name'=>$name,
            'pwd'=>$pwd
        ];
        //查询
        // $session=request()->session()->put('user',$res);
        $res=DB::table('user')->where($where)->first();
        if ($res) {
            $session=request()->session()->put('user',$res);
            return redirect('cargo/index');
        }
        return view('cargo/login');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data=Cargo::get()->toArray();
        // dd($data->cargo_name);
        // dump(data['cargo_name']);
       
        $session=request()->session()->get('user');
        $name=$session->name;

        return view('cargo/index',compact('data','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargo/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=request()->all();
        
        if(request()->hasfile('cargo_logo')){
            $data['cargo_logo']=$this->upload('cargo_logo');
        }
        // dd($data['cargo_logo']);
        $data['cargo_time']=time();
        //入库
        $res=DB::table('cargo')->insert($data);
        if ($res) {
            return redirect('cargo/index');
        }



    }

    public function jion($id)
    {
        //根据id查询
        $data=DB::table('cargo')->where('cargo_id',$id)->first();
        //操作用户id
        $session=request()->session()->get('user');
        $sid=$session->u_id;
        // dd($sid);
        //分配
        return view('cargo/jion',compact('data','sid'));
    }

    public function dojion()
    {   
        //入库
        //接收窜传值
        $id=request()->post('cargo_id');
        $num=request()->post('cargo_num');

        //根据id做查询 要出这里面的num
        $data=DB::table('cargo')->where('cargo_id',$id)->first();
        $cargo_num=$data->cargo_num;
        // dd($cargo_num);
        // dd($num);
        //
        $session=request()->session()->get('user');
        $sid=$session->u_id;
        $time=time();
        
            //修改
        DB::table('cargo')->where('cargo_id',$id)->update(['cargo_num'=>$num]);
        $res=DB::table('cz')->insert(['u_id'=>$sid,'c_time'=>$time,'c_status'=>0,'cargo_id'=>$id]);
        if ($res) {
            return redirect('cargo/index');
        }
   
    }

    public function up($id)
    {
         //根据id查询
        $data=DB::table('cargo')->where('cargo_id',$id)->first();
        //操作用户id
        $session=request()->session()->get('user');
        $sid=$session->u_id;
        // dd($sid);
        //分配
        return view('cargo/jion',compact('data','sid'));
    }

    public function doup()
    {
         //入库
        //接收窜传值
        $id=request()->post('cargo_id');
        $num=request()->post('cargo_num');

        //根据id做查询 要出这里面的num
        $data=DB::table('cargo')->where('cargo_id',$id)->first();
        $cargo_num=$data->cargo_num;
        // dd($cargo_num);
        // dd($num);
        //
        $session=request()->session()->get('user');
        $sid=$session->u_id;
        $time=time();
        
            //修改
        DB::table('cargo')->where('cargo_id',$id)->update(['cargo_num'=>$num]);
        $res=DB::table('cz')->insert(['u_id'=>$sid,'c_time'=>$time,'c_status'=>1,'cargo_id'=>$id]);
        if ($res) {
            return redirect('cargo/index');
        }

    }

    public function love($id)
    {   

        $session=request()->session()->get('user');
        $sid=$session->u_id;
        //查询
        $where=[
            'u_id'=>$sid,
            'cargo_id'=>$id
        ];
        $data=DB::table('cz')->where($where)->get();
        // dd($data);
        return view('cargo/love',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     *文件上传的方法 
     */
    public function upload($logo)
    {   
        
        if (request()->file($logo)->isValid()) {
             $photo = request()->file($logo);
             $store_result = $photo->store('','public');
             return  $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
    }
}
