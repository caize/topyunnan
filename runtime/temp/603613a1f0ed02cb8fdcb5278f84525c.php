<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\member\apply.html";i:1469522903;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>我的报名</title>
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
        img {
            height: 70px;
            width: 100px;
        }
    </style>
</head>

<body style="background-color: #F4F4F4;" id="apply">
    <div class="userbm">
        <div class="userbm_list">
        <?php if(is_array($apply) || $apply instanceof \think\Collection): $i = 0; $__LIST__ = $apply;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="userbm_item">
                <div class="ubi_l">
                    <img src="<?php echo $vo['thumb']; ?>" alt="<?php echo $vo['name']; ?>">
                </div>
                <div class="ubi_r">
                    <div class="ubi_sta">
                        <span><?php echo $vo['ispass']; ?></span>
                    </div>
                    <div class="ubi_desc">
                        <p>活动：<?php echo $vo->parent[0]['name']; ?></p>
                        <p>开始时间：<?php echo $vo->parent[0]['start_time']; ?></p>
                        <p>结束时间：<?php echo $vo->parent[0]['end_time']; ?></p>
                    </div>
                    <div class="ubi_btn" onclick=window.location.href="<?php echo url('mobile/index/toApply',['id'=>$vo->parent[0]['id']]); ?>">
                        <div class="">详情</div>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <script>
    </script>
</body>
<script>
   var vn = new Vue({
    el: '#apply',
    methods: {
      delVote: function(id,cid,ticket){
        layer.open({
            content: '你取消投票？',
            btn: ['确认', '取消'],
            shadeClose: true,
            yes: function(index){
                $.ajax({
                    type: "POST",
                    url: '<?php echo url("mobile/member/delVote"); ?>',
                    dataType: 'json',
                    cache: false,
                    data: {id:id,cid:cid,ticket:ticket},
                    success: function(data) {
                          if(data.status > 0){
                            layer.msg('取消成功');
                            location.reload();
                            layer.close(index);
                          }else{
                              layer.msg(data.msg);
                          }
                    },
                    error: function(xhr, status, error) {
                          layer.msg('系统错误');
                    }
                });
            }, no: function(){
                layer.msg('取消');
            }
        });
      },
    }
  })
</script>
</html>
