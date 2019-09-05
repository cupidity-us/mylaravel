<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=DB::table('brand')->get();
        return view('brand/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   
        //接收表单传递的值
        $data=request()->all();
        // dd($data);
        //如果$data下面的图不为空 就去执行upload方法
        if(request()->hasfile('brand_logo')){
            $data['brand_logo']=$this->upload('brand_logo');
        }

        //数据入库
        $res=DB::table('brand')->insert($data);
        if ($res) {
            return redirect('brand/index');
        }else{
            return redirect('brand/create');
        }  


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
        //根据传过来的id查询
        $data=DB::table('brand')->where('brand_id',$id)->first();
        
        return view('brand/edit',compact('data'));
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
        $data=request()->all();

        if (request()->hasFile('brand_logo')) {
            //调用文件上传
            $data['brand_logo']=$this->upload('brand_logo');
            //获取修改之前的图片
            $logoname=storage_path('app\public').'/'.$data['oldimg'];
            //判断文件是否存在
            if (file_exists($logoname)) {
                //如果有就删除这个图片
            }
        }
        //删除传过来的多余字段
        unset($data['oldimg']);

        $res=DB::table('brand')->where('brand_id',$id)->update($data);
        if ($res) {
            return redirect('brand/index');
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
        //删除
        $res=DB::table('brand')->where('brand_id',$id)->delete();
        if ($res) {
            return redirect('brand/index');
        }
    }
}
