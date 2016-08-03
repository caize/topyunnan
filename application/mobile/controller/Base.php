<?php
namespace app\mobile\controller;

use \think\Controller;
use \think\Request;
use \think\Session;
use \think\Config;
use app\common\tools\YunPianSms;

class Base extends Controller
{

	public function __construct()
	{
		parent::__construct();
		Config::set('default_return_type','json');
		$this->assign('con', model('config')->getConfigs());
	}

	/**
	 * 会员登录
	 * @author chouchong
	 */
	public function login()
	{
		return view('member/login');
	}
	/**
	 * 会员注册
	 * @author chouchong
	 */
	public function register()
	{
		return view('member/register');
	}
	/**
	 * 会员忘记密码
	 * @author chouchong
	 */
	public function psd()
	{
		return view('member/psd');
	}
	/**
	 * 短信发送
	 * @author chouchong
	 */
	public function sendSms()
	{
		$sms = new YunPianSms();
		$code = '';
	    $charset = '1234567890';
	    $_len = strlen($charset) - 1;
	    for ($i = 0;$i < 6;++$i) {
	        $code .= $charset[mt_rand(0, $_len)];
	    }
	    $data=array(
	      'tpl_id'=>'8',
	      'tpl_value'=>('#code#').'='.urlencode($code).'&'.('#tel#').'='.urlencode('4008627098').'&'.('#company#').'='.urlencode('云片网'),
	      'mobile'=>Request::instance()->post('phone')
	    );
	    Session::set('smscode',$code);
	    $object = $sms->yp_send_tpl($data);
	    return $data;
	}
	/**
	 * 会员是否登录
	 * @author chouchong
	 */
	public function isLogin()
	{
		return session('userMember.id')?1:0;
	}
	/**
	 * 会员是否存在
	 * @author chouchong
	 */
	public function isCheckMember()
	{
		if(session('userMember.id') == null){
			$this->redirect(url('/mobile/base/login'));
		}
	}
}