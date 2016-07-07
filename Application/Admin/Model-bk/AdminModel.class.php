<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    // protected $pacthValidat=true;
    // protected $_map=array(
    //     'userpassword'=>'password',
    // );
    // protected $_validate
    // $Admin=M('Admin');
    // $count=$Admin->count();
    // $page= new \Think\Page($count,2);
    // $show=$page->show();
    // $list=$Admin->limit($page->firstRow.','.$page->listRows)->select();
    // $this->assign('list',$list);
    // $this->assign('page',$show);
    // $this->display();
    protected $patchValidate=true;
    protected $_map=array(
        'userpassword'=>'password',
    );
    protected $_validate=array(
        array('username','/^([\d\w_]){4,20}$/','用户名必须是英文或数字或下划线，且4-20！'),
        array('password','/^([\w\d]{4,10})$/','密码必须是八到十位！'),
    );
    protected $_auto=array(
        array('password','md5','3','function'),
    );
    public function login($data){
        return $this->where("username='{$data['username']}' and password='{$data['password']}'")->find();
    }
    public function registerAdmin($data){
        if(!$this->create()){
            return($this->getError());
        }else{
            $this->add();
        }
    }
    public function list(){
        $page=I('p',1,'int');
        $limit=5;
        $data=$this->order('id DESC')->page($page.','.$limit)->select();
        $conut=$this->count();
        $Page=new \Think\Page($count,$limit);
        $show=$Page->show();
        return array(
            "list"=>$data,"page"=>$show);
    }
    public function editAdmin($id,$data){
        if(!$this->create($data)){
            return($this->getError());
        }else{
            $this->where("id={$id}")->save();
        }
    }
}
