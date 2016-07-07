<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
        $this->display();
    }
    public function login(){
        // if(!$this->checkVerify()){
        //     $this->error('verify code failed','index');
        // }
        // $db=M('admin');
        // $admin=$db->where(array('username'=>I('username')))->find();
        // if(!$admin || $admin['password']!=I('password','',md5)){
        //     $this->error('username or password failed');
        // }
        // session('username',$admin['username']);
        $this->redirect("Admin/Index/index");
        // if(!this->checkUsername()){
        //     $this->error('no username','index');
        // }
    }
    public function getVerify(){
        $verify= new \Think\Verify();
        return $verify->entry();
    }
    public function checkVerify(){
        $verify=new \Think\Verify();
        return $verify->check(I('verify'));exit;
    }
    public function logout(){
        session(null);
        $this->success('logout success','index');
    }
}