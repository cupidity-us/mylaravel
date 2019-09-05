<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        return view('file.index');
    }

    public function fileup()
    {
        $info=request()->file('u_file');

        $name='info';
        if(request()->hasFile($name) && request()->file($name)->isValid()){
            $photo = request()->file($name)->store('wechat');
            dd($photo);
        }

    }

}
