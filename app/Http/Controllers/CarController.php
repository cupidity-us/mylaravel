<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //看看session
        $session=request()->session()->get("emailname");
        //要里面的id
        $a_id=$session[' a_id'];
        //根据id看看商品
        $data=DB::table('car')->where('a_id',$a_id)->get();
        //根据id看看有多少条
        $tol=DB::table('car')->where('a_id',$a_id)->count();

        return view('car/index',compact('data','tol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $goods_id=request()->post('goods_id');
        $data=DB::table('goods')->where('goods_id',$goods_id)->first();
        // dd($data);
        $session=request()->session()->get("emailname");
        // dd($session);
        $a_id=$session[' a_id'];
        // dd($a_id);
        $car= DB::table('car')->insert([
                'a_id'  =>$a_id ,
                'goods_id' => $data->goods_id,
                'goods_name'=>$data->goods_name,
                'goods_price'=>$data->goods_price,
                'goods_img'=>$data->goods_img,
                'goods_number'=> 1
            ]);
        

        if ($car) {
            return ['code'=>1];
        }else{
            return ['code'=>2];
        }


    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

