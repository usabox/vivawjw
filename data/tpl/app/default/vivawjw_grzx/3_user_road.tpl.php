<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimal-ui,user-scalable=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?php echo S_URL;?>css/style.css" rel="stylesheet">
    <script src="http://imgcdn.yimiaoxiao.com/jquery.min.js"></script>
    <title>关注路况</title>
</head>
<body style="background-color: #eeeeee;">
<div class="content">
    <div class="content_box">
        <div style=" background-color:white;">
            <div class="query_info">
                <div class="query_info1" data-to='0'>
                    <div class="arrow_left"><i>&#xe622;</i></div>
                    <div class="info_right">春申路北大街路口</div>
                    <button data-tt='0'>取消收藏</button>
                </div>

                <div class="info_detail hide"  >
                    <div class="detail_box" >
                        <div>注：图片每5分钟自动更新，图片加载较慢，请耐心等待</div>
                    </div>
                    <img style="display: none;" src="img/sy.jpg">
                </div>
            </div>

            <div class="query_info">
                <div class="query_info1" data-to='0'>
                    <div class="arrow_left"><i>&#xe622;</i></div>
                    <div class="info_right">贡湖大道金城路口</div>
                    <button data-tt='0'>取消收藏</button>
                </div>

                <div class="info_detail hide" >
                    <div class="detail_box">
                        <div>注：图片每5分钟自动更新，图片加载较慢，请耐心等待</div>
                    </div>
                    <img style="display: none;" src="img/sy.jpg">
                </div>
            </div>

        </div>
        <a id="feed_btn" href="">我要报路况</a>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('.query_info1').click(function(){
            if($(this).data('to') == 0){
                $(this).data('to',1);
                $(this).siblings('.info_detail').show();
                $(this).find('.arrow_left').css('transform','rotate(90deg)');

            }else{
                $(this).data('to',0);
                $(this).siblings('.info_detail').hide();
                $(this).find('.arrow_left').css('transform','rotate(0deg)');
            }
            return;
        });

        $('.query_info1 button').click(function(){
            if($(this).data('tt') == 0){
                $(this).data('tt',1);
                $(this).text('收藏');
                return false;
            }else{
                $(this).data('tt',0);
                $(this).text('取消收藏');
                return false;
            }

        })

    })
</script>
</body>
</html>
