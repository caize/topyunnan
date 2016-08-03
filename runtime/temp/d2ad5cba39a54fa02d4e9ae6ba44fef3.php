<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\phpStudy\WWW\cms\public/../application/mobile\view\member\vote.html";i:1469520897;s:71:"D:\phpStudy\WWW\cms\public/../application/mobile\view\public\style.html";i:1468987967;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>我的投票</title>
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

<body id="vote">
    <div class="usertp">
        <div class="usertp_list">
            <?php if(is_array($vote) || $vote instanceof \think\Collection): $i = 0; $__LIST__ = $vote;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="usertp_item">
                <div class="ui_l" onclick=window.location.href="<?php echo url('mobile/Vote/index',['id'=>$vo->competes[0]['id']]); ?>">
                    <div class="uil_img">
                        <img src="<?php echo $vo->competes[0]['thumb']; ?>" alt="">
                    </div>
                    <div class="uil_mc">
                        <h5><?php echo $vo->competes[0]->parent[0]['name']; ?></h5>
                        <p><?php echo $vo->competes[0]['name']; ?></p>
                    </div>
                </div>
                <div class="ui_r">
                    <i class="fa fa-trash-o" @click="delVote(<?php echo $vo->id; ?>,<?php echo $vo->competes[0]['id']; ?>,<?php echo $vo->ticket; ?>)"></i>
                    <div class="ui_tps"><?php echo $vo->ticket; ?>票</div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</body>
<script>
   var vn = new Vue({
    el: '#vote',
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
