<?php
namespace app\mobile\controller;

class article extends Base
{
	/**
	 * 文章
	 * @author chouchong
	 */
	public function index()
	{
		if($this->request->isPost()){
			$data['title'] = input('post.title','');
			$data['page'] = input('post.page',0);
			return model('article')->lists($data);
		}
		return view();
	}
    /**
	 * 文章详情
	 * @author chouchong
	 */
	public function detail()
	{
		return view('',['detail'=>model('article')->find(input('param.id'))]);
	}
}