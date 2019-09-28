<?php

namespace App\Http\Controllers\wechat;

use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 *
 * Class LessonController
 * @package App\Http\Controllers\wechat
 */
class LessonController extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }

    /**
     * 关注后自动回复
     */
    public function backinfo()
    {
//        echo $_GET['echostr'];
//        die;

//        $xml_string = file_get_contents('php://input'); // 获取微信发过来的xml数据
//        $wechat_log_path = storage_path('/logs/wechat/'.date("Y-m-d").'.log');  // 生成日志文件
//        file_put_contents($wechat_log_path,"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);
//        file_put_contents($wechat_log_path,$xml_string,FILE_APPEND);
//        file_put_contents($wechat_log_path,"\n<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n\n",FILE_APPEND);
////        dd($xml_string);
//        $xml_obj = simplexml_load_string($xml_string,'SimpleXMLElement',LIBXML_NOCDATA);
//        $xml_arr = (array)$xml_obj;
//        \Log::Info(json_encode($xml_arr,JSON_UNESCAPED_UNICODE));
////        echo $_GET['echostr'];
//        // 业务逻辑（防止刷业务）
//        if ($xml_arr['MsgType'] == 'event') {
//            if ($xml_arr['Event'] == 'subscribe') {
//                $share_code = explode('_',$xml_arr['EventKey'])[1];
//                $user_openid = $xml_arr['FromUserName']; // 粉丝的openid
//                // 判断是否已经在日志里
//                $wechat_openid = DB::table('wechat_openid')->where('openid',$user_openid)->first();
//                if (empty($wechat_openid)) {
//                    DB::table('users')->where('id',$share_code)->increment('share_num',1);
//                    DB::table('wechat_openid')->insert([
//                        'openid' => $user_openid,
//                        'add_time' => time()
//                    ]);
//                }
//            }
//        }
//        echo $_GET['echostr'];




        $xml_string = file_get_contents('php://input'); // 获取微信发过来的xml数据
        $wechat_log_path = storage_path('/logs/wechat/'.date("Y-m-d").'.log');  // 生成日志文件
        file_put_contents($wechat_log_path,"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);
        file_put_contents($wechat_log_path,$xml_string,FILE_APPEND);
        file_put_contents($wechat_log_path,"\n<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n\n",FILE_APPEND);
//        dd($xml_string);
        $xml_obj = simplexml_load_string($xml_string,'SimpleXMLElement',LIBXML_NOCDATA);
        $xml_arr = (array)$xml_obj;
        \Log::Info(json_encode($xml_arr,JSON_UNESCAPED_UNICODE));
//        echo $_GET['echostr'];
        // 业务逻辑（防止刷业务）
//        if ($xml_arr['MsgType'] == 'event') {
//            if ($xml_arr['Event'] == 'subscribe') {
//                $share_code = explode('_',$xml_arr['EventKey'])[1];
//                $user_openid = $xml_arr['FromUserName']; // 粉丝的openid
//                // 判断是否已经在日志里
//                $wechat_openid = DB::table('wechat_openid')->where('openid',$user_openid)->first();
//                if (empty($wechat_openid)) {
//                    DB::table('users')->where('id',$share_code)->increment('share_num',1);
//                    DB::table('wechat_openid')->insert([
//                        'openid' => $user_openid,
//                        'add_time' => time()
//                    ]);
//                }
//            }
//        }

        //关注逻辑
        if($xml_arr['MsgType'] == 'event' && $xml_arr['Event'] == 'subscribe'){
            //关注
            //opnid拿到用户基本信息
            $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=25_HiShgSlE7WsSjjgjcdyL2wFmkkOZDz0VQMxuSrYXzPbce9_EO5ePIiYbTJ05QFVQGGAXdsi_MdIssMoKtYQ0MG9UoGSkD_oFrH88ZufbSWwiQ1bEqHbIE53CZS49p6TGmPG5DfMZNxFxsCl1IMMaAIARVV&openid='.$xml_arr['FromUserName'].'&lang=zh_CN';
            $user_re = file_get_contents($url);
            $user_info = json_decode($user_re,1);
            // 存入数据库
            $db_user = DB::table("wechat_openid")->where(['openid'=>$xml_arr['FromUserName']])->first();
            if(empty($db_user)){
                //没有数据，存入
                DB::table("wechat_openid")->insert([
                    'openid'=>$xml_arr['FromUserName'],
                    'add_time'=>time()
                ]);
            }
            $time=time();
            $message = '你好'.$user_info['nickname'].',当前时间为'.date('Y-m-d H:i:s',$time);
            $xml_str = '<xml><ToUserName><![CDATA['.$xml_arr['FromUserName'].']]></ToUserName><FromUserName><![CDATA['.$xml_arr['ToUserName'].']]></FromUserName><CreateTime>'.time().'</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA['.$message.']]></Content></xml>';
            echo $xml_str;
        }else{
            $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=25_HiShgSlE7WsSjjgjcdyL2wFmkkOZDz0VQMxuSrYXzPbce9_EO5ePIiYbTJ05QFVQGGAXdsi_MdIssMoKtYQ0MG9UoGSkD_oFrH88ZufbSWwiQ1bEqHbIE53CZS49p6TGmPG5DfMZNxFxsCl1IMMaAIARVV&openid='.$xml_arr['FromUserName'].'&lang=zh_CN';
            $user_re = file_get_contents($url);
            $user_info = json_decode($user_re,1);
            $show_time=time();
            $message = '欢迎回来'.$user_info['nickname'].',当前时间为'.date('Y-m-d H:i:s',$show_time);
            $xml_str = '<xml><ToUserName><![CDATA['.$xml_arr['FromUserName'].']]></ToUserName><FromUserName><![CDATA['.$xml_arr['ToUserName'].']]></FromUserName><CreateTime>'.time().'</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA['.$message.']]></Content></xml>';
            echo $xml_str;

        }








//        //判断第一次关注被动回复消息
//        if($xml_arr['MsgType']=="event"){
//            if($xml_arr['Event']=="subscribe"){
//                $user_info=file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->tools->get_wechat_access_token()."&openid=".$xml_arr['FromUserName']."&lang=zh_CN");
//                $user=json_decode($user_info,1);
//                $message='欢迎关注！'.$user['nickname'];
//                $xml_str='<xml><ToUserName><![CDATA['.$xml_arr['FromUserName'].']]></ToUserName><FromUserName><![CDATA['.$xml_arr['ToUserName'].']]></FromUserName><CreateTime>'.time().'</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA['.$message.']]></Content></xml>';
//                echo $xml_str;
//            }
//        }
        //业务逻辑
//        if($xml_arr['MsgType']=='event'){
//            if($xml_arr['Event']=='subscribe'){
//                $share_code=explode('_',$xml_arr['EventKey'])[1];
//                $user_openid=$xml_arr['FromUserName'];//粉丝openid
//                //判断是否已经关注过
//                $wechat_openid=DB::table('user')->where(['u_id'=>$user_openid])->first();
//                if(empty($wechat_openid)){
//                    DB::table('user')->where(['u_id'=>$share_code])->increment('share_num',1);
//                    DB::table('wechat_user')->insert([
//                        'openid'=>$user_openid,
//                    ]);
//                }
//            }else{
//                $xml_str='<xml><ToUserName><![CDATA['.$xml_arr['FromUserName'].']]></ToUserName><FromUserName><![CDATA['.$xml_arr['ToUserName'].']]></FromUserName><CreateTime>'.time().'</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[欢迎回来❥(^_-)]]></Content></xml>';
//                echo $xml_str;
//            }
//        }
//        //判断第一次关注被动回复消息
//        $message='欢迎关注 撒拉嘿呦！';
//        $xml_str='<xml><ToUserName><![CDATA['.$xml_arr['FromUserName'].']]></ToUserName><FromUserName><![CDATA['.$xml_arr['ToUserName'].']]></FromUserName><CreateTime>'.time().'</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA['.$message.']]></Content></xml>';
//        echo $xml_str;
    }

}
