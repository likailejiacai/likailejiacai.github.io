<?php
namespace Admin\Controller;
use Think\Controller;
class ImageController extends Controller{
    public function list(){
        $pro=M('Pro as p');
        $list=$pro->join('imooc_album as a on a.pid=p.id')->getField('a.id,p.pName,a.albumPath');
        $this->assign('list',$list);
        $this->display();
    }
    public function waterText(){
        $id= I('get.id');
        $album=M(Album);
        $addImg=$album->where("pid=$id")->select();
        // $image=new \Think\Image();
        // // var_dump(        $addImg[0]['albumpath']);exit;
        // $image->open('./1.jpg')->text('ThinkPHP','./1.ttf',20,'#000000',\Think\Image::IMAGE_WATER_SOUTHEAST)->save("new.jpg");
        // $this->img->text();
        $image = new \Think\Image();
// 在图片右下角添加水印文字 ThinkPHP 并保存为new.jpg
$image->open('./1.jpg')->text('ThinkPHP','./1.ttf',20,'#000000',\Think\Image::IMAGE_WATER_SOUTHEAST)->save("new.jpg");

    }
    public function WaterPic(){

    }
}
