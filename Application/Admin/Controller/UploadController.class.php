<?php
namespace Admin\Controller;
use Think\Controller;
class uploadController extends Controller{
    public function index(){
        $this->display();
    }
    public function upload(){
        $upload=new \Think\Upload();
        $upload->maxSize=3145728;
        $upload->exts=array('jpg','gif','png','jpeg');
        $upload->rootPath='Public/Uploads/';
        $upload->savePath='';
        $info=$upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            $this->success('upload success');
        }
    }
}
