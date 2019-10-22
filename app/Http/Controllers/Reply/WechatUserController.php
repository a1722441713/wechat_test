<?php

namespace App\Http\Controllers\Reply;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WechatUserController extends Controller
{
    protected $app;
    public function __construct(){
        $this->app = app('wechat.official_account');
    }

    public function GetUser($user_id = null){
        return $this->app->user->get($user_id);
    }

    public function GetUserNickname($user_id){
        return $this->GetUser($user_id)['nickname'];
    }

    public function GetUserAll(){
        return $this->app->user->list();
    }

    public function GetUserCount(){
        return $this->GetUserAll()['count'];
    }

    public function GetBlockAllUser(){
        return $this->app->user->blacklist();
    }

    public function SetBlockUser($user_id = null){
        return $this->app->user->block($user_id);
    }

    public function SetUnBlockUser($user_id = null){
        return $this->app->user->unblock($user_id);
    }
}
