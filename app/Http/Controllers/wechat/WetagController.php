<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\tools;

/**微信标签
 * Class WetagController
 * @package App\Http\Controllers
 */
class WetagController extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }

    /**
     * 标签列表
     */
    public function tag_index()
    {
        $url='https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$this->tools->get_wechat_access_token();
        $res=file_get_contents($url);
        $data=json_decode($res,true);

        return view('wetag.tag_index',['info'=>$data['tags']]);
    }

    /**
     * 添加标签
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_tag()
    {
        return view('wetag.tag_add');
    }

    /**
     * 处理添加标签
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function do_add_tag()
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
            return redirect('wetag/tag_index');
        }

    }

    /**
     * 删除标签
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function del_tag($id)
    {
        $url='https://api.weixin.qq.com/cgi-bin/tags/delete?access_token='.$this->tools->get_wechat_access_token();
        $info=[
            'tag'=>[
                'id'=>$id,
            ]
        ];

        $res=file_get_contents($url,json_encode($info));
        $result=$this->tools->curl_post($url,json_encode($info));
        if ($result){
            return redirect('wetag/tag_index');
        }

    }

    /**
     * 修改标签
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update_tag()
    {
        $id=request()->post('id');
        $name=request()->post('name');
        return view('wetag/update_tag',compact('name','id'));
    }

    /**
     * 处理修改标签
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doupdate_tag()
    {
        $tag=request()->post('tag');
//        dd($tag);
        $id=request()->post('id');
        $url='https://api.weixin.qq.com/cgi-bin/tags/update?access_token='.$this->tools->get_wechat_access_token();
        $info=[
            'tag'=>[
                'id'=>$id,
                'name'=>$tag,
            ]
        ];
        $res=file_get_contents($url,json_encode($info));
        $result=$this->tools->curl_post($url,json_encode($info,JSON_UNESCAPED_UNICODE));
        if ($result){
            return redirect('wetag/tag_index');
        }
    }

    /**
     * 粉丝列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fans_list()
    {
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
            dd($user);
            //info 的 k=$user 里面的名
            $info[$k]['nickname']=$user['nickname'];
            $info[$k]['openid']=$v;

        }
        $data=json_decode(json_encode($info),true);
        // dd($data);
        // return view('wechat/get_user_index',);
        return view("wetag/fans_list",compact('data'));
    }

    /**
     * 当前标签下的粉丝
     *
     */
    public function fans_tag()
    {
        $tagid=request()->post('id');
//      dd($tagid);
        $url='https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token='.$this->tools->get_wechat_access_token();
        $info=[
             'tag'=>[
                 'tagid'=>$tagid,
                 'next_openid'=>''
             ]
        ];

//        $res=file_get_contents($url,json_encode($info));
//        dd($res);
        $result=$this->tools->curl_post($url,json_encode($info));
        $data=json_decode($result,1);
        dd($data);
//        dd($data);
    }

}
