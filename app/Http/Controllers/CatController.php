<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=DB::table('cat')->get();
        $data=createTree($data);
        //根据分类id 统计出当前分类下商品
        //SELECT count(*) FROM goods WHERE cat_id = 13;
        // foreach ($data as $key => $value) {
        //     $cat_id = $value->cat_id;
        //     //通过sql统计商品数量
        //     $count = DB::table('cat')->where("cat_id",$cat_id)->count();
        //     $data->$key->count = $count;
        // }
        return view('cat/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data=DB::table('cat')->orderby("sort_order","DESC")->get();
        
        $data=createTree($data);

        return view('cat/create',compact('data'));
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
        //数据入库
        $res=DB::table('cat')->insert($data);
        if ($res) {
            return redirect('cat/index');
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
}
