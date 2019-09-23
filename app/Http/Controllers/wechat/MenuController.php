<?php

namespace App\Http\Controllers\Wechat;

use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class MenuController
 * 微信菜单
 * @package App\Http\Controllers
 */
class MenuController extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }

    public function createmenu()
    {
        $url='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->tools->get_wechat_access_token();
        $data=[
                "button"=>[
                 [
                     "type"=>"click",
                      "name"=>"今日歌曲",
                      "key"=>"V1001_TODAY_MUSIC"
                 ],

                  [
                      "name"=>"菜单",
                       "sub_button"=>[
                        [
                           "type"=>"view",
                           "name"=>"搜索",
                           "url"=>"http://www.baidu.com/"
                        ],
                        [
                           "type"=>"click",
                           "name"=>"赞一下我们",
                           "key"=>"V1001_GOOD"
                        ]]
                  ]]
                 ];

        $result=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        $res=json_decode($result,1);
        dd($res);

    }

    public function menu_list()
    {
        return view('menu/menu_list');
    }


}
