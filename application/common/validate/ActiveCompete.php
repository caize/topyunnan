<?php
namespace app\common\validate;

use \think\Validate;

class ActiveCompete extends Validate
{
    protected $rule = [
        'name'=>'require',
        'active_id'=>'require',
        'content'=>'require',
        'gallery'=>'require',
        'phone'=>'require|checkPhone:'
    ];

    protected $message = [
        'name.require'=>'姓名不能为空',
        'active_id.require'=>'参加的活动不能为空',
        'content.require'=>'活动描述不能为空',
        'gallery.require'=>'图片不能为空',
        'phone.require'=>'联系电话不能为空',
        'phone.checkPhone'=>'联系电话有误'
    ];
    protected $scene = [
        'add'    =>  ['name','active_id','content','phone'],
        'apply'  =>  ['name','gallery','content','phone'],
    ];
    public function checkPhone($value){
        if(preg_match("/^1[34578]\d{9}$/",$value)){
          return true;
        }
        return false;
    }
}
