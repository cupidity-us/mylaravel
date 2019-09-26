<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

//     return view('welcome');
// });

//userContorller / index



// Route::view('user/index','index',['name'=>'11']);

// //模拟提交
// Route::get('/user',function(){
// 	return '<form method="POST" action="indexTwo">'.csrf_field().'<input type="text" name="username"><button>提交</button></form>';
// });

// Route::post('/indexTwo',function(){
// 	 dd(request()->username);
// });
//
//列表页
//
////登录页面
// Route::get('cookie/index', function () {
//  $minutes = 24 * 60;
//  return response('欢迎来到 Laravel 学院')->cookie('name', '学院君', $minutes);
// });




//邮件发送r
Route::prefix('mail')->group(function () {

	Route::any('send','MailController@send');
	Route::any('sendmail','MailController@sendmail');
	Route::any('index','MailController@index');
	Route::any('create','MailController@create');
	Route::any('store','MailController@store');
});
//user 练习
Route::prefix('user')->middleware('auth')->group(function () {

	//列表页
	Route::get('index','UserController@index');
	//添加页
	Route::get('create','UserController@create');
	//处理添加
	Route::post('store','UserController@store');
	//修改
	Route::get('edit/{id}','UserController@edit');
	//处理修改
	Route::any('update/{id}','UserController@update');
	//删除了
	Route::any('destroy/{id}','UserController@destroy');

});

/**
 * 前台
 */
//前台主页面
Route::get('/','IndexController@index');
//登录
Route::get('login/index','LoginController@index');
Route::prefix('login')->group(function () {
	//登录
	Route::any('store','LoginController@store');

});
Route::prefix('reg')->group(function () {
	//注册
	Route::get('index','RegController@index');
	//发送邮件
	Route::get('getemail','RegController@getemail');
	Route::any('sendemail','RegController@sendemail');
	Route::any('send','RegController@send');
	Route::any('show','RegController@show');
	Route::any('store','RegController@store');

});

//商品列表页
Route::prefix('lists')->group(function () {
	Route::any('index/{id}','ListsController@index');
});

//商品详情页
Route::prefix('info')->group(function () {
	Route::any('index/{id}','InfoController@index');
});

Route::prefix('car')->group(function () {
	Route::any('index','CarController@index');
	Route::any('create','CarController@create');
});


/*
 * 后台
 */

//模板文件
Route::prefix('background')->group(function () {
	//头部
	Route::get('head', 'BackgroundController@head');
	//脚部
	Route::get('foot', 'BackgroundController@foot');
	//左边
	Route::get('left', 'BackgroundController@left');
	//index
	Route::get('index', 'BackgroundController@index');
	//中间
	Route::get('main', 'BackgroundController@main');

});

//后台管理员
Route::prefix('admin')->group(function () {
	//管理员列表页
	Route::get('index','AdminController@index');
	//管理员添加
	Route::get('create','AdminController@create');
	//管理员处理添加
	Route::post('store','AdminController@store');
});

/**
 * 后台品牌
 */
Route::prefix('brand')->group(function () {
	//品牌主页
	Route::get('index','BrandController@index');
	//品牌添加
	Route::get('create','BrandController@create');
	//处理添加
	Route::post('store','BrandController@store');
	//修改页面
	Route::get('edit/{id}','BrandController@edit');
	//处理修改页面
	Route::any('update/{id}','BrandController@update');
	//删除
	Route::any('destroy/{id}','BrandController@destroy');
});

//分类
Route::prefix('cat')->group(function () {
	//分类列表
	Route::get('index','CatController@index');
	//分类添加
	Route::get('create','CatController@create');
	//处理添加
	Route::any('store','CatController@store');

});

//商品
Route::prefix('goods')->group(function () {
	//商品列表
	Route::get('index','GoodsController@index');
	//商品添加
	Route::get('create','GoodsController@create');
	//处理添加
	Route::any('store','GoodsController@store');
});



//
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//周五练习
Route::prefix('test')->middleware('auth')->group(function(){
	//网站列表
	Route::get('index','TestController@index');
	//网站添加页
	Route::get('create','TestController@create');
	//处理添加页
	Route::any('store','TestController@store');
	//修改页
	Route::get('edit/{id}','TestController@edit');
	//处理修改
	Route::any('update/{id}','TestController@update');
	//删除
	Route::any('destroy','TestController@destroy');
});

Route::prefix('student')->group(function(){
	//列表
	Route::any('index','StudentController@index');
	Route::any('create','StudentController@create');
	Route::any('store','StudentController@store');
	Route::any('twoindex','StudentController@twoindex');
	Route::any('destroy/{id}','StudentController@destroy');
	Route::any('edit/{id}','StudentController@edit');
	Route::any('update/{id}','StudentController@update');

});
Route::any('news/login','NewsController@login');
Route::prefix('news')->middleware('checklogin')->group(function(){
	Route::any('index','NewsController@index');
	Route::any('create','NewsController@create');
	Route::any('store','NewsController@store');
	Route::any('show/{id}','NewsController@show');
	Route::any('red','NewsController@red');
});

