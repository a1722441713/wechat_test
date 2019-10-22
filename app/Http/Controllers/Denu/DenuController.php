<?php
/**
 * Created by PhpStorm.
 * User: pyh
 * Date: 2019/10/19
 * Time: 17:39
 */

namespace App\Http\Controllers\Denu;

use App\Http\Controllers\Controller;

class DenuController extends Controller
{
    protected $app;
    public function __construct(){
        $this->app = app('wechat.official_account');
    }

    public function GetAll(){
        return $this->app->menu->list();
    }
    public function Create(){
        $buttons = [
            [
                "type" => "view",
                "name" => "历史记录",
                "url"  => "https://mp.weixin.qq.com/mp/profile_ext"
            ]
        ];
        $this->app->menu->create($buttons);
    }

    public function DelAll(){
        return $this->app->menu->delete();
    }

    public function Del($menu_id = null){
        return $this->app->menu->delete($menu_id);
    }
}