<?php
namespace app\admin\controller;


class ActiveCompete extends Base
{

	/**
	 * 参赛列表
	 * @author chouchong
	 */
	public function index()
	{
      return view('',['competer'=>model('ActiveCompete')->paginate(10)]);
	}
	/**
	 * 参赛人添加
	 * @author chouchong
	 */
	public function add()
	{
	  if($this->request->isajax()){
        if(validate('ActiveCompete')->scene('add')->check(input('post.'))){
           $id = model('ActiveCompete')->add(input('post.'));
           if($id){
           		return ['status'=>$id];
           }
           return ['status'=>-2,'msg'=>'添加失败'];
        }
        return ['status'=>-1,'msg'=>validate('ActiveCompete')->getError()];
	  }
      return view('',['actives'=>model('active')->select()]);
	}
	/**
	 * 参赛人删除
	 * @author chouchong
	 */
	public function delete()
	{
	  if(model('ActiveCompete')->where('id',input('id'))->delete()){
	  	 $id = model('ActiveGallery')->where('cid',input('id'))->delete();
	  	 return ['status'=>$id];
	  }
	  return ['status'=>-1,'msg'=>'删除失败'];
	}
	/**
	 * 参赛人详情
	 * @author chouchong
	 */
	public function detail()
	{
	  if($this->request->isajax()){
	  	$compete = model('ActiveCompete')->find(input('post.id'));
	  	$compete['active'] = $compete->parent[0];
	  	$compete['gallery'] = $compete->gallery;
	  	return $compete;
	  }
      return ;
	}
	/**
	 * 查看选中的活动是报名还是投票
	 * @author chouchong
	 */
	public function getType()
	{
       return model('active')->field('type')->find(input('post.id'));
	}
    /**
	 * 参赛人审核
	 * @author chouchong
	 */
	public function activeIsPass()
	{
		if(model('ActiveCompete')->save(['ispass'=>1],['id'=>input('post.id')])){
			return ['status'=>1];
		}
		return ['status'=>-1,'msg'=>'审核失败'];
    }
}
