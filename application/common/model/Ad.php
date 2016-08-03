<?php
namespace app\common\model;

use think\Model;
use think\Request;

class Ad extends Model
{
    protected $autoWriteTimestamp = false;
    /**
     * 获取状态
     * @author chouchong
     */
    public function getPositionIdAttr($value, $data)
    {
        $status = [
        	1 => '<span>手机首页广告</span>',
        	2 => '<span>手机活动广告</span>'
        ];
        return $status[$value];
    }
}
