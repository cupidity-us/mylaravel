<?php

namespace App\Http\Controllers\wechat;

use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ExamController extends Controller
{
    public $tools;

    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }


    public function login()
    {
        //微信授权登录
        return view('exam.login');
    }

    public function dologin()
    {

        //定义跳转地址
        $redirect_uri='http://www.mywx.com/exam/code';
        //拼接地址
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.env('WECHAT_APPID').'&redirect_uri='.urlencode($redirect_uri).'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        header('Location:'.$url);
    }

    public function code()
    {
        $res=request()->all();
   
        $result = file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_APPSECRET').'&code='.$res['code'].'&grant_type=authorization_code');
        $re = json_decode($result,1);
        $user_info = file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$re['access_token'].'&openid='.env('WECHAT_APPID').'&lang=zh_CN');
        $wechat_user_info = json_decode($user_info,1);
        $openid=$re['openid'];

        //根据id做查询
        $wechat_info=DB::table('user')->where(['openid'=>$openid])->first();
        if ($wechat_info){
            return redirect('exam/taglist');
        }
    }

    //标签列表
    public function taglist()
    {
        
        $url='https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$this->tools->get_wechat_access_token();
        $res=file_get_contents($url);
        $data=json_decode($res,true);

        return view('exam/taglist',['info'=>$data['tags']]);
    }

    /**标签添加
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createtag()
    {
        return view('exam/createtag');
    }

    //处理添加
    public function dotag()
    {
        $data=request()->all();
        $url='https://api.weixin.qq.com/cgi-bin/tags/create?access_token='.$this->tools->get_wechat_access_token();
        $info=[
            'tag'=>[
                'name'=>$data['tag']
            ]
        ];

        $result=$this->tools->curl_post($url,json_encode($info,JSON_UNESCAPED_UNICODE));
        if ($result){
            return redirect('exam/taglist');
        }
    }

    /**标签下的粉丝列表
     * 
     */
    public function tagfans($id)
    {
        //获取标签下用户的openid

        $url = "https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token=".$this->tools->get_wechat_access_token();
        $data = [
            'tagid'=>$id
        ];
        $res = json_encode($data,JSON_UNESCAPED_UNICODE);
        $result=$this->tools->curl_post($url,json_encode($data));
        $openid = json_decode($result,true)['data']['openid'];

        //获取标签下的用户
        $url = "https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=".$this->tools->get_wechat_access_token();
        $arr = [];
        foreach($openid as $k=>$v){
            $arr[$k]['openid']=$v;
        }
        $data = [
            'user_list'=>$arr
        ];
        $str = json_encode($data,JSON_UNESCAPED_UNICODE);
        $re = $this->tools->curl_post($url,$str);

        $info = json_decode($re,true)['user_info_list'];

        return view('exam/tagfans',compact('info'));


    }


    /**粉丝列表
     * [fanslist description]
     * @return [type] [description]
     */
    public function fanslist($id)
    {
        // $id=request()->get('id');
        //获取
        $result = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->tools->get_wechat_access_token().'&next_openid=');
        //转换
//        dd($result);
        $res=json_decode($result,1);
//        dd($res);
        //定义一个空数组
        $info=[];
        //循环
        foreach ($res['data']['openid'] as $k => $v) {
            //调用用户信息
            $user_info=file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->tools->get_wechat_access_token().'&openid='.$v.'&lang=zh_CN');
            //转换字符
            $user=json_decode($user_info,true);
            // dd($user);
            //info 的 k=$user 里面的名
            $info[$k]['nickname']=$user['nickname'];
            $info[$k]['openid']=$v;

        }
        $data=json_decode(json_encode($info),true);
        // dd($data);
        // return view('wechat/get_user_index',);
        return view("exam/fanslist",compact('data','id'));

    }

    /**给粉丝打标签
     * 
     * [maketag description]
     * @return [type] [description]
     */
    public function maketag()
    {
        $openid=request()->post('openid');
        $tagid=request()->post('tagid');
        // dd($openid,$tagid);
        $url='https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token='.$this->tools->get_wechat_access_token();
        $data=[
                "openid_list"=>$openid,
                "tagid"=>$tagid
        ];

         $result=$this->tools->curl_post($url,json_encode($data));
         $res=json_decode($result);
         if ($res) {
             return redirect('exam/taglist');
         }

    }

    public function sendnews()
    {   
        // dd(request()->post());
        $info=request()->all();
        // dd($info);
        $url='https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.$this->tools->get_wechat_access_token();
        $data=[
                
               "touser"=>$info['openid'],
                "msgtype"=> "text",
                'text' => [
                'content' => $info['tagnews']
            ]
               

        ];
        // dd($data);
        $result=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        $res=json_decode($result);
        // dd($res);
        if($res->errcode== 0){
            echo "<script>alert('发送成功')";
            return redirect('exam/taglist');
        }else{
            dd($result);
        }
       
    }


}
