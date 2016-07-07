<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
    public function list(){
        $User=M('User');
        $count=$User->count();
        $page= new \Think\Page($count,2);
        $show=$page->show();
        $list=$User->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }
    public function add(){
        // $User=M('User');
        $this->display();
    }
    public function addHandle(){
        $upload=new \Think\Upload();
        $upload->maxSize=3145728;
        $upload->exts=array('jpg','gif','png','jpeg');
        $upload->rootPath='Public/Uploads/';
        $upload->savePath='';
        // if(!$info){
        //     $this->error($upload->getError());
        // }else{
        //     $this->success('upload success');
        // }

        $User=M("User");
        $info=$upload->upload();
        $data['face']=$info['face']['savename'];
        $data['username']=I('username');
        $data['password']=I('password');
        $data['email']=I('email');
        $data['sex']=I('sex');
        $data['regTime']=TIME_NOW;
        $data['activeFlag']=0;
        $User->add($data);
        // if($User->create()){
        //     $result=$User->add();
        //     if(!$result){
        //         $this->error();
        //     }
        //     $this->redirect("Index/index");
        // }
        // $this->assign('list')

    }
    // public function upload(){
    //     $upload=new \Think\Upload();
    //     $upload->maxSize=3145728;
    //     $upload->exts=array('jpg','gif','png','jpeg');
    //     $upload->rootPath='Public/Uploads/';
    //     $upload->savePath='';
    //     $info=$upload->upload();
    //     if(!$info){
    //         $this->error($upload->getError());
    //     }else{
    //         $this->success('upload success');
    //     }
    // }

    public function edit(){
        $User=M('User');
        $id=I('id');
        $this->assign('list',$User->find($id));
        $this->display();
    }
    public function editHandle($id){
        $User=M('User');
        if($User->create()){
            $result=$User->where("id=$id")->save();
            echo            $User->getLastSql();exit;
            if(!$result){
                $this->error();
            }
            $this->redirect("Index/index");
        }
    }
    public function delete(){
        $User=M('User');
        $id=I('id');
        $User->where("id=$id")->delete();
    }
}