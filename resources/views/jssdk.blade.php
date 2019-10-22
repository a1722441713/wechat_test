<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js" type="text/javascript"></script>
</head>
<body>
{{--<form>--}}
    {{--<input placeholder="昵称（必填）" required type="text">--}}
    {{--<input type="submit" value="提交评论">--}}
{{--</form>--}}
<input type="submit" onclick="wx.onMenuShareQQ()"  value="提交评论">
</body>
<script>
wx.config({
    debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: 'wx2461960d4fa53130', // 必填，公众号的唯一标识
    timestamp: timer() , // 必填，生成签名的时间戳
    nonceStr: 'poetry_brigade', // 必填，生成签名的随机串
    signature: 'poetry_brigade',// 必填，签名
    jsApiList: [] // 必填，需要使用的JS接口列表
    });
wx.error(function(res){
    alert('err')
});
wx.checkJsApi({
    jsApiList: ['chooseImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
    success: function(res) {
        alert()
    }
});
wx.onMenuShareQQ({
    title: '1111', // 分享标题
    desc: '2222', // 分享描述
    link: '3333', // 分享链接
    imgUrl: '1111', // 分享图标
    success: function () {
        alert('good')
    },
    cancel: function () {
        alert('faild')
    }
});
</script>
</html>