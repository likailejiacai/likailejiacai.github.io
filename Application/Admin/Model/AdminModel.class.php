<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/4/11
 * Time: 15:27
 */
namespace Admin\Model;

use Think\Model;

class AdminModel extends Model
{
    /**
     * @var bool 静态验证
     */
    protected $patchValidate =true ;
    protected $_map=array(  //字段映射
        'userpassword'=>'password', //将表单的UNAME映射到USERNAME

    );
    protected $_validate = array(//自动验证
        array('username', '/^([\d\w_]){4,20}$/', '用户名必须是英文或数字或下划线，且4-20！'),
        array('password','/^([\w\d]{4,10})$/','密码必须是八到十位！'),

    );
    protected $_auto =array( //自动完成
        array('password','md5',3,'function'),

    );
    public function login($data){
        return $this->where("username='{$data['username']}' and password='{$data['password']}'")->find();

    }
    public function registerAdmin($data){
        if (!$this->create()) {     // 对data数据进行验证
            return($this->getError());
        } else {
            // 验证通过 可以进行其他数据操作
//            print_r($data);
            $this->add();

        }
    }
    public function listAdmin(){

        $page =I('p',1,'int');
        $limit=5;
        $data = $this->order('id DESC')->page($page.','.$limit)->select();
        $count=$this->count();
        $Page=new \Think\Page($count,$limit);
        $show=$Page->show();
        return array(
            "list" =>$data,"page"=>$show);
    }
    public function editAdmin($id,$data){
        if (!$this->create($data)) {     // 对data数据进行验证
            return($this->getError());
        } else {
            // 验证通过 可以进行其他数据操作
            $this->where("id='{$id}'")->save();

        }
    }

}