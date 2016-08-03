<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\active\index.html";i:1469529642;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\header.html";i:1469530133;}*/ ?>
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

<body id="aList">
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
    <div class="zwvl_con">
            <?php if(is_array($ad) || $ad instanceof \think\Collection): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <img class="zwvl_conimg" src="<?php echo $vo['file']; ?>" alt="<?php echo $vo['name']; ?>">
            <?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="zwvl_actts">
            <div class="zwvl_actt">
                <div class="en">
                    <h4>ALL ACTIVITY</h4>
                </div>
                <div class="ch">
                    全部活动
                </div>
            </div>
            <div class="zwvl_actmenu">
                <img id="actlist" src="/mobile/img/223.png" alt="">
                <div class="zwvl_menus" style="display: none">
                    <ul>
                        <li><a @click="pageApply(page,1)">报名活动</a></li>
                        <li><a @click="pageApply(page,2)">投票活动</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="zwvl_list">
            <div class="zwvl_item"  v-for="vo in list">
                <div class="zwvl_itemc">
                    <img v-bind:src="vo.thumb" alt="">
                    <h4>{{vo.name}}</h4>
                    <a href="/mobile/index/toApply/id/{{vo.id}}.html">
                        <div class="xz " v-if="vo.type == 1">
                            +&nbsp;报名
                        </div>
                    </a>
                    <a href="/mobile/index/toVote/id/{{vo.id}}.html">
                        <div class="xz "  v-if="vo.type == 2">
                            去投票
                        </div>
                    </a>
                </div>
            </div>
            <div class="zwvl_item" style="clear:both;width:100%;text-align: center;display: none" id="loadmore">
                <div  style="margin:5px auto;">
                    <i class="fa fa-spin fa-spinner" style="font-size: 20px"></i>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){ 
            $(".zwvl_item:nth-child(2n+1)").each(function(){
                var a1 = $(this);
                var a2 = $(this).next();
                var h1 = a1.height();
                var h2 = a2.height();
                if(h1>h2){
                    a2.find(".xz").css("margin-top",h1-h2+5);
                }else if(h1<h2){
                    a1.find(".xz").css("margin-top",h2-h1+5);
                }
            });
        });
        $("#actlist").click(function(){
            $(".zwvl_menus").toggle(200);
        });
        $(document).ready(function() {
            $(window).scroll(function() {
                $(".zwvl_menus").hide();
                if(vn.busy==false){
                    $("#loadmore").show(500);
                }
                if ($(document).scrollTop() >= $(document).height() - $(window).height()) {
                    vn.pageData(++vn.page,vn.type);
                }
            });
        });
        var vn = new Vue({
            el: '#aList',
            data:{
                list:[],
                page:0,
                busy:false,
                type:'',
                isT:false,
            },
            created:function(){
                if(this.busy==false){
                    $("#loadmore").show(500);
                };
                this.pageData(this.page,this.type);
            },
            methods: {
                // 监听网页滚动到底部
                // 获取一页数据
                pageData:function(page,type) {
                   $.ajax({
                        type: "POST",
                        url: '<?php echo url("mobile/active/index"); ?>',
                        dataType: 'json',
                        cache: false,
                        data:{page:page,type:type},
                        success: function(data) {
                            if(data == ''){
                                $("#loadmore").hide();
                                vn.busy = false;
                            }else{
                                setTimeout(function(){
                                    vn.busy = true;
                                    vn.list = vn.list.concat(data);
                                }, 2000);
                            }
                        },
                        error: function(xhr, status, error) {
                        console.log('系统错误');
                        }
                    }); 
                },
                pageApply:function(page,type){
                    this.$set('page',0);
                    this.$set('type',type);
                    this.$set('list',[]);
                    this.pageData(this.page,this.type); 
                }
            }
        })
    </script>
</body>

</html>
