<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\Tools;
/**
 * 微信签名
 * Class SignController
 * @package App\Http\Controllers
 *
 */
class SignController extends Controller
{

    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }

    public function location()
    {
        $appid=env('WECHAT_APPID');
//        dd($appid);
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];//当前的url
        $jsapi_ticket = $this->tools->get_wechat_jsapi_ticket();
        $timestamp=time(); // 必填，生成签名的时间戳
        $nonceStr=rand(1000,9999).'shuibian'; // 必填，生成签名的随机串
        //按顺序拼接
        $sign_str = 'jsapi_ticket='.$jsapi_ticket.'&noncestr='.$nonceStr.'&timestamp='.$timestamp.'&url='.$url;
//        echo $sign_str;
        $signature=sha1($sign_str);// 必填，签名
//        dd($signature);
        //分配
        return view('sign/location',compact('appid','timestamp','nonceStr','signature'));
    }
}
