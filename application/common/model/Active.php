<?php
namespace app\common\model;

use think\Model;
use think\Request;

class Active extends Model
{
    protected $table = 'active';
    protected $autoWriteTimestamp = false;
    /**
     * 关联文章分类表
     * @author chouchong
     */
    public function parent()
    {
      return $this->hasMany('ActiveCate','id','cate_id');
    }
    /**
     * 类型
     * @author chouchong
     */
    // public function getTypeAttr($value, $data)
    // {
    //     $status = [1 => '<span>报名</span>', 2 => '<span>投票</span>'];
    //     return $status[$value];
    // }
    /**
     * 查询活动列表时间排序
     * @author chouchong
     */
    public function lists(){
        return $this->wheretime('start_time','<=',date('Y-m-d h:m:s',time()))
                    ->wheretime('end_time','>=',date('Y-m-d h:m:s',time()))
                    ->order('id desc')
                    ->limit(6)
                    ->select();
    }
    /**
     * 活动分页
     * @author chouchong
     */
    public function index(){
        $pageSize = 6;
        return $this->where('type','like','%'.input('post.type','').'%')->limit(input('post.page',0)*$pageSize,$pageSize)->select();
    }
}
