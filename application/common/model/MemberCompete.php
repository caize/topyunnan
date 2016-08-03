<?php
namespace app\common\model;

use think\Model;
use think\Request;

class MemberCompete extends Model
{
    protected $autoWriteTimestamp = false;

    public function competes()
    {
        return $this->hasMany('ActiveCompete','id','cid');
    }
}
