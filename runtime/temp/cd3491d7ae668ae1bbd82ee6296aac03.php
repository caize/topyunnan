<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\phpStudy\WWW\cms\public/../application/mobile\view\article\detail.html";i:1469529099;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\header.html";i:1469530133;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title><?php echo $detail['title']; ?></title>
    <meta name="keyword" content="<?php echo $detail['keyword']; ?>" />
    <meta name="description" content="<?php echo $detail['description']; ?>" />
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
    <div class="zwa_con">
        <h1><?php echo $detail['title']; ?></h1>
        <h3>作者:<?php echo $detail['author']; ?>/日期:<?php echo $detail['time']; ?></h3>
        <!-- 富文本 -->
        <div class="zwa_conhtml">
            <div class="text clear" id="contentText">
                <p id="mpCover" > <img id="coverImg" src="<?php echo $detail['thumb']; ?>"> </p>
                <p><?php echo $detail['content']; ?></p>
            </div>
        </div>
    </div>
</body>

</html>
