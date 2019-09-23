<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WechatController extends Controller
{

	public function get_user_index()
	{
		//获取
   		 $result = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->get_wechat_access_token().'&next_openid=');
    	//转换
    	$res=json_decode($result,1);
//    	 dd($res);
    	//定义一个空数组
    	$info=[];
    	//循环
    	foreach ($res['data']['openid'] as $k => $v) {
    		//调用用户信息
    		$user_info=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->get_wechat_access_token().'&openid='.$v.'&lang=zh_CN');
    		//转换字符
    		$user=json_decode($user_info,true);
    		//info 的 k=$user 里面的名
    		$info[$k]['nickname']=$user['nickname'];
    		$info[$k]['openid']=$v;

    	}
    	$data=json_decode(json_encode($info),true);
    	return view('wechat/get_user_index',compact('data'));

	}



	//调用方法
    public function get_access_token()
    {
    	 return $this->get_wechat_access_token();
    }

    //获取 微信 access_token
    public function get_wechat_access_token()
    {
    	//调用redis
    	$redis = new \Redis();
        $redis->connect('127.0.0.1','6379');

        //加入缓存
        $access_token_key='wechat_access_token';

        if ($redis->exists($access_token_key)) {
        	//如果存在
        	return $redis->get($access_token_key);
        }else{
        	//访问微信接口
        	$result=file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx898c3eb05f1812c9&secret=59d94a2c064b6b291f74d4858d82531c');
        	//转换$result
        	$res=json_decode($result,true);
        	//加入redis缓存 k v time
        	$redis->set($access_token_key,$res['access_token'],$res['expires_in']);
        	return $res['access_token'];
        }

    }

    public function lists()
    {

    }


}
