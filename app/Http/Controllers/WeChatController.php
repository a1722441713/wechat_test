<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Kernel\Messages\Message;
use Log;
use App\Http\Controllers\Reply\NovelLink;

class WeChatController extends Controller
{
    protected $reply;

    public function __construct(){
        $this->reply = new NovelLink();
    }
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        $app = app('wechat.official_account');
        //$message类型取决于配置文件中的类型
        $app->server->push(function($message){
//            return "欢迎关注小旅，小旅会认真推荐小诗给你呦";

            switch ($message['MsgType']) {
                case 'event':
//                    return '收到事件消息';
                    return "欢迎关注小旅，小旅会认真推荐小诗给你呦";
                    break;
                case 'text':
                    return$str = $this->reply->Find($message['Content']);
                    break;
//                case 'image':
//                    return '收到图片消息';
//                    break;
//                case 'voice':
//                    return '收到语音消息';
//                    break;
//                case 'video':
//                    return '收到视频消息';
//                    break;
//                case 'location':
//                    return '收到坐标消息';
//                    break;
//                case 'link':
//                    return '收到链接消息';
//                    break;
//                case 'file':
//                    return '收到文件消息';
//                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });
//        $app->server->push(ImageMessageHandler::class, Message::TEXT);
//        $app->server->push(function($message) {
//            return "欢迎关注小旅，小旅会认真推荐小诗给你呦";
//        });
        //发送给服务的是是最后一个handler (处理程序)
        return $app->server->serve();
    }
}
