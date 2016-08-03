<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\article\index.html";i:1469527908;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\header.html";i:1469530133;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>最云南-文章列表</title>
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
    <div class="zwal_con">
        <div class="zwal_serch">
            <input type="text" onblur="closesearch()" onclick="search()" v-model="title"/>
            <div id="zwal_serchsm" onclick="search()">
                <h5> <i class="fa fa-search" ></i>搜索文章</h5>
            </div>
        </div>
        <div class="zwal_serchbtn" @click="pageData(page,title)">
            <button><i class="fa fa-search"></i>搜一搜</button>
        </div>
        <div class="zwal_item" v-for="vo in list">
            <a href="/mobile/article/detail/id/{{vo.id}}.html">
                <img v-bind:src="vo.thumb" alt="">
                <div class="zwal_itemt">
                    <h2>{{vo.title}}</h2>
                    <p>{{vo.description}}</p>
                </div>
            </a>
        </div>
        <div id="loadmore">
            <i id="loadmore_i" class="fa fa-spin fa-spinner" style="font-size: 20px"></i>
        </div>
    </div>
    <script type="text/javascript" >
        function search(){
            $(".zwal_serchbtn").fadeIn();
            $("#zwal_serchsm").hide();
        }
        function closesearch(){
            $(".zwal_serchbtn").fadeOut();
            $("#zwal_serchsm").show();
        }
        $(document).ready(function() {
            $(window).scroll(function() {
                if(vn.busy==false){
                    $("#loadmore").show(500);
                }
                if ($(document).scrollTop() >= $(document).height() - $(window).height()) {
                    // alert("滚动条已经到达底部为" + $(document).scrollTop());
                    if(vn.isP==false){
                        vn.pageData(++vn.page,vn.title)
                        vn.busy = false;
                    }else{
                        $("#loadmore").hide();                        
                    }
                }
            });
        });
        var vn = new Vue({
            el: '#aList',
            data:{
                list:[],
                page:0,
                busy: false,
                title:'',
                isT:false,
                isP:false
            },
            created:function(){
                if(this.busy==false){
                    $("#loadmore").show(500);
                }
                this.pageData(this.page,this.title);
            },
            methods: {
                // 监听网页滚动到底部
                // 获取一页数据
                pageData: function(page,title) {
                    if(this.title){
                        if(this.isT == true){
                            this.$set('page',0);
                            this.$set('list',[]);
                            this.$set('isT',false);
                        }
                    }else{
                        this.$set('isT',true);
                    }                                           
                    $.ajax({
                        type: "POST",
                        url: '<?php echo url("mobile/article/index"); ?>',
                        dataType: 'json',
                        cache: false,
                        data:{page:this.page,title:this.title},
                        success: function(data) {
                            if(data==''){ 
                                vn.$set('isP',true);
                                $("#loadmore").hide();                          
                            }else{
                                setTimeout(function(){
                                    vn.busy = true; 
                                    vn.list = vn.list.concat(data);
                                }, 2000);
                                vn.$set('isP',false);                                
                            }              
                        },
                        error: function(xhr, status, error) {
                            console.log('系统错误');
                        }
                    }); 
                }
            }
        })
    </script>
</body>

</html>
