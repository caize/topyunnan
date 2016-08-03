<?php
namespace app\common\model;

use think\Model;
use think\Request;

class ActiveGallery extends model
{
    protected $table = 'active_gallery';
	protected $updateTime = false;
	protected $auto = ['create_time'];
	protected $insert = ['create_time'];
}
