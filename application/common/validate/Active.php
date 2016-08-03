<?php
namespace app\common\validate;

use \think\Validate;

class Active extends Validate
{
    protected $rule = [
        'name'=>'require',
        'cate_id'=>'require',
        'type'=>'require',
        // 'thumb'=>'require',
        'start_time'=>'require',
        'end_time'=>'require',
    ];

    protected $message = [
        'name.require'=>'活动名称不能为空',
        'cate_id.require'=>'活动名称不能为空',
        'type.require'=>'活动名称不能为空',
        // 'thumb.require'=>'活动图片不能为空',
        'start_time.require'=>'活动开始时间不能为空',
        'end_time.require'=>'活动结束时间不能为空',
    ];
    protected $scene = [
       'edit'=>['title'=>'require']
    ];
}
