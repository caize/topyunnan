<?php
namespace app\mobile\controller;

class Apply extends Base
{
	/**
	 * 首页
	 * @author chouchong
	 */
	public function index()
	{
		return view('',['actives'=>db('active')->select(),'articles'=>db('article')->select()]);
	}
	/**
	 * 报名
	 * @author chouchong
	 */
	public function apply()
	{
		if($this->request->isajax()){
	        if(validate('ActiveCompete')->scene('apply')->check(input('post.'))){
	           	$id = model('ActiveCompete')->apply(input('post.'));
	           	if($id){
	           		return ['status'=>$id];
	           	}
	           	return ['status'=>-2,'msg'=>'报名失败'];
	        }
	        return ['status'=>-1,'msg'=>validate('ActiveCompete')->getError()];
		}
	}

}