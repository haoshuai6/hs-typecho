<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="telephone=no" name="format-detection" />
    <title>p051demo</title>
    <link href="css/HTp-style.css" rel="stylesheet" type="text/css" />
    <link href="css/JSCSS.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<form id="user_form" action=""  method="post">
<div class="wrap2">
    <div class="tab">
        <div class="selectxq">
            <ul class="weekbar menu">
                <?php $weekarray = array("日","一","二","三","四","五","六"); ?>
                <li class="active">
                    <p>今天<?php echo "星期".$weekarray[date("w")];?><span class="timefull"></span></p>
                    <p><?php echo date('m-d',time());?></p>
                </li>
                <li>
                    <p><?php echo "星期".$weekarray[date("w",strtotime('+1 days'))];?></p><p><?php echo date('m-d',strtotime("+1 day"));?></p>
                </li>
                <li><p><?php echo "星期".$weekarray[date("w",strtotime('+2 days'))];?></p><p><?php echo date('m-d',strtotime("+2 day"));?></p></li>
                <li><p><?php echo "星期".$weekarray[date("w",strtotime('+3 days'))];?></p><p><?php echo date('m-d',strtotime("+3 day"));?></p></li>
                <li><p><?php echo "星期".$weekarray[date("w",strtotime('+4 days'))];?></p><p><?php echo date('m-d',strtotime("+4 day"));?></p></li>
                <li><p><?php echo "星期".$weekarray[date("w",strtotime('+5 days'))];?></p><p><?php echo date('m-d',strtotime("+5 day"));?></p></li>
                <li><p><?php echo "星期".$weekarray[date("w",strtotime('+6 days'))];?></p><p><?php echo date('m-d',strtotime("+6 day"));?></p></li>
                <li><p><?php echo "星期".$weekarray[date("w",strtotime('+7 days'))];?></p><p><?php echo date('m-d',strtotime("+7 day"));?></p></li>
            </ul>
        </div>
        <div class="tab1">
            <div class="con1">
                <dl class="con-dl">
                    <dd><a href="#">8-9</a></dd>
                    <dd><a href="#">9-10</a></dd>
                    <dd><a href="#">10-11</a></dd>
                    <dd><a href="#">11-12</a></dd>
                    <dd><a href="#">12-13</a></dd>
                    <dd><a href="#">13-14</a></dd>
                    <dd><a href="#">14-15</a></dd>
                    <dd><a href="#">15-16</a></dd>
                    <dd><a href="#">16-17</a></dd>
                    <dd><a href="#">17-18</a></dd>
                </dl>
            </div>
            <div class="con2">
                <dl class="con-dl">
                    <dd><a href="#">8-9</a></dd>
                    <dd><a href="#">9-10</a></dd>
                    <dd><a href="#">10-11</a></dd>
                    <dd><a href="#">11-12</a></dd>
                    <dd><a href="#">12-13</a></dd>
                    <dd><a href="#">13-14</a></dd>
                    <dd><a href="#">14-15</a></dd>
                    <dd><a href="#">15-16</a></dd>
                    <dd><a href="#">16-17</a></dd>
                    <dd><a href="#">17-18</a></dd>
                </dl>
            </div>
            <div class="con3">
                <dl class="con-dl">
                    <dd><a href="#">8-9</a></dd>
                    <dd><a href="#">9-10</a></dd>
                    <dd><a href="#">10-11</a></dd>
                    <dd><a href="#">11-12</a></dd>
                    <dd><a href="#">12-13</a></dd>
                    <dd><a href="#">13-14</a></dd>
                    <dd><a href="#">14-15</a></dd>
                    <dd><a href="#">15-16</a></dd>
                    <dd><a href="#">16-17</a></dd>
                    <dd><a href="#">17-18</a></dd>
                </dl>
            </div>
            <div class="con4">
                <dl class="con-dl">
                    <dd><a href="#">8-9</a></dd>
                    <dd><a href="#">9-10</a></dd>
                    <dd><a href="#">10-11</a></dd>
                    <dd><a href="#">11-12</a></dd>
                    <dd><a href="#">12-13</a></dd>
                    <dd><a href="#">13-14</a></dd>
                    <dd><a href="#">14-15</a></dd>
                    <dd><a href="#">15-16</a></dd>
                    <dd><a href="#">16-17</a></dd>
                    <dd><a href="#">17-18</a></dd>
                </dl>
            </div>
            <div class="con5">
                <dl class="con-dl">
                    <dd><a href="#">8-9</a></dd>
                    <dd><a href="#">9-10</a></dd>
                    <dd><a href="#">10-11</a></dd>
                    <dd><a href="#">11-12</a></dd>
                    <dd><a href="#">12-13</a></dd>
                    <dd><a href="#">13-14</a></dd>
                    <dd><a href="#">14-15</a></dd>
                    <dd><a href="#">15-16</a></dd>
                    <dd><a href="#">16-17</a></dd>
                    <dd><a href="#">17-18</a></dd>
                </dl>
            </div>
            <div class="con6">
                <dl class="con-dl">
                    <dd><a href="#">8-9</a></dd>
                    <dd><a href="#">9-10</a></dd>
                    <dd><a href="#">10-11</a></dd>
                    <dd><a href="#">11-12</a></dd>
                    <dd><a href="#">12-13</a></dd>
                    <dd><a href="#">13-14</a></dd>
                    <dd><a href="#">14-15</a></dd>
                    <dd><a href="#">15-16</a></dd>
                    <dd><a href="#">16-17</a></dd>
                    <dd><a href="#">17-18</a></dd>
                </dl>
            </div>
            <div class="con7">
                <dl class="con-dl">
                    <dd><a href="#">8-9</a></dd>
                    <dd><a href="#">9-10</a></dd>
                    <dd><a href="#">10-11</a></dd>
                    <dd><a href="#">11-12</a></dd>
                    <dd><a href="#">12-13</a></dd>
                    <dd><a href="#">13-14</a></dd>
                    <dd><a href="#">14-15</a></dd>
                    <dd><a href="#">15-16</a></dd>
                    <dd><a href="#">16-17</a></dd>
                    <dd><a href="#">17-18</a></dd>
                </dl>
            </div>
            <div class="con8">
                <dl class="con-dl">
                    <dd><a href="#">8-9</a></dd>
                    <dd><a href="#">9-10</a></dd>
                    <dd><a href="#">10-11</a></dd>
                    <dd><a href="#">11-12</a></dd>
                    <dd><a href="#">12-13</a></dd>
                    <dd><a href="#">13-14</a></dd>
                    <dd><a href="#">14-15</a></dd>
                    <dd><a href="#">15-16</a></dd>
                    <dd><a href="#">16-17</a></dd>
                    <dd><a href="#">17-18</a></dd>
                </dl>
            </div>
        </div><!--tab1 end-->
    </div><!--tab end-->
      <div class="tabzs">选中只能从左向右(从右向左)，依次选中，不可间隔选中<br />取消选中，也是依次取消选中。</div>
    <div class="xd-but"><a href="JavaScript:void(0);" id="submitBtn">返回</a></div>
