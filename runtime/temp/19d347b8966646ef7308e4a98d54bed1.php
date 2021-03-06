<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\phpStudy\WWW\cms\public/../application/mobile\view\member\psd.html";i:1469166266;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn" style="overflow: visible;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>会员-注册</title>
    <script src="/mobile/js/jquery.min.js"></script>
<script src="/mobile/js/script.js"></script>
<link rel="stylesheet" href="/mobile/css/font-awesome.min.css">
<link rel="stylesheet" href="/mobile/css/custom.css">
<script src="/mobile/layer/layer.js"></script>
<!-- Vue -->
<script src="/assets/vue/vue.js"></script>
<script src="/assets/vue/vue-validator.js"></script>
<script src="/assets/vue/vue-resource.js"></script>

    <link rel="stylesheet" type="text/css" href="/mobile/css/ionic.min.css">
    <style type="text/css" media="screen">
    .item-input{
      border: 0;
      border-bottom: 1px solid #ddd;
    }
    .sendyzm {
        border-radius: 0;
        height: 47px;
        background: #676BE5;
        text-align: center;
        color: #fff;
        line-height: 40px;
        width: 100px;
        border: 1px;
    }
    </style>
</head>

<body id="psd">
    <div class="content has-header" style="overflow: scroll;">
    <validator name="psdValidation">
        <div class="list list-inset" style="width:60%;float:left;">
            <label class="item item-input">
                <i class="icon ion-iphone placeholder-icon"></i>
                <input type="tel" placeholder="手机号" placeholder="手机号" v-validate:phone="{ required: true}" name="phone" v-model="user.phone">
            </label>
        </div>
        <button class="sendyzm list list-inset" @click="sendyzm()">
            <span id="sendyzm_s" v-text="sms"></span>
        </button >
        <div style="clear:both;"></div>
        <div class="list list-inset">
            <label class="item item-input">
                <i class="icon ion-ios-email-outline placeholder-icon"></i>
                <input type="text" name="codesms" placeholder="短信验证码" v-validate:codesms="{ required: true}" v-model="user.codesms">
            </label>
        </div>
        <div class="list list-inset">
            <label class="item item-input">
                <i class="icon ion-android-lock placeholder-icon"></i>
                <input type="password" name="password" placeholder="修改密码" v-validate:password="{ required: true, minlength:6, maxlength:12 }" v-model="user.password">
            </label>
        </div>
        <div style="clear:both;"></div>
        <div class="list list-inset" style="width:60%;float:left;">
            <label class="item item-input">
                <i class="icon ion-closed-captioning placeholder-icon"></i>
                <input type="text" name="code" placeholder="验证码" v-validate:code="{ required: true}" v-model="user.code">
            </label>
        </div>
        <div id="sendyzmimg" class="list list-inset" style="margin-top: 40px;">
            <img id="verify_img" src="<?php echo captcha_src(); ?>" alt="验证码" @click="refreshVerify()">
        </div>
        <div style="clear:both;"></div>
        <div id="btn_login" class="padding">
            <button :disabled="$psdValidation.invalid" class="button button-block" @click="psd()">重置新密码</button>
        </div>
    </validator>
    </div>
</body>
<script>
    'use strict';
    var vn = new Vue({
        el: '#psd',
        data: {
            user: {},
            msg:'',
            sms:'获取验证码',
            s:false,
        },
        methods: {
            refreshVerify: function(){
                var ts = Date.parse(new Date())/1000;
                $('#verify_img').attr("src", "/captcha?id="+ts);
            },
            sendyzm: function () {
                if(this.validation() != false){
                    if(this.s == false){
                        $.ajax({
                            type: "POST",
                            url: '<?php echo url("mobile/sms/send"); ?>',
                            dataType: 'json',
                            cache: false,
                            data: {phone:this.user.phone},
                            success: function(data) {
                                if(data.status == 0){
                                    var t = 60;
                                    var time = setInterval(function() {
                                        if (t > 0) {
                                            $('.sendyzm').css('background','#c9c9ce');
                                            vn.$set('sms',(t--)+'后重发');
                                            vn.$set('s',true);
                                        } else {
                                            window.clearInterval(time);
                                            $('.sendyzm').css('background','#676BE5');
                                            vn.$set('sms','重发验证码');
                                            vn.$set('s',false);
                                        }
                                    }, 1000);
                                }else{
                                    layer.msg(data.msg);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log('系统错误')
                            }
                        });
                    }
                }else{
                    layer.msg('手机号码错误');
                }

            },
            validation: function() {
                return /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/.test(this.user.phone)
            },
            psd: function(){
                $.ajax({
                    type: "POST",
                    url: '<?php echo url("mobile/Member/psd"); ?>',
                    dataType: 'json',
                    cache: false,
                    data: this.user,
                    success: function(data) {
                        layer.msg('修改成功');
                        window.location.href = '<?php echo url("mobile/base/login"); ?>';
                    },
                    error: function(xhr, status, error) {
                        console.log('系统错误')
                    }
                });
            }
        }
    })
</script>
</html>
