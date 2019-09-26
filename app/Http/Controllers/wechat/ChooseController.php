<?php

namespace App\Http\Controllers\wechat;

use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ChooseController extends Controller
{

    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }

    /**
     * 更改标签 查看课程 课程管理
     */
    public function createmenu()
    {
        $url='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->tools->get_wechat_access_token();
        $data=[
            "button"=>[
                [
                    "type"=>"click",
                    "name"=>"查看课程",
                    "key"=>"V1001_GOOD"
                ],
                [
                    "type"=>"view",
                    "name"=>"课程管理",
                    "url"=>"http://www.mywx.com/choose/login"
                   ]
            ]

        ];

//                [
//                    "name"=>"菜单",
//                    "sub_button"=>[
//                        [
//                            "type"=>"view",
//                            "name"=>"搜索",
//                            "url"=>"http://www.baidu.com/"
//                        ],
//                        [
//                            "type"=>"click",
//                            "name"=>"赞一下我们",
//                            "key"=>"V1001_GOOD"
//                        ]]
//                ]]

        $result=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        $res=json_decode($result,1);
        dd($res);
    }

    public function sendmessage()
    {
        //获取openid 从数据库查询 发送
        $url='https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN';
    }

    public function welogin_login()
    {
        //定义地址
        $redirect_uri='http://www.mywx.com/choose/code';
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.env('WECHAT_APPID').'&redirect_uri='.urlencode($redirect_uri).'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        header('Location:'.$url);
    }

    public function code()
    {
        $res = request()->all();
//        dd($res);
        $result = file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . env('WECHAT_APPID') . '&secret=' . env('WECHAT_APPSECRET') . '&code=' . $res['code'] . '&grant_type=authorization_code');
        $re = json_decode($result, 1);
        $user_info = file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token=' . $re['access_token'] . '&openid=' . env('WECHAT_APPID') . '&lang=zh_CN');
        $wechat_user_info = json_decode($user_info, 1);

        //获取openid
        $openid = $re['openid'];

        //根据id做查询
        $info=DB::table('choose')->where('openid',$openid)->first();
        if ($info){
            //如果有值去修改页面
        }else{
            //如果没有去添加页面
            return redirect('choose/createlesson');
        }



    }


    public function createlesson()
    {
        //接收传递过来的值 塞入视图
        return view('choose/createlesson');
    }

    public function dolesson()
    {
        //接收表单数据

        //入库跳转
    }

    //课程管理
    public function manage()
    {

    }

}
