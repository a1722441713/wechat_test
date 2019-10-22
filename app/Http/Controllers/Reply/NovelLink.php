<?php

namespace App\Http\Controllers\Reply;

use App\Models\NovelModel;

class NovelLink
{
    public function Find($title){
        $str = NovelModel::where('title', 'like', '%'.$title.'%')->first();
        if($title == '吴丹'){
            return '最最最喜欢你了，超喜欢你，爱你呦。（づ￣3￣）づ╭❤～';
        }
        if(is_null($str)){
            return 'ヾ(◍°∇°◍)ﾉﾞ小旅没有找到相关资源呢╮（╯＿╰）╭';
        }else{
            return "ヾ(◍°∇°◍)ﾉﾞ小旅为你找到相关资源啦。\n名称：".$str['title']."\n".'资源地址┏ (^ω^)=☞ '.$str['link']."\n".'不要忘记给小旅点个赞哦';
        }
    }
}