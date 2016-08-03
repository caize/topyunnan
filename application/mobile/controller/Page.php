<?php
namespace app\mobile\controller;

class Page extends Base
{
	/**
	 *单页面文章
	 * @author chouchong
	 */
	public function index()
	{

		return view('',['page'=>model('page')->where('title',input('title'))->find()]);
	}
}