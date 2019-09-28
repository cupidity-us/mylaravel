<?php

namespace App\Http\Controllers\wechat;

use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BetaController extends Controller
{
    public $tools;
    public function __construct(Tools $tools)
    {
        $this->tools = $tools;
    }

    /**
     * 2019.9.28 获取access——token
     */
}
