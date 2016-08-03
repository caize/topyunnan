<?php
namespace app\admin\controller;


class Active extends Base
{

	/**
	 * 活动列表
	 * @author chouchong
	 */
	public function index()
	{
	  $actives = model('active')->paginate(10);
      return view('',['actives'=>model('active')->paginate(10)]);
	}
	/**
	 * 活动添加
	 * @author chouchong
	 */
	public function add()
	{
	  if($this->request->isAjax()){
	  	 if(validate('active')->check(input('post.'))){
            $active = model('active')->insert(input('post.'));
            return ['status'=>$active];
	  	 }
	  	 return ['status'=>-1,'msg'=>validate('active')->getError()];
	  }
      return view('',['cates'=>model('ActiveCate')->getActiveCate()]);
	}
	/**
	 * 活动编辑
	 * @author chouchong
	 */
	public function edit()
	{
	  if($this->request->isAjax()){
	  	 if(validate('active')->check(input('post.'))){
            $active = model('Active')->save(input('post.'),['id'=>input('post.id')]);
            return ['status'=>$active]; 
	  	 }
	  	 return ['status'=>-1,'mag'=>validate('active')->getError()];
	  }
      return view('',['cates'=>model('ActiveCate')->getActiveCate(),'actives'=>model('active')->find(input('id'))]);
	}
	/**
	 * 活动删除
	 * @author chouchong
	 */
	public function delete(){
        $id = model('Active')->where('id',input('post.id'))->delete();
        if($id){
        	return ['status'=>1];
        }
        return ['status'=>-1,'msg'=>'活动删除失败'];
	}
}
