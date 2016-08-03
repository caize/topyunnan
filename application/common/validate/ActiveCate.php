<?php
namespace app\common\validate;

use \think\Validate;

class ActiveCate extends Validate
{
    protected $rule = [
        'name'=>'require|unique:active_cate',
    ];

    protected $message = [
        'name.require'=>'活动名称不能为空',
        'name.unique'=>'分类名称已经存在了',

    ];
    protected $scene = [
       'edit'=>['name'=>'require']
    ];
}
