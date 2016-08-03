<?php
namespace app\mobile\controller;

class Index extends Base
{
	/**
	 * 首页
	 * @author chouchong
	 */
	public function index()
	{
		return view('',
			['actives'=>model('active')->lists(),
			'articles'=>db('article')->limit(6)->order('id desc')->select(),
			'ad'=>model('ad')->where(['positionId'=>1])->limit(1)->select()
			]
		);
	}
	/**
	 * 调转投票
	 * @author chouchong
	 */
	public function toVote()
	{
		return view('mobile@active/vote/index',
			['active'=>db('active')->where('type',2)->find(input('id')),
             'compete'=>db('active_compete')->where('active_id',input('id'))->select(),
			]);
	}
    /**
	 * 调转报名
	 * @author chouchong
	 */
	public function toApply()
	{
		$isApply = db('active_compete')->where(['mid'=>session('userMember')['id'],'active_id'=>input('id')])->count()?1:0;
		return view('mobile@active/apply/index',['active'=>db('active')->where('type',1)->find(input('id')),'isMid'=>$this->isLogin(),'isApply'=>$isApply]);
	}

}