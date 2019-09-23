<?php

namespace App\Http\Controllers\wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**授权登录
 * Class WeloginController
 * @package App\Http\Controllers
 */
class WeloginController extends Controller
{
    public function login()
    {
    	return view('welogin/login');
    }

    public function welogin_login()
    {
    	//定义地址
    	$redirect_uri='http://www.mywx.com/welogin/code';
    	$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.env('WECHAT_APPID').'&redirect_uri='.urlencode($redirect_uri).'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
    	header('Location:'.$url);
    }

    public function code()
    {
    	$res=request()->all();
    	dd($res);
    	$result = file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_APPSECRET').'&code='.$res['code'].'&grant_type=authorization_code');
    	$re = json_decode($result,1);
    	$user_info = file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$re['access_token'].'&openid='.env('WECHAT_APPID').'&lang=zh_CN');
    	$wechat_user_info = json_decode($user_info,1);

        //获取openid
        $openid=$re['openid'];

        //根据id做查询
        $wechat_info=DB::table('user')->where(['openid'=>$openid])->first();

        //如果$wechat_info
        if (!empty($wechat_info)) {
            //有值
            //存入session
            request()->session()->put('id',$wechat_info->u_id);

            return redirect('index/index');
        }else{
            //没有值
            //添加一条用户
            $id=DB::table('user')->insertGetId([
                'name'=>$wechat_user_info['nickname'],
                'pwd'=>'88888888',
                'create_time'=>time(),
                'openid'=>$openid

            ]);

            $res=DB::table('wechat_user')->insert([
                'u_id'=>$id,
                'openid'=>$openid
            ]);

            //存入session
            request()->session()->put('id',$id);

            return redirect('index/index');
        }

    }




}
