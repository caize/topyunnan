<?php
namespace app\common\model;

use \think\Model;
use \think\Request;
use \think\Db;
use \PDOException;
class ActiveCompete extends Model
{
    protected $table = 'active_compete';
    protected $auto = ['create_time','update_time'];
    /**
     * 关联活动表
     * @author chouchong
     */
    public function parent()
    {
      return $this->hasMany('active','id','active_id');
    }
    /**
     * 关联active_gallery
     * @author chouchong
     */
    public function gallery()
    {
      return $this->hasMany('ActiveGallery','cid','id');
    }
    /**
     * 添加
     * @author chouchong
     */
    public function getIspassAttr($value, $data)
    {
        $status = [0 => '<span>审核中</span>', 1 => '<span>审核通过</span>'];
        return $status[$value];
    }
    /**
     * 添加
     * @author chouchong
     */
    public function add(array $data)
    {
        return Db::transaction(function () use ($data) {

            $Id = $this->save([
                'name'   => $data['name'],
                'active_id' => $data['active_id'],
                'phone' => $data['phone'],
                'thumb' => $data['thumb'],
                'sort' => $data['sort'],
                'content' => $data['content'],
                'ispass'=>1
            ]);

            if ($Id === false) {
                throw new PDOException($this->getError());
            }

            if (isset($data['gallery']) && is_array($data['gallery']) && !empty($data['gallery'])) {
                $arr['cid'] = $Id;
                for ($i=0; $i < count($data['gallery']); $i++) { 
                    $arr['thumb'] = $data['gallery'][$i];
                    model('ActiveGallery')->insert($arr);
                }
            }
            return $Id;
        });
    }
    /**
     * 添加
     * @author chouchong
     */
    public function apply(array $data)
    {
        return Db::transaction(function () use ($data) {

            $Id = $this->save([
                'name'   => $data['name'],
                'active_id' => $data['active_id'],
                'phone' => $data['phone'],
                'thumb' => str_replace('\\','/',DS . 'static'.DS.'compete'.DS.date('Ymd').DS.BaseUpload($data['gallery'][0],'compete')),
                'content' => $data['content'],
                'mid'=>session('userMember')['id'],
            ]);

            if ($Id === false) {
                throw new PDOException($this->getError());
            }

            if (isset($data['gallery']) && is_array($data['gallery']) && !empty($data['gallery'])) {
                $arr['cid'] = $Id;
                for ($i=0; $i < count($data['gallery']); $i++) {
                    $arr['thumb'] = str_replace('\\','/',DS . 'static'.DS.'compete'.DS.date('Ymd').DS.BaseUpload($data['gallery'][$i],'compete'));
                    model('ActiveGallery')->insert($arr);
                }
            }
            return $Id;
        });
    }
}
