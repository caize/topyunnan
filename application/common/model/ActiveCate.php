<?php
namespace app\common\model;

use \think\Model;
use \think\Session;

class ActiveCate extends Model
{
	protected $table = 'active_cate';
    // 以上定义需要配合insert、update或者auto才能生效
	protected $autoWriteTimestamp = true;
	/**
     * 关联：ActiveCate自身关联
     * @author chouchong
     */
	public function parent(){
       return $this->hasMany('ActiveCate','parent_id');
	}
	/**
     * 关联：Active关联
     * @author chouchong
     */
	public function active(){
       return $this->hasMany('Active','cate_id');
	}
    /**
     * 关联：获取活动分类
     * @author chouchong
     */
	public function getActiveCate(){
	   return $this->where('parent_id',0)->select();
	}

}