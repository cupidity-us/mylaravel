<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{

    public function index()
    {
        return view('file.index');
    }

    public function fileup()
    {
        $info=request()->file('u_file');
//      dd($info);
        $name='u_file';

        if(request()->hasFile($name) && request()->file($name)->isValid()){
            $photo = request()->file($name)->store('wechat');
//          //设置文件大小
//          $size=request()->file($name)->getClientSize()/1024/1024;
            $ext=request()->file($name)->getClientOriginalExtension();//获取文件类型
            $file_time=time().rand(1000,9999).'.'.$ext;
            //加入文件目录
            $path=request()->file($name)->storeAs('wechat\image',$file_time);
            //加入文件路径
            $path=realpath('./storage'.$path);
            //--
            $url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$this->get_access_token().'&type=image';
            //curl
            $result = $this->curl_upload($url,$path);
            dd($result);
        }

    }

    public function get_access_token()
    {
        $result=file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx898c3eb05f1812c9&secret=59d94a2c064b6b291f74d4858d82531c');
        //转换$result
        $res=json_decode($result,true);
        dd($res);
    }




}
