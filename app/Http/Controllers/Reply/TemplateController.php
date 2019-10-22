<?php

namespace App\Http\Controllers\Reply;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    protected $app;
    public function __construct(){
        $this->app = app('wechat.official_account');
    }
    //
    public function GetAll(){
        return $this->app->template_message->getPrivateTemplates();
    }
    //支付成功
    public function SendTemPayment($user_id = null){
        $this->app->template_message->send([
            'touser' => $user_id,
            'template_id' => 'rljBHTru2dpo9cSy_-0K9bNuFLSrB-IneniuRWmYu-g',
            'data' => [
                'keyword1' => date('y-m-d h:i:s',time()),
            ],
        ]);
    }
    public function DelTem($tem_id){
        return $this->app->template_message->deletePrivateTemplate($tem_id);
    }

}
