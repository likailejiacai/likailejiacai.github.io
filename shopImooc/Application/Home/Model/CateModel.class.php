<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/4/14
 * Time: 20:57
 */
namespace Home\Model;

use Think\Model;

class CateModel extends Model
{
    public function getAllPro(){
        $datas=$this->select();
        $i=0;
        foreach($datas as $cate){
            $datas[$i]['BigPro']=M('Pro')->where("cId='{$cate['id']}'")->limit('0,4')->select();
            $j=0;
            foreach($datas[$i]['BigPro'] as $pro){
                $datas[$i]['BigPro'][$j]['albumPath']=M('Album')->where("Pid='{$pro['id']}'")->select();
                $j++;
            }
            $datas[$i]['smPro']=M('Pro')->where("cId='{$cate['id']}'")->limit('4,4')->select();
            $j=0;
            foreach($datas[$i]['smPro'] as $pro){
                $datas[$i]['smPro'][$j]['albumPath']=M('Album')->where("Pid='{$pro['id']}'")->select();
                $j++;
            }
            $i++;
        }


        return $datas;
    }
}