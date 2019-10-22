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

Route::get('/', function () {
    return view('welcome');
});
// 微信认证的相关路由
Route::any('/wechat', 'WeChatController@serve');
//OAuth
Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/wechat/user', function () {
        $user = session('wechat.oauth_user.default'); // 拿到授权用户资料
        dd($user);
    })->name('wechat.user.message');
});
//SendTemplate -- Successful payment
// URL:sendTemplate/ouoAe1aSk9TTOGj74KBQcMpv7PHA
Route::get('/sendTemplate/{user_id}','Reply\TemplateController@SendTemPayment')->name('Template.message.send');

Route::get('/alluser','WechatUserController@GetUserAll')->name('Wechat.alluser.message');
Route::get('/allblockuser','WechatUserController@GetBlockAllUser')->name('Wechat.allblockuser.message');
Route::get('/setblockuser/{user_id}','WechatUserController@SetBlockUser')->name('Wechat.setblockuser');
Route::get('/setunblockuser/{user_id}','WechatUserController@SetUnBlockUser')->name('Wechat.setunblockuser');

Route::post('/storelink','Reply\LinkController@LinkStore')->name('link.store');



Route::any('/test','Denu\DenuController@GetAll')->name('test');
Route::any('/test1','Denu\DenuController@DelAll')->name('test1');
Route::any('/test2','Denu\DenuController@Create')->name('test2');

Route::any('/test_1',function (){
    return view('jssdk');
});

