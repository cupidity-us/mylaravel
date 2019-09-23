<?php

namespace App\Tools;


class Tools {
    public $redis;
    public function __construct()
    {
        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1','6379');
    }

    /**
     * jsapi_ticket
     * @return bool|string
     */
    public function get_wechat_jsapi_ticket()
    {
        //加入缓存
        $access_api_key = 'wechat_jsapi_ticket';
        if($this->redis->exists($access_api_key)){
            //存在
            return $this->redis->get($access_api_key);
        }else{
            //不存在
            $result = file_get_contents('https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$this->get_wechat_access_token().'&type=jsapi');
            $re = json_decode($result,1);
            $this->redis->set($access_api_key,$re['ticket'],$re['expires_in']);  //加入缓存
            return $re['ticket'];
        }
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

    /**
     * @param $url
     * @param $data
     * @return bool|string
     */
    public function curl_post($url,$data)
    {
        $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl,CURLOPT_POST,true);  //发送post
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        $data = curl_exec($curl);
        $errno = curl_errno($curl);  //错误码
        $err_msg = curl_error($curl); //错误信息
        curl_close($curl);
        return $data;
    }


}
