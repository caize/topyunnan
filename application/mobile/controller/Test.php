<?php
namespace app\mobile\controller;

use \think\Controller;
use \think\Request;
use \think\Session;
use \think\Config;
use app\common\tools\YunPianSms;

class Test extends Controller
{

	public function __construct()
	{
		parent::__construct();
		Config::set('default_return_type','json');
	}

	public function test()
	{
		// $thumb = ["/static/active/20160721/4f6c04875c9f0354593f836d4ab7e078.png", "/static/active/20160721/4f6c04875c9f0354593f836d4ab7e078.png"];
  //       $data['cid'] = 5;
  //       // $thumb = input('post.thumb');
  //      // for ($i=0; $i < count($thumb); $i++) {
  //      // 		$data['thumb'] = $thumb[$i];
  //      // 		model('ActiveGallery')->insert($data);
  //      // }
  //       foreach ($thumb as $v) {
  //      		$data['thumb'] = $v;
  //      		model('ActiveGallery')->insert($data);
  //      }
    dump(model('config')->getConfigs()['mallName']);
	}
  public function BaseUpload($base64){
    $base64_image = str_replace(' ', '+', $base64);
    //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
    $path = dirname(ROOT_PATH) . DS . 'static'.DS.'compete'.DS.date('Ymd');
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)){
        //匹配成功
        if($result[2] == 'jpeg'){
          $image_name = md5(microtime(true)).'.jpg';
            //纯粹是看jpeg不爽才替换的
        }else{
          $image_name = md5(microtime(true)).'.'.$result[2];
        }
        //服务器文件存储路径
        if (file_put_contents($path.DS.$image_name, base64_decode(str_replace($result[1], '', $base64_image)))){
            return $image_name;
        }else{
            return false;
        }
    }else{
        return false;
    }
  }
}