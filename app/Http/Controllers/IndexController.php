<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class IndexController extends Controller
{
    public function index()
    {	
       //实例
       //  $mem=new \Memcache;
       //  $mem->connect('127.0.0.1','11211');

       //  //取值
       //  $data=$mem->get('IndexController_index');
        
       //  if (empty($data)) {
       //      $data=DB::table('carinfo')->get();
       //      $mem->set('IndexController_index',$data,0,1);
       //  }

       //  echo $data;

       // die;
    	//顶级分类查询
    	$top=DB::table('cat')->where('parent_id',0)->get();
    	//查询商品
    	$goods=DB::table('goods')->where('is_show',1)->get();

    	//查询商品条数
    	$num=DB::table('goods')->count();
    	//差看seesion
    	$session=request()->session()->get('emailname');
        
    	
    	// dd($num);
    	return view('index/index',compact('top','goods','num','session'));
    }




}
