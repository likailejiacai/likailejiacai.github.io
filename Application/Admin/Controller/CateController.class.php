<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller{
    public function list(){
        $Cate=M('Cate');
        $count=$Cate->count();
        $page= new \Think\Page($count,2);
        $show=$page->show();
        $list=$Cate->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }
    public function add(){
        $this->display();
    }

    public function addHandle(){
        $Cate=M("Cate");
        if($Cate->create()){
            $result=$Cate->add();
            if(!$result){
                $this->error();
            }
            $this->redirect("list");
        }else{
            $this->error();
        }

    }
    public function edit(){
        $Cate=M('Cate');
        $id=I('id');
        $this->assign('list',$Cate->find($id));
        $this->display();
    }
    public function editHandle($id){
        $Cate=M('Cate');
        if($Cate->create()){
            $result=$Cate->where("id=$id")->save();
            if(!$result){
                $this->error();
            }
            $this->redirect("list");
        }
    }
    public function del($id){
        $Cate=M('Cate');
        $id=I('id');
        if(!$Cate->where("id=$id")->delete()){
            $this->error();
        }
        $this->redirect("list");

    }
}