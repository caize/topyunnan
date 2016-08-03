<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"D:\phpStudy\WWW\cms\public/../application/mobile\view\active\vote\index.html";i:1469435986;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\header.html";i:1469530133;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>最云南</title>
    <script src="/mobile/js/jquery.min.js"></script>
<script src="/mobile/js/script.js"></script>
<link rel="stylesheet" href="/mobile/css/font-awesome.min.css">
<link rel="stylesheet" href="/mobile/css/custom.css">
<script src="/mobile/layer/layer.js"></script>
<!-- Vue -->
<script src="/assets/vue/vue.js"></script>
<script src="/assets/vue/vue-validator.js"></script>
<script src="/assets/vue/vue-resource.js"></script>

</head>

<body>
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
    <!-- 内容区 -->
    <div class="zwvbm_con">
        <div class="zwvbm_img">
            <img src="<?php echo $active['thumb']; ?>" alt="">
            <div class="zwvbm_imgbl">
                <img src="/mobile/img/bl.png" alt="">
            </div>
        </div>
        <div class="zwvbm_cform">
            <h1 class="bmtitle">
                快来投票了，最美景区
            </h1>
            <div class="bm_de">
               <?php echo $active['content']; ?>
            </div>
            <div class="bmcsq">
                <h2>-------------&nbsp;投 票 区&nbsp;-------------</h2>
            </div>
            <form class="tpform">
                <!-- 图片上传 -->
                <div class="tplist">
                  <?php if(is_array($compete) || $compete instanceof \think\Collection): $i = 0; $__LIST__ = $compete;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="tpitem">
                        <div class="tpimgbg" >
                            <a href="<?php echo url('mobile/Vote/index',['id'=>$vo['id']]); ?>">
                                <img src="<?php echo $vo['thumb']; ?>" alt="">
                            </a>
                            <!-- <img src="$vo.thumb" alt=""> -->
                        </div>
                        
                            <div class="tpdesc">
                                <div class="titletps">
                                    <h5 class=""><?php echo $vo['name']; ?></h5>
                                    <h6>共&nbsp;<?php echo $vo['ticket']; ?>&nbsp;票</h6>
                                </div>
                                <div class="btntp" onclick=window.location.href="<?php echo url('mobile/Vote/index',['id'=>$vo['id']]); ?>">
                                    投票
                                </div>
                            </div> 
                    </div>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
</body>
</html>
