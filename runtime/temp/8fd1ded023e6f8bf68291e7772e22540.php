<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\member\index.html";i:1469521901;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>个人中心</title>
    <script src="/mobile/js/jquery.min.js"></script>
<script src="/mobile/js/script.js"></script>
<link rel="stylesheet" href="/mobile/css/font-awesome.min.css">
<link rel="stylesheet" href="/mobile/css/custom.css">
<script src="/mobile/layer/layer.js"></script>
<!-- Vue -->
<script src="/assets/vue/vue.js"></script>
<script src="/assets/vue/vue-validator.js"></script>
<script src="/assets/vue/vue-resource.js"></script>

    <style type="text/css">
        .zwu_img img {
            border-radius: 100px;
            height: 70px;
            width: 70px;
        }
    </style>
</head>

<body id="member">
    <!-- 头部 -->
    <div class="zwu_black" onclick="menulistuser()">
    </div>
    <div class="zwhu_menulist">
        <div class="zwhml_a">
            <a href="<?php echo url('mobile/index/index'); ?>">首页</a>
        </div>
        <div class="zwhml_a">
            <a href="/mobile/active/index.html">活动</a>
        </div>
        <div class="zwhml_a">
            <a href="<?php echo url('mobile/article/index'); ?>">文章</a>
        </div>
    </div>
    <header class="zwu_head">
        <img class="zwu_headbg" src="/mobile/img/u.png" alt="">
        <div class="zwu_headmenu">
            <div class="zwu_indexbtn" onclick=window.location.href='<?php echo url("mobile/index/index"); ?>'>
                <i class="fa fa-home fa-fw"></i>首页
            </div>
            <div class="zwu_menubtn" onclick="menulistuser()">
                菜单<i class="fa fa-navicon fa-fw"></i>
            </div>
        </div>
        <div class="zwu_img">
            <div>
                <img src="<?php echo $user['auth']; ?>" alt="">
                <h4><?php echo $user['name']; ?></h4>
            </div>
        </div>
    </header>

    <!-- 内容区 -->
    <div class="zwu_con">
        <div class="zwuc_gns">
            <div class="zwuc_gn" onclick=window.location.href="<?php echo url('mobile/member/setting'); ?>">
                <img src="/mobile/img/uset.png" alt="">
                <h2>账户设置</h2>
            </div>
            <div class="zwuc_gn" onclick=window.location.href="<?php echo url('mobile/member/vote'); ?>">
                <img src="/mobile/img/utp.png" alt="">
                <h2>我的投票</h2>
            </div>
            <div class="zwuc_gn" onclick=window.location.href="<?php echo url('mobile/member/apply'); ?>">
                <img src="/mobile/img/ubm.png" alt="">
                <h2>我的报名</h2>
            </div>
        </div>
        <div class="zwuc_loginout">
            <button type="" @click="lgout()">退出登录</button>
        </div>
    </div>
</body>
<script>
   var vn = new Vue({
    el: '#member',
    methods: {
      lgout: function(){
        layer.open({
            content: '你是否登出？',
            btn: ['确认', '取消'],
            shadeClose: true,
            yes: function(){
                window.location.href = '<?php echo url("mobile/member/lgout"); ?>';
            }, no: function(){
                layer.msg('取消');
            }
        });
      },
    }
  })
</script>
</html>
