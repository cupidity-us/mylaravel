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

Route::prefix('wechat')->group(function () {
	Route::get('get_access_token','WechatController@get_access_token');
	Route::get('get_wechat_access_token','WechatController@get_wechat_access_token');
	Route::get('get_user_index','WechatController@get_user_index');

});

Route::prefix('welogin')->group(function () {
	Route::get('login','WeloginController@login');
	Route::any('welogin_login','WeloginController@welogin_login');
	Route::any('code','WeloginController@code');
});

Route::prefix('file')->group(function () {
    Route::any('index','FileController@index');
    Route::any('fileup','FileController@fileup');

});
