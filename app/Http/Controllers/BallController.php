<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ball;
class BallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        // $data=DB::table('ball')->get();
        $data = Ball::get()->toArray();
        dd($data);
        //截至时间
        // 当前时间
        $time=time();
        // dd($time);
        //如果截至时间小于当前时间  true说名 可以竞猜  false 截至
        // dd($status);
        return view('ball/index',compact('data','time'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('ball/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=request()->post();
        // dd($data['ball_time']);
        $data['ball_time']=strtotime($data['ball_time']);
      

        //入库
        $res=DB::table('ball')->insert($data);
        if ($res) {
            return redirect('ball/index');
        }
    }

    public function guess($id)
    {
        //根据id查询
        $data=DB::table('ball')->where('ball_id',$id)->first();
        return view('ball/guess',compact('data'));
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
