<?php
namespace app\mobile\controller;

class Active extends Base
{
	/**
	 *活动列表
	 * @author chouchong
	 */
	public function index()
	{
		if($this->request->isAjax()){
           return model('active')->index();
		}
		return view('',['ad'=>model('ad')->where(['positionId'=>2])->limit(1)->select()]);
	}
	/**
	 *更多活动
	 * @author chouchong
	 */
	public function voteDetail()
	{
		return 1;
	}
}