<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('goods/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //查询品牌表
        $data=DB::table('brand')->get();
        //查询分类表
        $info=DB::table('cat')->orderby("sort_order","DESC")->get();
        
        $info=createTree($info);
        
        return view('goods/create',compact('data','info'));
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
        $data['add_time'] = time();
        if(request()->hasfile('goods_img')){
            $data['goods_img']=$this->upload('goods_img');
        }


        //数据入库
        $res=DB::table('goods')->insert($data);
        if ($res) {
            return redirect('goods/index');
        }else{
            return redirect('goods/create');
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
