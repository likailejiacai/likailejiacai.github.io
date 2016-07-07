<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $loginFlag=0;
//        var_dump(session());
//        var_dump(cookie('userId'));
        if(cookie('userId')){
            $loginFlag=1;
            $ses=cookie();
        }
        if(session('userId')){
            $loginFlag=1;
            $ses=session();
        }
//      echo $loginFlag;

//        print_r($ses);
        $datas=D('Cate')->getAllPro();
//        print_r("22");
//        print_r($datas);
//        exit;
        //$cates=M('Cate')->select();
//        print_r($cates);
        $this->assign('User',$ses);
        $this->assign('loginFlag',$loginFlag);
        $this->assign('datas',$datas);
        $this->display();
    }
    public function reg(){
        if(IS_POST){
            $data=I('post.');
//            print_r($data);
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = 'Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            $upload->autoSub = false;
//            $upload->saveName  = array('uniqid','');
            // 上传文件
            $info = $upload->upload();
//            print_r($info);
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $data['face']=$info['myFace']['savename'];
                $data['regTime']=time();
//                print_r($data);
//                exit;
                $mes=D('User')->reg($data);
               if ($mes==1){
                    $this->success('注册成功!','login');
               }else{
                   $this->error("用户名必须是英文或数字或下划线，且4-20！密码必须是4到十位");
               }
            }
        }else {
            $this->display();
        }
    }
    public function login(){
        if(IS_POST){

            $data=I('post.');
//            print_r($data);
            $data['password']=md5($data['password']);
            $mes=M('User')->where("username='{$data['username']}' and password='{$data['password']}'")->find();
//           var_dump($mes);
            if($mes){
                if($data['autoFlag']){
                        cookie('userId',$mes['id'],time() + 7 * 24 * 3600);
                        cookie('userName',$mes['username'],time() + 7 * 24 * 3600);
                }
//                session_start();
                session('userId',$mes['id']);
                session('userName',$mes['username']);

//                var_dump(session());
//                $mes['userName']=$mes['username'];
//                $loginFlag=1;
//                $this->assign('loginFlag',$loginFlag);
//                $this->assign('User',$mes);
//                exit;
                header('Location:'.U('Index'));
            }
        }else{

            $this->display();
        }

    }
    public function logout(){
        session(null);
        cookie('userId',null);
        cookie('userName',null);
//        session_destroy();
//        var_dump(cookie());
       header('Location:'.U('Index'));
    }
    public function proDetails(){
        $id=I('get.id');
        $loginFlag=0;
        if(cookie('userId')){
            $loginFlag=1;
            $ses=cookie();
        }
        if(session('userId')){
            $loginFlag=1;
            $ses=session();
        }
        $data=M('Pro as p')->where("p.id='{$id}'")->join('imooc_cate as c on c.id=p.cId')->where("p.id='{$id}'")->getField('p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName');
        $album=M('Album')->where("Pid='{$id}'")->select();
//        print_r($data);
//        print_r($album);
        $this->assign('id',$id);
        $this->assign('User',$ses);
        $this->assign('loginFlag',$loginFlag);
        $this->assign('data',$data);
        $this->assign('album',$album);
        $this->display();

    }
    public function test(){
        echo "sdfsdfsd";
    }
}