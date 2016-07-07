<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function verify()
    {//输出验证码
        $Verify = new \Think\Verify();
        $Verify->entry();
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    public function index()
    {
        if ($_SESSION['adminId'] == "" && $_COOKIE['adminId'] == "") {

            $this->display();
        } else {
//            print_r(cookie('adminName'));

            $this->assign('adminName', cookie('adminName'));
            $this->display(admin);
        }
    }

    public function login()
    {
        $data = I('post.');
        $isVerify = $this->check_verify($data['verify']);
        $back = D('Admin')->login($data);
        if ($isVerify) {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('验证码错误');
        } else {
            if ($back) {
                session_start();
                if ($data['autoFlag']) {

                    cookie('adminId',$back['id'],time() + 7 * 24 * 3600);
                    cookie('adminName',$back['username'],time() + 7 * 24 * 3600);

//                    print_r("22");
                }
                session('adminName',$back['username']);

                session('adminId',$back['id']);

                $this->assign('adminName', session('adminName'));
                $this->success('登录成功','index');
            } else {
                $this->error('用户名或密码错误');
            }
        }

    }

    public function Logout()
    {
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 1);
        }
        if (isset($_COOKIE['adminId'])) {
            setcookie("adminId", "", time() - 1);
        }
        if (isset($_COOKIE['adminName'])) {
            setcookie("adminName", "", time() - 1);
        }
        session_destroy();
        $this->redirect('index');
    }
}