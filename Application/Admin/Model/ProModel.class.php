<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/4/12
 * Time: 20:41
 */
namespace Admin\Model;

use Think\Model;

class ProModel extends Model
{
    public function addPro($data,$info){
        $Album=array();
        $data['pubTime']=time();
//print_r($data);
//        exit;
        $Pid=$this->add($data);
        foreach($info as $addr){
            $Album['Pid']=$Pid;
            $Album['albumPath']=$addr['savename'];
            M('Album')->add($Album);
        }
    }
    public function delPro($pid){
        $picAddr=M('Album')->where("Pid='{$pid}'")->select();
        foreach($picAddr as $addr){
            unlink("Public/Uploads/".$addr['albumpath']);
            unlink("Public/Uploads/image_50/".$addr['albumpath']);
            unlink("Public/Uploads/image_220/".$addr['albumpath']);
            unlink("Public/Uploads/image_350/".$addr['albumpath']);
            unlink("Public/Uploads/image_800/".$addr['albumpath']);
        }

        M('Pro')->where("id='{$pid}'")->delete();
        M('Album')->where("Pid='{$pid}'")->delete();

    }
    public function getProAndImg(){
        $datas=$this->select();
        $i=0;
        foreach($datas as $pro){
            $datas[$i]['album']=M('Album')->where("Pid='{$pro['id']}'")->select();
            $i++;
        }
        return $datas;
    }
}