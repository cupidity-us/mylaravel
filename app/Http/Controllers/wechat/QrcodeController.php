<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

/**
 * 生成二位码
 * Class QrcodeController
 *
 * @package App\Http\Controllers
 */
class QrcodeController extends Controller
{
    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $data=DB::table('user')->get()->toArray();
//        dd($data);
        return view('qrcode.list',compact('data'));
    }
}
