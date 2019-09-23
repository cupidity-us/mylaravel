<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\tools;
use DB;

/**
 * 周考 登录 列表 群发消息
 * Class WeektestController
 * @package App\Http\Controllers
 */
class WeektestController extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }


    /**
     * 先做一个登录
     */
    public function login()
    {
        return view('weektest.login');
    }

    /**
     * 真正的微信授权登录
     */
    public function dologin()
    {
        //定义地址获取code
        $redirect_uri='http://www.mywx.com/weektest/code';
        $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.env('WECHAT_APPID').'&redirect_uri='.urlencode($redirect_uri).'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        header('Location:'.$url);
        //定义地址

    }

    public function code()
    {
        $res=request()->all();
        //获取token
        $result=file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_APPSECRET').'&code='.$res['code'].'&grant_type=authorization_code');
        $re=json_decode($result,1);
        //拉取用户信息
        $user_info=file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$re['access_token'].'&openid='.env('WECHAT_APPID').'&lang=zh_CN');
        $info = json_decode($user_info,1);

        //获取openid
        $openid=$re['openid'];
//        dd($openid);
        //根据id做查询


       // dd($data_info);
        if ($data_info){
            request()->session()->put('id',$data_info->u_id);
            return redirect('weektest/list');
        }else{
            return 11;
        }

    }

    public function list()
    {   
        //用ezwchat获得用户列表
        /**
         *  $app = app('wechat.official_account');
        $data=$app->user->list($nextOpenId = null);  // $nextOpenId 可选
        dd($data);
         */
       
        // $session=request()->session()->get('id');
        // dd($session);
        //获取token
        $result = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_wechat_access_token().'&next_openid=');
        //转换
        $res=json_decode($result,1);
        // dd($res);
        //定义一个空数组
        $info=[];
        //循环
        foreach ($res['data']['openid'] as $k => $v) {
            //调用用户信息
            $user_info=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->tools->get_wechat_access_token().'&openid='.$v.'&lang=zh_CN');
            //转换字符
            $user=json_decode($user_info,true);
            //info 的 k=$user 里面的名
            $info[$k]['nickname']=$user['nickname'];
            $info[$k]['openid']=$v;

        }
        $data=json_decode(json_encode($info),true);
//         dd($data);

         return view('weektest/list',compact('data'));
    }

    /**
     * 退出
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function out()
    {
      request()->session()->forget('id');
      return redirect('weektest/login');
    }

    public function message()
    {
        //接收
        $info=request()->all();
//        dd($info);
        //使用方法
        $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.$this->tools->get_wechat_access_token();
//        数据
        $data = [
            'touser' =>$info['id'],
            'msgtype' => 'text',
            'text' => [
                'content' => $info['new']
            ]
        ];
//        dd($data);
        $res = $this->tools->curl_post($url,json_encode($data));
        $result = json_decode($res,1);
//        dd($result);
        //刷新当前页面
        if($result['errcode'] == 0){
            echo "<script>alert('发送成功');localtion.href='/weektest/list'</script>";
        }else{
            dd($result);
        }


    }

}
