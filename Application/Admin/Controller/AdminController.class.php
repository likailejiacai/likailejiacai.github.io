<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller{
    public function list(){
        // $Admin=M('Admin');
        // $count=$Admin->count();
        // $page= new \Think\Page($count,2);
        // $show=$page->show();
        // $list=$Admin->limit($page->firstRow.','.$page->listRows)->select();
        // $this->assign('list',$list);
        // $this->assign('page',$show);
        // $this->display();
        $mes=D('Admin')->list();
        $this->assign('userInf',$mes['list']);
        $this->assign('page',$mes['page']);
        $this->display();
        // print_r($mes);
    }
    public function add(){
        // $admin=M('Admin');
        $this->display();
    }
    public function addHandle(){
        $Admin=M("Admin");
        if($Admin->create()){
            $result=$Admin->add();
            if(!$result){
                $this->error();
            }
            $this->redirect("Index/index");
        }
        // $this->assign('list')

    }
    public function edit(){
        $Admin=M('Admin');
        $id=I('id');
        $this->assign('list',$Admin->find($id));
        $this->display();
    }
    public function editHandle($id){
        $admin=M('Admin');
        if($admin->create()){
            $result=$admin->save();
            if(!$result){
                $this->error();
            }
            $this->redirect("Index/index");
        }
    }
    public function delete(){
        $admin=M('Admin');
        $id=I('id');
        $admin->where("id=$id")->delete();
    }
}