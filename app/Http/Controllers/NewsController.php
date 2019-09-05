<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redis;
class NewsController extends Controller
{   

    public function login()
    {   
        $name=request()->post('name');
        $pwd=request()->post('pwd');
        $where=[
            'name'=>$name,
            'pwd'=>$pwd,
        ];

        $res=DB::table('user')->where($where)->first();
        // dump($res);
        $res=json_decode(json_encode($res),true);

        if ($res) {
            $session=request()->session()->put('user',$res);
            return redirect('news/index');

        }else{
            
        }

        return view('news/login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (!session('user')) {
        //     return redirect('news/login');
        // }

        $session=request()->session()->get('user');
        // dd($session);

       

        //查询
        $data=DB::table('news')->get();
        $data=json_decode(json_encode($data),true);

        $rela = DB::table('relation')->where(['uid' => session('user')['u_id']])->get();
        $rela = json_decode(json_encode($rela),true);
        $dianzan = array_column($rela, 'news_id');

        foreach ($data as $key => $value) {
            $dian = Redis::get('dianzan' . $value['news_id']);
            $data[$key]['dian'] = $dian;

            $data[$key]['flag'] = in_array($value['news_id'], $dianzan) ? '取消点赞' : '点赞';

        }
        return view('news/index',compact('data','session'));

        die;

        $rela = DB::table('relation')->where(['uid' => session('user')['u_id']])->get();
        $rela = json_decode(json_encode($rela),true);

        $dianzan = array_column($rela, 'news_id');

        foreach($data as $key => $val) {
            $v = Redis::get('dianzan' . $val['news_id']);
            $data[$key]['dian'] = empty($v) ? 0 : $v;


            // $data[$key]['flag'] = in_array($val['news_id'], $dianzan) ? '取消点赞' : '点赞';
        }

        // dd($data);
        return view('news/index',compact('data','session'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news/create');
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
        $data['news_time']=time();
        $res=DB::table('news')->insert($data);
        if ($res) {
            return redirect('news/index');
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
        //根据id查询数据
        $data=DB::table('news')->first();
        $data=json_decode(json_encode($data),true);
        $content=$data['news_content'];
        return view('news/show',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function red()
    {
        $id   = request()->get('id');
        $flag = request()->get('flag');

        if ($flag == '点赞') {
            Redis::incr('dianzan' . $id);
            DB::table('relation')->insert(['uid' => session('user')['u_id'], 'news_id' => $id]);
        } else {
            Redis::decr('dianzan' . $id);
            DB::table('relation')->where(['uid' => session('user')['u_id'], 'news_id' => $id])->delete();
        }
        
        echo Redis::get('dianzan' . $id);




        // die;
        // $flag = request()->get('flag');

        // if ($flag == '点赞') {
        //     Redis::incr('dianzan' . $id);
        //     // 新增点赞关系
        //     DB::table('relation')->insert(['uid' => session('user')['u_id'], 'news_id' => $id]);
        // } else {
        //     Redis::decr('dianzan' . $id);
        //     // 删除点赞关系
        //     DB::table('relation')->where(['uid' => session('user')['u_id'], 'news_id' => $id])->delete();
        // }

        // echo Redis::get('dianzan' . $id);

        // die;
        // $id=request()->post('id');
        // $num=request()->post('num');
        // $session=request()->session()->get('user');
        // $u_id=$session['u_id'];
        // $number=$session['num'];
        // if ($number==0) {
        //     //如果se里面的num=0
        //     $mem->increment($num);
        //     DB::table('user')->where('u_id',$u_id)->update(['num'=>1]);

        // }else{
        //     $mem->decrement($num);
        //     DB::table('user')->where('u_id',$u_id)->update(['num'=>0]);
        // }
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
