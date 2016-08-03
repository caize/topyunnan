<?php
namespace app\admin\controller;


class ActiveCate extends Base
{

	/**
	 * 活动分类
	 * @author chouchong
	 */
	public function index()
	{
	  $cates = model('ActiveCate')->where('parent_id',0)->paginate(10);
      return view('',['cates' => $cates]);
	}
    /**
	 * 添加活动分类
	 * @author chouchong
	 */
	public function add()
	{
	  if($this->request->isAjax()){
         if(validate('ActiveCate')->check(input('post.'))){
            $cate = model('ActiveCate')->insert(input('post.'));
            return ['status'=>$cate];
         }
         return ['status'=>-1,'msg'=>validate('ActiveCate')->getError()];
	  }
      return view('',['cates' => model('ActiveCate')->getActiveCate()]);
	}
	/**
	 * 删除活动分类
	 * @author chouchong
	 */
	public function delete()
	{
       $cate = model('ActiveCate')->find(input('post.id'));
	   if($cate){
		   if($cate->parent()->count()>0){
	            return ['status' => -1, 'msg' =>'该分类下有子分类'];
		   }
		   else{
			   	if($cate->active()->count()>0){
	              return ['status' => -1, 'msg' =>'该分类下有活动'];
			   	}else{
	              model('ActiveCate')->where('id',input('post.id'))->delete();
	              return ['status' => 1, 'msg' =>'删除成功'];	
			   	}
		   }
	   }
	}
	/**
	 * 编辑活动分类
	 * @author chouchong
	 */
	public function edit()
	{
	    if($this->request->isAjax()){
	    	if(validate('ActiveCate')->scene('edit')->check(input('post.'))){
                $Cate = model('ActiveCate')->where('id',input('post.id'))->update(input('post.'));
                return ['status'=>$Cate];
	    	}
	    	return ['status'=>-1,'msg'=>validate('ActiveCate')->getError()];
	    }
		$activeCate = model('ActiveCate')->find(input('id'));
		return view('',['cates'=>model('ActiveCate')->getActiveCate(),'activeCate'=>$activeCate]);
	}
}
