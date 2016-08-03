<?php
namespace app\admin\controller;


class Ad extends Base
{

	/**
	 * 活动列表
	 * @author chouchong
	 */
	public function index()
	{
	  return view('',['ad'=>model('ad')->paginate(10)]);
	}
	/**
	 * 活动添加
	 * @author chouchong
	 */
	public function add()
	{
	  if($this->request->isPost()){
	  	 if(validate('ad')->check(input('post.'))){
	  	 	if(input('post.id')>0){
	  	 		$ad = model('ad')->save(input('post.'),['id'=>input('post.id')]);
            	return ['status'=>$ad];
	  	 	}else{
            	$ad = model('ad')->insert(input('post.'));
            	return ['status'=>$ad];
	  	 	}
	  	 }
	  	 return ['status'=>-1,'msg'=>validate('ad')->getError()];
	  }
      return view();
	}
	/**
	 * 活动编辑
	 * @author chouchong
	 */
	public function edit()
	{
		return view('',['ad'=>model('ad')->find(input('param.id'))]);
	}
	/**
	 * 活动删除
	 * @author chouchong
	 */
	public function delete(){
        $id = model('ad')->where('id',input('post.id'))->delete();
        if($id){
        	return ['status'=>1];
        }
        return ['status'=>-1,'msg'=>'活动删除失败'];
	}
}
