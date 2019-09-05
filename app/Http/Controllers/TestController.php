<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $info=request()->all();
        $name=$info['name']??'';
        $where=[];
        if ($name) {
            $where[]=['t_name','like','%'.$name.'%'];
        }

        //查询数据
        $data=DB::table('test')->where($where)->paginate(3);
        // dd($data);
        //分配数据
        return view('test/index',compact('data','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //验证
        $request->validate([
            't_name' => 'required|unique:test|max:255',
            
        ],[
            't_name.required'=>'网站名不能为空'
            ,'t_name.unique'=>'网站名重复了'
        ]);

        //接收数据
        $data=request()->all();

        //调用图片上传
       if(request()->hasfile('t_logo')){
            $data['t_logo']=$this->upload('t_logo');
        }

        //添加数据
        $res=DB::table('test')->insert($data);
        //判断是否成功
        if ($res) {
           return redirect('test/index');
        }
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
         //根据id查询数据
        $data=DB::table('test')->where('t_id',$id)->first();
        
        return view('test/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //看看传过来的数据
        $data=request()->all();
        //修改
        if(request()->hasfile('t_logo')){
            $data['t_logo']=$this->upload('t_logo');
        }
        $res=DB::table('test')->where('t_id',$id)->update($data);

        if ($res) {
            return redirect('test/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {   //接收id
        $id=request()->input('t_id');
        //删除
        $res=DB::table('test')->where('t_id',$id)->delete();
        if ($res) {

                $info = ['code'=>1];
                echo json_encode($info);
            }else{
                $info = ['code'=>2];
                echo json_encode($info);
            }
    }

     /**
     * 文件上传
     *
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
