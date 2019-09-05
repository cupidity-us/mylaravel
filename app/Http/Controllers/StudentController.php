<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //查询
        $data=DB::table('student')->where('student_status',1)->get();

        return view('student/index',compact('data'));
    }

    public function twoindex()
    {   
        //查询
        $data=DB::table('student')->where('student_status',0)->get();

        return view('student/twoindex',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('student/create');
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
        //添加
        $res=DB::table('student')->insert($data);
        if ($res) {
            return redirect('student/index');
        }else {
            return redirect('student/create');
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
        //查询数据
        $data=DB::table('student')->where('student_id',$id)->first();
        // $res=json_decode(json_encode($data),true);
        // $res=$res[0];
        // dd($data);
        return view('student/edit',compact('data'));
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
        $data=request()->post();
        $res=DB::table('student')->where('student_id',$id)->update($data);
        if ($res) {
            return redirect('student/index');
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
        $data=DB::table('student')->where('student_id',$id)->update(['student_status'=>0]);
        if ($data) {
           return redirect('student/index');
        }
    }
}
