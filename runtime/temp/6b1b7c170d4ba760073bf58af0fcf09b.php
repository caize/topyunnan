<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:77:"D:\phpStudy\WWW\cms\public/../application/mobile\view\active\apply\index.html";i:1469514877;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\header.html";i:1469530133;s:72:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\footer.html";i:1469529259;}*/ ?>
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
    <div class="zwvbm_con" id="apply">
        <div class="zwvbm_img">
            <img src="<?php echo $active['thumb']; ?>" alt="">
            <div class="zwvbm_imgbl">
                <img src="/mobile/img/bl.png" alt="">
            </div>
        </div>
        <div class="zwvbm_cform">
            <h1 class="bmtitle">
                <?php echo $active['name']; ?>
            </h1>
            <div class="bm_de">
                <h3>活动详情</h3>
                <p><?php echo $active['content']; ?></p>
            </div>
            <div class="bmcsq">
                <h2>-------------&nbsp;报名参赛&nbsp;-------------</h2>
            </div>
            <form class="bmform">
            <input type="hidden" name="active_id" v-model="user.active_id" value="<?php echo $active['id']; ?>">
                <div class="bmform_input">
                    <input type="text" placeholder="&nbsp;姓名" name="name" v-model="user.name">
                </div>
                <div class="bmform_input">
                    <input type="text" placeholder="&nbsp;手机" name="phone"  v-model="user.phone">
                </div>
                <div class="bmform_input">
                    <textarea placeholder="&nbsp;简介" name="content" v-model="user.content"></textarea>
                </div>
                <!-- 图片上传 -->
                <div class="bmimgs">
                </div>
                <div class="bmuploads">
                    <label class="bmupload">
                        <img src="/mobile/img/jia.png" alt="">
                        <input id="bmfile" type="file" hidden name="imgFile" />
                    </label>
                </div>
                <!-- 提交表单 -->
                <div class="bmformbtn">
                    <button type="button" @click="addApply()">提交/申请</button>
                </div>
                <p style="text-align: center;"><a href="">免责声明</a></p>
                <br>
                <br>
                <br>
            </form>
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
    <script type="text/javascript">
    var base64 = new Array(); //定义一数组
    window.onload = function() {
        var input = document.getElementById("bmfile");
        // var result = document.getElementById("result");
        if (typeof(FileReader) === 'undefined') {
            result.innerHTML = "抱歉，你的浏览器不支持 FileReader，请使用现代浏览器操作！";
            input.setAttribute('disabled', 'disabled');
        } else {
            input.addEventListener('change', readFile, false);
        }
    }
    function readFile() {
        var file = this.files[0];
        //这里我们判断下类型如果不是图片就返回 去掉就可以上传任意文件
        if (!/image\/\w+/.test(file.type)) {
            alert("请确保文件为图像类型");
            return false;
        }
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e) {
            base64 = this.result;
            var img = '<div class="bmimg"><img src="' + base64 + '" alt=""><div class="imgdel">X</div></div>';
            $(".bmimgs:last").append(img);
            // vn.user.gallery.push(base64);
        }
    }
    $(".bmimgs ").on("click", ".imgdel", function() {
        $(this).parent().remove();
    });
    var vn = new Vue({
            el: '#apply',
            data:{
                user:{gallery:[]}
            },
            created:function(){
            },
            methods: {
                addApply:function(){
                    if(<?php echo $isMid; ?>==0){
                        layer.msg('登录了,才可以报名');
                        return ;
                    }
                    if(<?php echo $isApply; ?>==1){
                        layer.msg('您已经报名过了');
                        return ;
                    }
                    jQuery.each(jQuery(".bmimgs img"), function(i, v){
                        vn.user.gallery.push(jQuery(this).attr("src"));
                    });
                    $.ajax({
                        type: "POST",
                        url: '<?php echo url("mobile/apply/apply"); ?>',
                        dataType: 'json',
                        cache: false,
                        data: this.user,
                        success: function(data) {
                            if(data.status > 0){
                                layer.msg('报名成功');
                                vn.$set('user',{});
                                $(".bmimgs ").html('');
                            }else{
                                layer.msg(data.msg);
                            }
                        }
                    })
                }
            }
        });
    </script>
</body>

</html>