Route::prefix('ball')->group(function(){
	Route::any('index','BallController@index');
	Route::any('create','BallController@create');
	Route::any('store','BallController@store');
	Route::any('guess/{id}','BallController@guess');
});
Route::any('cargo/login','CargoController@login');
Route::prefix('cargo')->middleware('checklogin')->group(function(){
	Route::any('index','CargoController@index');
	Route::any('create','CargoController@create');
	Route::any('store','CargoController@store');
	Route::any('jion/{id}','CargoController@jion');
	Route::any('dojion','CargoController@dojion');
	Route::any('up/{id}','CargoController@up');
	Route::any('doup','CargoController@doup');
	Route::any('love/{id}','CargoController@love');

});

///////////////////////////////////////////////////////////////////
///微信
///////////////////////////////////////////////////////////////////

Route::prefix('wechat')->namespace('wechat')->group(function () {
	Route::get('get_access_token','WechatController@get_access_token');
	Route::get('get_wechat_access_token','WechatController@get_wechat_access_token');
	Route::get('get_user_index','WechatController@get_user_index');

});

Route::prefix('welogin')->namespace('wechat')->group(function () {
	Route::get('login','WeloginController@login');
	Route::any('welogin_login','WeloginController@welogin_login');
	Route::any('code','WeloginController@code');
});

Route::prefix('file')->namespace('wechat')->group(function () {
    Route::any('index','FileController@index');
    Route::any('fileup','FileController@fileup');
    Route::any('get_access_token','FileController@get_access_token');
});

/**
 *微信标签
 */
Route::prefix('wetag')->namespace('wechat')->group(function () {
    Route::get('tag_index','WetagController@tag_index');//标签列表
    Route::any('add_tag','WetagController@add_tag');//添加标签
    Route::any('do_add_tag','WetagController@do_add_tag');//处理添加标签
    Route::any('del_tag/{id}','WetagController@del_tag');//处理添加标签
    Route::any('update_tag','WetagController@update_tag');//处理添加标签
    Route::any('doupdate_tag','WetagController@doupdate_tag');//处理修改标签
    Route::any('fans_list','WetagController@fans_list');//粉丝列表
    Route::any('fans_tag','WetagController@fans_tag');//标签下的粉丝列表

});
Route::prefix('message')->namespace('wechat')->group(function () {
    Route::any('send_massage','MessageController@send_massage');//添加标签
});
//2019/9/16周一测试
//Route::any('weektest/login','weektestController@login');//登录
Route::prefix('weektest')->namespace('wechat')->group(function () {
    Route::any('login','weektestController@login');//登录
    Route::any('dologin','weektestController@dologin');//处理登录
    Route::any('code','weektestController@code');//获取code
    Route::any('list','weektestController@list');//粉丝页
    Route::any('out','weektestController@out');//退出
    Route::any('message','weektestController@message');//消息群发

});

/**
 * 生成带有参数的二维码
 */
Route::prefix('qrcode')->namespace('wechat')->group(function () {
    Route::any('list','qrcodeController@list');//列表
});
/**
 * 微信菜单
 */
Route::prefix('menu')->namespace('wechat')->group(function () {
    Route::any('createmenu','menuController@createmenu');//生成菜单
});
/**
 * 微信签名
 */
Route::prefix('sign')->namespace('wechat')->group(function () {
    Route::any('location','signController@location');//生成菜单
});

/**
 * 2019.9.21 登录 创建标签 添加标签 给粉丝打标签 查看标签下的粉丝 群发消息 定时发送
 */
Route::prefix('exam')->namespace('wechat')->group(function () {
    Route::any('login','examController@login');//授权登录
    Route::any('dologin','examController@dologin');//授权登录
    Route::any('code','examController@code');//处理code
    Route::any('taglist','examController@taglist');//标签列表
    Route::any('createtag','examController@createtag');//添加标签
    Route::any('dotag','examController@dotag');//处理添加标签
    Route::any('fanslist/{id}','examController@fanslist');//粉丝列表
    Route::any('maketag','examController@maketag');//给粉丝打标签
    Route::any('tagfans/{id}','examController@tagfans');//改标签下的粉丝列表
    Route::any('sendnews','examController@sendnews');//群发消息

});

/**
 * 2.19.9.24 消息回复 生成菜单 授权登录
 */
//Route::prefix('lesson')->namespace('wechat')->group(function () {
//    Route::any('backinfo','lessonController@backinfo');//关注回复
//});

/**code
 * 2019.9.26选课
 */
Route::prefix('choose')->namespace('wechat')->group(function () {
    Route::any('createmenu','ChooseController@createmenu');//生成新菜单
    Route::any('welogin_login','ChooseController@welogin_login');//授权登录
    Route::any('code','ChooseController@code');//授权登录
    Route::any('createlesson','ChooseController@createlesson');//添加课程


});