</div><!--wrap2-->
</form>
<script type="text/javascript">
    $(function(){
        $('.tab ul.menu li').click(function(){
            //获得当前被点击的元素索引值
            var Index = $(this).index();
            //给菜单添加选择样式
            $(this).addClass('active').siblings().removeClass('active');
            //显示对应的div
            $('.tab1').children('div').eq(Index).show().siblings('div').hide();
        });

        $(".con-dl dd").click(function(){
            if(!$(this).hasClass("ddb_select")){
               if($(this).siblings().hasClass("ddb_select")) {
                     if ($(this).prev().hasClass("ddb_select")) {
                         $(this).addClass("ddb_select");
                     }else if($(this).next().hasClass("ddb_select")){
                         $(this).addClass("ddb_select");
                     }
               }else{
                   $(this).addClass("ddb_select");
               }
            }else{
                if (!$(this).prev().hasClass("ddb_select") || !$(this).next().hasClass("ddb_select")) {
                    $(this).removeClass("ddb_select");
                }
            }
        });

        $("#submitBtn").click(function () {
            var mydate = new Date();
            var month = $(".active p:last").text();
            var str = $(".ddb_select a").text();
            var m = str.split("-");
            //alert(m[m.length-1]);
            var start_stringTime = mydate.getFullYear()+'-'+month+" "+m[0]+':00:00';

            var start_timestamp= Date.parse(new Date(start_stringTime));
            start_timestamp = start_timestamp / 1000;

            var end_stringTime = mydate.getFullYear()+'-'+month+" "+m[m.length-1]+':00:00';

            var end_timestamp= Date.parse(new Date(end_stringTime));
            end_timestamp = end_timestamp / 1000;
            if (str.length != 0){
                //var path = document.referrer+'&start='+start_timestamp+'&end='+end_timestamp;
				var path = document.referrer;
                $('#user_form').attr("action", path).submit();
            
            }else{
                var path = document.referrer;
                $('#user_form').attr("action", path).submit();
            }
        });
    });
    function submitForm() {
        document.getElementById("user_form").submit();
    }
</script>
