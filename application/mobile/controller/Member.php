<?php
namespace app\mobile\controller;

use \think\Session;

class Member extends Base
{
	public function index()
	{
		$this->isCheckMember();
		return view('index',['user'=>model('member')->find(session('userMember')['id'])]);
	}
	/**
	 * 会员注册
	 * @author chouchong
	 */
	public function add()
	{
		if(validate('Member')->scene('add')->check(input('post.')) == false){
	    	return ['status'=> -1,'msg'=>validate('Member')->getError()];
	    }
	    if(model('Member')->save(['phone'=>input('post.phone'),'password'=>input('post.password')])){
	    	return ['status'=> 1,'msg'=>'注册成功'];
	    }
	    return ['status'=> -2,'msg'=>'注册失败'];
	}
	/**
	 * 会员登录
	 * @author chouchong
	 */
	public function login()
	{
		if(validate('Member')->scene('login')->check(input('post.')) == false){
	    	return ['status'=> -1,'msg'=>validate('Member')->getError()];
	    }
	    return model('Member')->login(input('post.'));
	}
	/**
	 * 会员退出
	 * @author chouchong
	 */
	public function lgout()
	{
		Session::delete('userMember');
		$this->redirect(url('/mobile/index/index'));
	}
	/**
	 * 会员退出
	 * @author chouchong
	 */
	public function psd()
	{
		if(validate('Member')->scene('psd')->check(input('post.')) == false){
	    	return ['status'=> -1,'msg'=>validate('Member')->getError()];
	    }
	    if(model('Member')->save(['password'=>input('post.password')],['phone'=>input('post.phone')])){
	    	return ['status'=> 1,'msg'=>'修改成功'];
	    }
	    return ['status'=> -2,'msg'=>'修改失败'];
	}
	/**
	 * 会员设置
	 * @author chouchong
	 */
	public function setting()
	{
		$this->isCheckMember();
		if($this->request->isPost()){
			if(validate('Member')->scene('auth')->check(input('post.')) == false){
	    		return ['status'=> -1,'msg'=>validate('Member')->getError()];
	    	}
	    	if(model('Member')->edit(input('post.'))){
	    		return ['status'=> 1,'msg'=>'修改成功'];
	    	}
	    	return ['status'=> -2,'msg'=>'修改失败'];
		}
		return view('',['user'=>model('member')->find(session('userMember')['id'])]);
	}
	/**
	 * 会员投票
	 * @author chouchong
	 */
	public function vote()
	{
		$data = model('MemberCompete')->where(['mid'=>session('userMember.id')])->select();
		return view('',['vote'=>$data]);
	}
	/**
	 * 会员取消投票
	 * @author chouchong
	 */
	public function delVote()
	{
		if($this->request->isAjax()){
		   $data['cid'] = input('post.cid');
		   $data['ticket'] = input('post.ticket');
		   $id = db('member_compete')->delete(input('post.id'));
		   if($id>0){
		   		db('active_compete')->where('id', $data['cid'])->setDec('ticket', $data['ticket']);
		   		return ['status'=>$id];
		   }
		   return ['status'=>-1];
		}
	}
	/**
	 * 会员报名
	 * @author chouchong
	 */
	public function apply()
	{
		$data = model('ActiveCompete')->where(['mid'=>session('userMember.id')])->select();
		return view('',['apply'=>$data]);
	}
}