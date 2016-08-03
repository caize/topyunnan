<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"D:\phpStudy\WWW\cms\public/../application/mobile\view\active\vote\desc.html";i:1469437959;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\header.html";i:1469530133;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn" style="overflow: scroll;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>最云南-活动投票详情</title>
    <script src="/mobile/js/jquery.min.js"></script>
<script src="/mobile/js/script.js"></script>
<link rel="stylesheet" href="/mobile/css/font-awesome.min.css">
<link rel="stylesheet" href="/mobile/css/custom.css">
<script src="/mobile/layer/layer.js"></script>
<!-- Vue -->
<script src="/assets/vue/vue.js"></script>
<script src="/assets/vue/vue-validator.js"></script>
<script src="/assets/vue/vue-resource.js"></script>

    <link rel="stylesheet" href="/mobile/css/custom.css">
    <link href="/mobile/css/ionic.min.css" rel="stylesheet">
    <script src="/mobile/js/ionic.bundle.min.js"></script>
    <style>
    .popup {
        border-radius: 25px;
    }
    </style>
</head>

<body ng-app="myApp">
    <!-- 头部 -->
    <header class="zw_head">
    <div class="zwh_logo" onclick=window.location.href="<?php echo url('mobile/index/index'); ?>">
        <img src="<?php echo $con['mallLogo']; ?>" alt="">
    </div>
    <div class="zwh_menu" onclick="menulist()">
        <span style="margin-top:5px; ">菜单&nbsp;</span><img id="menubtn" src="/mobile/img/menu.png" alt="">
    </div>
</header>
<div class="zw_black" onclick="menulist()">
</div>
<div class="zwh_menulist">
    <div class="zwhml_a">
        <a href="<?php echo url('mobile/index/index'); ?>">首页</a>
    </div>
    <div class="zwhml_a">
        <a href="/mobile/active/index.html">活动</a>
    </div>
    <div class="zwhml_a">
        <a href="<?php echo url('mobile/article/index'); ?>">文章</a>
    </div>
    <div class="zwhml_a">
        <a href="<?php echo url('mobile/member/index'); ?>">个人中心</a>
    </div>
    <?php if(!session('userMember')): ?>
    <div class="zwhml_a">
        <a href="<?php echo url('mobile/base/login'); ?>">登录/注册</a>
    </div>
    <?php endif; ?>
</div>
    <div class="acttpdesc">
        <div class="silder" ng-controller="SlideController">
            <ion-slide-box active-slide="myActiveSlide">
                <?php if(is_array($compete['gallery']) || $compete['gallery'] instanceof \think\Collection): $i = 0; $__LIST__ = $compete['gallery'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <ion-slide><img src="<?php echo $vo['thumb']; ?>"></ion-slide>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ion-slide-box>
        </div>
        <h2 id="name"><?php echo $compete['name']; ?></h2>
        <div class="atd_t" ng-controller="PopupCtrl">
            <div class="tps">
                <p>共 <span>{{ticket}}</span> 票</p>
            </div>
            <div class="tpbtn" ng-click="showConfirm()">投一票</div>
            <input type="hidden" name="activeTitle" value="<?php echo $active['name']; ?>">
            <input type="hidden" name="competeId" value="<?php echo $compete['id']; ?>">
        </div>
        <div class="atd_con">
           <?php echo $compete['content']; ?>
        </div>
    </div>
    <script type="text/javascript">
    var clickone = <?php echo $vote; ?>;//0：可以投票   1：已投过1次   -1：不可点击
    var ticket = 1;
    var app = angular.module("myApp", ["ionic"]);
    // 轮播图
    app.controller('SlideController', function($scope) {
            $scope.myActiveSlide = 1;
        })
        .controller('PopupCtrl', function($scope, $ionicPopup, $ionicBackdrop, $timeout, $ionicLoading) {
            //  confirm 对话框
            $scope.name = $('#name').html();
            $scope.ticket = <?php echo $compete['ticket']; ?>>0?<?php echo $compete['ticket']; ?>:0;
            $scope.showConfirm = function() {
                if(<?php echo $ismid; ?>==0){
                    layer.msg('请先登录');
                    return;
                }
                if (clickone == 1) {
                   layer.msg('只能投票一次');
                    return;
                } else if (clickone == -1) {
                    return;
                }
                clickone = -1;

                $(".tpbtn").css("box-shadow", "0px 0px 1px #444");
                $(".tpbtn").css("margin-top", "6px");
                $timeout(function() {
                    var confirmPopup = $ionicPopup.confirm({
                        title: $("input[name ='activeTitle']").val(),
                        template: '<h5 style="text-align: center;">投我一票吧！</h5><p style="color:#666;text-align: center;font-size:18px;">'+$scope.name+'</p>',
                        buttons: [{ // Array[Object] (optional). Buttons to place in the popup footer.
                            text: '取消',
                            type: 'button-default',
                            onTap: function(e) {
                                clickone = 0;
                                console.log('再看看');
                                $(".tpbtn").css("box-shadow", "0px 6px 1px #444");
                                $(".tpbtn").css("margin-top", "0px");
                            }
                        }, {
                            text: '确定',
                            type: 'button-positive',
                            onTap: function(e) {
                                 $.ajax({
                                    type: "POST",
                                    url: '<?php echo url("mobile/vote/add"); ?>',
                                    dataType: 'json',
                                    cache: false,
                                    data: {competeId:$("input[name = 'competeId']").val(),ticket:ticket},
                                    success: function(data) {
                                        $ionicBackdrop.retain();
                                        //ajax回调
                                        $timeout(function() {
                                            if(data.status > 0){
                                                clickone = 1;
                                                $ionicLoading.show({
                                                    template: '投票成功'
                                                });
                                                $timeout(function() {
                                                    $ionicLoading.hide();
                                                    $ionicBackdrop.release();
                                                }, 800);
                                                $scope.ticket = $scope.ticket + ticket;
                                            }else{
                                                clickone = 0;
                                                $ionicLoading.show({
                                                    template: '投票失败'
                                                });
                                                $timeout(function() {
                                                        $ionicLoading.hide();
                                                $ionicBackdrop.release();
                                                $(".tpbtn").css("box-shadow","0px 6px 1px #444");
                                                $(".tpbtn").css("margin-top","0px");
                                                }, 800);                                                
                                            }   
                                        }, 800);
                                    },
                                    error: function(xhr, status, error) {
                                    }
                                });
                            }
                        }]
                    });
                }, 400);

            };
        });
    </script>
</body>

</html>
