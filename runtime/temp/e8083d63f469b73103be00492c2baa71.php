<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"D:\phpStudy\WWW\cms\public/../application/mobile\view\index\index.html";i:1469529522;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\header.html";i:1469530133;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\footer.html";i:1469529259;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title><?php echo $con['mallName']; ?></title>
    <meta name="keywords" content="<?php echo $con['mallKeywords']; ?>" />
    <meta name="description" content="<?php echo $con['mallDesc']; ?>" />
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
    <div class="zw_content">
        <div class="zwc_banner">
            <?php if(is_array($ad) || $ad instanceof \think\Collection): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <img src="<?php echo $vo['file']; ?>" alt="<?php echo $vo['name']; ?>">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- 近期活动 -->
        <div class="zwc_arts">
            <div class="zwcs_head">
                <div class="zwcs_headt">
                    近期活动
                </div>
                <div class="zwcs_more">
                    <a href="<?php echo url('mobile/active/index'); ?>">
                      更多&nbsp;<i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="zwcs_list">
              <?php if(is_array($actives) || $actives instanceof \think\Collection): $i = 0; $__LIST__ = $actives;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="zwcs_cs">
                <!-- type = 1 报名  type = 2 投票 -->
                    <?php if($vo['type'] == 1): ?>
                        <div onclick=window.location.href="<?php echo url('/mobile/index/toApply',['id'=>$vo['id']]); ?>">
                            <img src="<?php echo $vo['thumb']; ?>" alt="">
                            <p><?php echo $vo['name']; ?></p>
                        </div>
                    <?php endif; if($vo['type'] == 2): ?>
                        <div onclick=window.location.href="<?php echo url('/mobile/index/toVote',['id'=>$vo['id']]); ?>">
                            <img src="<?php echo $vo['thumb']; ?>" alt="">
                            <p><?php echo $vo['name']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
             <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <!-- 热门文章 -->
        <div class="zwc_arts">
            <div class="zwcs_head">
                <div class="zwcs_headt">
                    热门文章
                </div>
                <div class="zwcs_more">
                    <a href="<?php echo url('mobile/article/index'); ?>">
                        更多&nbsp;<i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="zwcs_list">
              <?php if(is_array($articles) || $articles instanceof \think\Collection): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="zwcs_cs">

                    <div onclick=window.location.href="<?php echo url('mobile/article/detail',['id'=>$vo['id']]); ?>">
                        <img src="<?php echo $vo['thumb']; ?>" alt="">
                        <p><?php echo $vo['title']; ?></p>
                    </div>
                </div>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="zwc_ewm">
    <h5>关注我们</h5>
    <img src="/mobile/img/ewm.png" alt="">
    <h5>打开微信“扫一扫”添加</h5>
    <h5>或长安图片识别二维码</h5>
</div>
<footer class="zwc_foot">
    <p><a href="<?php echo url('mobile/page/index',['title'=>'联系我们']); ?>">联系我们</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo url('mobile/page/index',['title'=>'关于我们']); ?>">关于我们</a></p>
    <p><?php echo $con['mallFooter']; ?></p>
</footer>
    </div>
</body>
</html>
