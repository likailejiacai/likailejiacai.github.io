<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/4/14
 * Time: 14:56
 */
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    protected $patchValidate =true ;
    protected $_validate = array(//自动验证
        array('username', '/^([\d\w_]){4,20}$/', '用户名必须是英文或数字或下划线，且4-20！'),
        array('password','/^([\w\d]{4,10})$/','密码必须是4到十位！'),

    );
    protected $_auto =array( //自动完成
        array('password','md5',3,'function'),

    );
    public function reg($data){

        if (!$this->create($data)) {     // 对data数据进行验证
            return($this->getError());
        } else {
            // 验证通过 可以进行其他数据操作

//            print_r($this->getLastSql());
//            exit;
//            print_r($data);
            if( $this->add())
            {
                return 1;
            }else{
                return 0;
            }

        }
    }
}