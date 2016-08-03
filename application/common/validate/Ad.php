<?php

namespace app\common\validate;

use \think\Validate;

class Ad extends Validate
{
    protected $rule = [
        'positionId'   =>  'require',
        'file'   =>  'require',
        'name'   =>  'require',
        'sort'   =>  'require',
        // 'url'   =>  'require',
        'start_time'   =>  'require',
        'end_time'   =>  'require',
    ];

    protected $message = [
        'name.require' => '广告名称必须填写',
        'positionId.require' => '广告位置必须填写',
        'file.require' => '广告图片必须填写',
        'sort.require' => '广告排序必须填写',
        'url.require' =>'广告链接必须填写',
        'start_time.require' => '广告开始时间必须填写',
        'end_time.require' => '广告结束时间必须填写',
    ];
}
?>