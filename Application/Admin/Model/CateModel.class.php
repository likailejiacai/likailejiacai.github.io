<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/4/12
 * Time: 13:00
 */
namespace Admin\Model;

use Think\Model;

class CateModel extends Model
{
    public function listCate(){
        $page =I('p',1,'int');
        $limit=5;
        $data = $this->order('id DESC')->page($page.','.$limit)->select();
        $count=$this->count();
        $Page=new \Think\Page($count,$limit);
        $show=$Page->show();
        return array(
            "list" =>$data,"page"=>$show);
    }
    public function editCate($id,$data){
//        print_r($id);
//        print_r($data);
////        exit;

      return $this->where("id='{$id}'")->save($data);
//        print_r($mes);
//       print_r( $this->getLastSql());
//        exit;
    }
}
