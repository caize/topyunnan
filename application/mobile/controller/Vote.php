<?php
namespace app\mobile\controller;

use \think\Db;
class Vote extends Base
{
	/**
	 * 投票首页
	 * @author chouchong
	 */
	public function index()
	{
		$compete = model('active_compete')->find(input('id'));
		$active_id = $compete['active_id'];
		$active = model('active')->find($active_id);
		$vote = db('member_compete')->where(['mid'=>session('userMember')['id'],'cid'=>input('id')])->count()?1:0;
		$ismid =  $this->isLogin();
		return view('active/vote/desc',['compete'=>$compete,'active'=>$active,'vote'=>$vote,'ismid'=>$ismid]);
	}
	/**
	 * 投票+1
	 * @author chouchong
	 */
	public function add()
	{
		if($this->request->isAjax()){
		   $data['mid'] = session('userMember')['id'];
		   $data['cid'] = input('post.competeId');
		   $data['ticket'] = input('post.ticket');
		   $id = db('member_compete')->insertGetId($data);
		   if($id>0){
		   		db('active_compete')->where('id', input('post.competeId'))->setInc('ticket', input('post.ticket'));
		   		return ['status'=>$id];
		   }
		   return ['status'=>-1];
		}
	}

}