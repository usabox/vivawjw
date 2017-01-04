<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimal-ui,user-scalable=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?php echo S_URL;?>css/index.css" rel="stylesheet">
    <script src="<?php echo S_URL;?>js/jquery-3.0.0.js"></script>
    <title>违法查询</title>
</head>
<?php  if($op == 'start') { ?>
<body>
<div class="content">
    <div class="content_box">
        <div class="ill_head">
            <div class="illegal show_car <?php  if($show == 'car') { ?>ill_current<?php  } ?>">
                <div class="ill_tit ">车辆违法查询</div>
            </div>
            <div class="illegal show_driving <?php  if($show == 'driving') { ?>ill_current<?php  } ?>">
                <div class="ill_tit">驾驶证违法查询</div>
            </div>
        </div>
        <div class="ill_query">
            <?php  if($show == 'car') { ?>
            <div class="query_box">
                <div class="car_style">
                    <div>车辆类型</div>
                    <select name="cartype">
                        <option value="1">小型车辆</option>
                        <option value="2">大型车辆</option>
                    </select>
                </div>
                <div class="car_style">
                    <div>车牌号码</div>
                    <input type="text" name="carnum" id="car_number" value="苏B">
                </div>
                <div class="car_style">
                    <div>发动机号<br><a>(在哪里)</a></div>
                    <input type="text" name="enginenum" placeholder="请输入发动机号后六位" id="car_fa">
                </div>
                <a id="query">查询</a>
                <div class="query_word1">视频及外地违法图片请到各违法处理点查看</div>
                <div class="query_word2"><a href="" style="color: #2ecc71">查看我绑定车辆的违法信息</a></div>
            </div>
            <?php  } ?>
            <?php  if($show == 'driving') { ?>
            <div class="query_box">
                <div class="car_style">
                    <div>驾驶证编号</div>
                    <input type="text" name="drnunum" id="car_number1" placeholder="请输入驾驶证编号">
                </div>
                <div class="car_style">
                    <div>档案编号<br><a class="where">(在哪里)</a></div>
                    <input type="text" name="filenum" placeholder="请输入档案编号后六位" id="car_fa1">
                </div>
                <a id="query1">查询</a>
                <div class="query_word3">查看我绑定驾驶证的违法信息</div>
            </div>
            <?php  } ?>
        </div>
    </div>
</div>
<script>
    var process = false;
    $("#loading-fs").hide();
    $(function(){
        $('.show_car').click(function(){
            window.location.href = "<?php  echo $this->createMobileUrl('illegal',array('show'=>'car'))?>";
        });
        $('.show_driving').click(function(){
            window.location.href = "<?php  echo $this->createMobileUrl('illegal',array('show'=>'driving'))?>";
        });
        $('#query').click(function(){
            if(process)return false;
            var cartype = $("[name = 'cartype']").val();
            var carnum = $("[name = 'carnum']").val();
            var enginenum = $("[name = 'enginenum']").val();
            reg=/^苏B[0-9A-Z]{5}$/;
            if (!reg.test(carnum)){
                alert('请正确输入车牌号');return false;
            }
            if (enginenum == ''){
                alert('发动机号不能为空！');return false;
            }
            if(enginenum.length != 6){
                alert('发动机号码输入有误！');return false;
            }
            $("#loading-fs").show();
            $.post("",function(data){
                if (data){
                    window.location.href = "<?php  echo $this->createMobileUrl('illegal',array('op' => 'list','show'=>'car'))?>";
                }

            });
            process = true;
        });
        $('#query1').click(function(){
            if(process)return false;
            var drnunum = $("[name = 'drnunum']").val();
            var filenum = $("[name = 'filenum']").val();
            if (drnunum == ''){
                alert('发动机号不能为空！');return false;
            }
            if (filenum == ''){
                alert('发动机号不能为空！');return false;
            }
            if(filenum.length != 6){
                alert('发动机号码输入有误！');return false;
            }
            $("#loading-fs").show();
            $.post("",function(data){
                if (data){
                    window.location.href = "<?php  echo $this->createMobileUrl('illegal',array('op'=>'list','show'=>'driving'))?>";
                }
            });
            process = true;
        });
    });
</script>
<div id="loading-fs">
    <div><i id="loadanim"></i><span>提交数据中，请稍后 ...</span></div>
</div>
</body>
<?php  } ?>
<?php  if($op == 'list') { ?>
<body style="background-color:#eeeeee;">
<div class="content">
    <div class="content_box">
        <div class="ill_head">
            <div class="illegal show_car <?php  if($show == 'car') { ?>ill_current<?php  } ?>">
                <div class=" ill_tit ">车辆违法查询</div>
            </div>
            <div class="illegal show_driving <?php  if($show == 'driving') { ?>ill_current<?php  } ?>">
                <div class="ill_tit">驾驶证违法查询</div>
            </div>
        </div>

        <div class="ill_query">
            <?php  if($show == 'car') { ?>
            <div class="query_box">
                <div class="license">
                    <div class="licen_img">
                        <img src="<?php echo S_URL;?>img/lisence.png">
                        <div>苏BV286Z</div>
                    </div>
                    <div class="licen_mon">共<span>9</span>条违法信息<br>罚款<span>950</span>元</div>
                </div>

                <div style="margin-top:18px;">
                    <div class="query_info">
                        <div class="query_info1">
                            <div class="arrow_left"><img src="<?php echo S_URL;?>img/jiant.png"></div>
                            <div class="info_right">
                                <a href="<?php  echo $this->createMobileUrl('wxappeal')?>" class="shensu">申诉</a>
                                <div class="chu" data-to='0'>
                                    <div>违法时间:<span>2016-11-12 17:40</span></div>
                                    <div>违法地点:<span>新334省道宁通高速大桥东新334省道宁通高速大桥</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="info_detail hide"  >
                            <div class="detail_box">
                                <div>违法行为:<span>驾驶中型以上载客载货汽车、校车、危险物品运输车辆以外的其他机动车行驶超过规定时速20%以上未达到50%的</span></div>
                                <div>违法图片:<span>视频及外地违法图片请到各违法处理点查看</span></div>
                                <div>处理状态:<span>未处理</span></div>
                                <div>罚款金额:<span>200元</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="query_info">
                        <div class="query_info1" >
                            <div class="arrow_left"><img src="<?php echo S_URL;?>img/jiant.png"></div>
                            <div class="info_right">
                                <a href="<?php  echo $this->createMobileUrl('wxappeal')?>" class="shensu">申诉</a>
                                <div class="chu" data-to='0'>
                                    <div>违法时间:<span>2016-11-12 17:40</span></div>
                                    <div>违法地点:<span>新334省道宁通高速大桥东新334省道宁通高速大桥</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="info_detail hide"  >
                            <div class="detail_box">
                                <div>违法行为:<span>驾驶中型以上载客载货汽车、校车、危险物品运输车辆以外的其他机动车行驶超过规定时速20%以上未达到50%的</span></div>
                                <div>违法图片:<span>视频及外地违法图片请到各违法处理点查看</span></div>
                                <div>处理状态:<span>未处理</span></div>
                                <div>罚款金额:<span>200元</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="query_word4"><a href="<?php  echo $this->createMobileUrl('illegal',array('op'=>'start'))?>" style="color: #2ecc71">查询其他车辆违法信息</a></div>
            </div>
            <div class="binding">
                <div class="binding_box">
                    <a href="" class="plus" style="text-decoration: none">&#xe616;</a>
                    <div>绑定该车辆，接收违法通知</div>
                    <div class="close"><i>&#xe611;</i></div>
                </div>
            </div>
            <?php  } ?>
            <?php  if($show == 'driving') { ?>
            <div class="query_box" style="background-color: white;">
                <div class="driv_info">驾驶员信息</div>
                <div class="illegal_box">
                    <div class="ill_score">
                        <div>累计计分</div>
                        <div>0</div>
                    </div><div class="ill_score">
                    <div>准驾车型</div>
                    <div>C1</div>
                </div>
                    <div class="ill_score">
                        <div>有效时间起</div>
                        <div>2016-5-20</div>
                    </div>
                    <div class="ill_score">
                        <div>有效时间止</div>
                        <div>2026-5-20</div>
                    </div>
                    <div class="ill_score">
                        <div>状态</div>
                        <div>正常</div>
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.show_car').click(function(){
            window.location.href = "<?php  echo $this->createMobileUrl('illegal',array('op'=>'list', 'show'=>'car'))?>";
        });
        $('.show_driving').click(function(){
            window.location.href = "<?php  echo $this->createMobileUrl('illegal',array('op'=>'list','show'=>'driving'))?>";
        });


        $('.chu').click(function(){
            if($(this).data('to') == 0){
                $(this).data('to',1);
                $(this).parents('.query_info1').siblings('.info_detail').show();
                /*$(this).siblings('.info_detail').show().parent().siblings().find('.info_detail').hide();*/
                $(this).parents('.query_info1').find('.arrow_left img').css('transform','rotate(180deg)');
            }else{
                $(this).data('to',0);
                $(this).parents('.query_info1').siblings('.info_detail').hide();
                $(this).parents('.query_info1').find('.arrow_left img').css('transform','rotate(0deg)');
            }
        })


        $('.close').click(function(){
            $('.binding').hide();
        });
    });
</script>
</body>
<?php  } ?>
</html>
