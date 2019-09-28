<?php

namespace App\Http\Controllers\Wechat;

use App\Tools\Tools;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
 * 发送模板信息
 */
class MessageController extends Controller
{

    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }

    public function send_massage()
    {
        $url='https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$this->tools->get_wechat_access_token();
        dd($url);
        $openid='o7l9-xAeW7okSjG8DHjNztiFeCms';
        $num=rand(11111,99999);
        $data=[
            "touser"=>$openid,
           "template_id"=>"rUUCe-yu_xgA1bHozC_N0_3a2aK9q48HZyI3y9bZ_vU",
           "url"=>"http://www.mywx.com",
           "data"=>[
                    "first"=>[
                    "value"=>'亲爱的用户',
                    "color"=>''
                           ],
                    "keyword1"=>[
                    "value"=>$num,
                    "color"=>"#173177"
                           ],

                    "keyword2"=>[
                    "value"=>"刘优秀",
                    "color"=>"#173177"
                           ],
                 ]
            ];

        $result=$this->tools->curl_post($url,json_encode($data));
        dd($result);
    }

}
