<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/4/11
 * Time: 16:56
 */
namespace Admin\Controller;

use Think\Controller;

//new \Org\Util\AjaxPage();
class AdminController extends Controller
{

    public function addAdmin()
    {
        if (IS_POST) {
            $inf = NULL;
            $data = I('post.');
//            print_r($data);
            $mes = D('Admin')->registerAdmin($data);
            foreach ($mes as $a) {
                $inf .= $a;
            }
            if ($mes) {
                $this->error($inf);
            } else {
                $this->success("添加成功", '/Admin/Admin/listAdmin');
            }
        } else {
            $this->display();
        }
    }

    public function listAdmin()
    {
        $mes = D('Admin')->listAdmin();
//        print_r($mes);
        $this->assign('userInf', $mes['list']);
        $this->assign('page', $mes['page']);
        $this->display();
    }

    public function editAdmin()
    {
        if (IS_POST) {
            $inf = NULL;
            $id = I('get.id', 0, 'int');
            $data = I('post.');

//            echo $id;
//            print_r($data);
//            exit;
            $mes = D('Admin')->editAdmin($id, $data);
            foreach ($mes as $a) {
                $inf .= $a;
            }
            if ($mes) {
                $this->error($inf);
            } else {
                header("Location:" . U('Admin/listAdmin'));
            }
        } else {
            $id = I('id', 0, 'int');
//        echo $id;
            $mes = D('Admin')->where("id='{$id}'")->find();
            $this->assign('userInf', $mes);
            $this->display();
        }
    }

    public function deleteAdmin()
    {
        $id = I('id', 0, 'int');
//        print_r($id);
        if (M('Admin')->where("id='{$id}'")->delete()) {
            header("Location:" . U('Admin/listAdmin'));
        } else {
            header("Location:" . U('Admin/listAdmin'));
        }
    }

//    public function testTable(){
//
//       import("Org.Util.AjaxPage");// 导入分页类  注意导入的是自己写的AjaxPage类
//        $credit = M('Admin');
//        $count = $credit->count(); //计算记录数
//        $limitRows = 5; // 设置每页记录数
//
//        $p = new \Org\Util\AjaxPage($count, $limitRows,"Admin"); //第三个参数是你需要调用换页的ajax函数名
//        $limit_value = $p->firstRow . "," . $p->listRows;
//
//        $data = $credit->order('id desc')->limit($limit_value)->select(); // 查询数据
//        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成
//
//        $this->assign('list',$data);
//        $this->assign('page',$page);
//        $this->display();
//
//    }
    public function listCate()
    {
        $mes = D('Cate')->listCate();
//        print_r($mes);
        $this->assign('cateInf', $mes['list']);
        $this->assign('page', $mes['page']);
        $this->display();
    }

    public function addCate()
    {
        if (IS_POST) {
            $data = I('post.');
            $mes = M('cate')->add($data);
            print_r($mes);
            if ($mes) {
                header("Location:" . U('Admin/listCate'));
            } else {
                header("Location:" . U('Admin/addCate'));
            }
        } else {
            $this->display();
        }
    }

    public function editCate()
    {
        if (IS_POST) {
            $inf = NULL;
            $id = I('get.id', 0, 'int');
            $data = I('post.');

//            echo $id;
//            print_r($data);
//            exit;
            $mes = D('Cate')->editCate($id, $data);
//            print_r($mes);
            if (!$mes) {
                $this->error($inf);
            } else {
                header("Location:" . U('Admin/listCate'));
            }
        } else {
            $id = I('id', 0, 'int');
//        echo $id;
            $mes = D('Cate')->where("id='{$id}'")->find();
            $this->assign('cateInf', $mes);
            $this->display();
        }
    }

    public function deleteCate()
    {
        $id = I('id', 0, 'int');
//        print_r($id);
        $mes=M('Pro')->where("cId='{$id}'")->select();
        foreach($mes as $del){
            D('Pro')->delPro($del['id']);
        }
        M('Cate')->where("id='{$id}'")->delete();
        header("Location:" . U('Admin/listCate'));
    }

    public function addPro()
    {
        if (IS_POST) {
            $data = I('post.');
//            print_r($data);
//            exit;
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
                $image = new \Think\Image();
                foreach ($info as $pic) {
                    $image->open("Public/Uploads/{$pic['savename']}");
// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    $image->thumb(50, 50,\Think\Image::IMAGE_THUMB_FIXED     )->save("Public/Uploads/image_50/{$pic['savename']}");
                    $image->thumb(220, 220,\Think\Image::IMAGE_THUMB_FIXED )->save("Public/Uploads/image_220/{$pic['savename']}");
                    $image->thumb(350, 350,\Think\Image::IMAGE_THUMB_FIXED )->save("Public/Uploads/image_350/{$pic['savename']}");
                    $image->thumb(800, 800,\Think\Image::IMAGE_THUMB_FIXED )->save("Public/Uploads/image_800/{$pic['savename']}");
                }
                D('Pro')->addPro($data,$info);
                header("Location:" . U('Admin/listPro'));
            }
        } else {
            $mes = M('cate')->select();

            $this->assign('cateInf', $mes);

            $this->display();
        }
    }
    public function listPro(){

        $order=I('get.order','p.id DESC','string');
        $keywords=I('get.keywords');
//        print_r($keywords);
        $map['p.pName']=array('LIKE',"%{$keywords}%");//模糊查询
//        $mes=M('Pro')->select();
        $page =I('p',1,'int');
        $limit=5;
        if($keywords){
        $mes = M('Pro as p')->join('imooc_cate as c on c.id=p.cId')->where($map)->order("{$order}")->page($page.','.$limit)->getField('p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName');}
        else{
            $mes = M('Pro as p')->join('imooc_cate as c on c.id=p.cId')->order("{$order}")->page($page.','.$limit)->getField('p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName');
        }
        $count= M('Pro')->count();
        $Page=new \Think\Page($count,$limit);
        $show=$Page->show();
//        $mes=M('Pro as p')->join('imooc_cate as c on c.id=p.cId')->getField('p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName');
//        print_r($mes);
//        exit;
        $imgAddr=D('Album')->select();
//        print_r($imgAddr);
        $this->assign('Pro',$mes);
        $this->assign('page',$show);
        $this->assign('imgAddr',$imgAddr);
            $this->display();
    }
    public function editPro(){
        if(IS_POST){
            $pid = I('get.id');
            $data=I('post.');
            print_r($data);
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
                $wrongmes=$upload->getError();
                print_r($wrongmes);
                if($wrongmes=="没有文件被上传！"){
                   M('Pro')->where("id='{$pid}'")->save($data); // 根据条件更新记录
                    header("Location:" . U('Admin/listPro'));
                }else{
                    print_r("2");
                    $this->error($wrongmes);
                }
            } else {// 上传成功
                $image = new \Think\Image();
                foreach ($info as $pic) {
                    $image->open("Public/Uploads/{$pic['savename']}");
// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    $image->thumb(50, 50, \Think\Image::IMAGE_THUMB_FIXED)->save("Public/Uploads/image_50/{$pic['savename']}");
                    $image->thumb(220, 220, \Think\Image::IMAGE_THUMB_FIXED)->save("Public/Uploads/image_220/{$pic['savename']}");
                    $image->thumb(350, 350, \Think\Image::IMAGE_THUMB_FIXED)->save("Public/Uploads/image_350/{$pic['savename']}");
                    $image->thumb(800, 800, \Think\Image::IMAGE_THUMB_FIXED)->save("Public/Uploads/image_800/{$pic['savename']}");
                }
                foreach($info as $addr){
                    $Album['Pid']=$pid;
                    $Album['albumPath']=$addr['savename'];
                    M('Album')->add($Album);
                }
                M('Pro')->where("id='{$pid}'")->save($data);
                header("Location:" . U('Admin/listPro'));
            }
        }else {
            $pid = I('get.id');
//        print_r($pid);
//        $mes = M('Pro as p')->join('imooc_cate as c on c.id=p.cId')->where("p.id='{$pid}'")->getField('p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName');
            $mes = M('Pro')->where("id='{$pid}'")->find();
            $cate = M('cate')->select();
            $this->assign('cateInf', $cate);
//        print_r($mes);
            $this->assign('pro', $mes);
            $this->display();
        }
    }
    public function deletePro(){

//        print_r($pid);


//        print_r($picAddr);
        $pid=I('get.id');
        D('Pro')->delPro($pid);
        header("Location:" . U('Admin/listPro'));
    }
    public function addUser(){
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
            print_r($info);
//            exit;
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $data['face']=$info['myFile']['savename'];
                $data['regTime']=time();
//                print_r($data);
//                exit;
                $mes=D('User')->reg($data);
                if ($mes==1){
                    header("Location:" . U('Admin/listUser'));
                }else{
                    $this->error("用户名必须是英文或数字或下划线，且4-20！密码必须是4到十位");
                }
            }
        }else {
            $this->display();
        }
    }
    public function listUser(){
        $mes = D('User')->listUser();
//        print_r($mes);
        $this->assign('userInf', $mes['list']);
        $this->assign('page', $mes['page']);
        $this->display();
    }
    public function editUser(){
        if(IS_POST){
            $id=I('get.id');
            $data=I('post.');
            $data['id']=$id;
            $data['password']=md5( $data['password']);
//            print_r($data);
            M('User')->where("id='{$data['id']}'")->save($data);
            header("Location:" . U('Admin/listUser'));
        }else {
            $id=I('get.id');
            $mes=M('User')->where("id='{$id}'")->find();
            print_r($mes);
            $this->assign('userInf',$mes);
            $this->display();
        }
    }
    public function deleteUser(){
        $id=I('get.id');
        $face=M('User')->where("id='{$id}'")->getField('face');
//        print_r($face);
        unlink("Public/Uploads/".$face);
        M('User')->where("id='{$id}'")->delete();
        header("Location:" . U('Admin/listUser'));

    }
    public function listProImages(){
        $datas=D('Pro')->getProAndImg();
//        print_r($datas);
//        exit;
        $this->assign('datas',$datas);
        $this->display();
    }
    public function addWaterText(){
        $image = new \Think\Image();
        $id=I('get.id');
        $addrImg=M('Album')->where("Pid='{$id}'")->select();
//        print_r($addrImg);
//        exit;
        // 在图片右下角添加水印文字 ThinkPHP 并保存为new.jpg
        foreach($addrImg as $img){
//            print_r($img);
            $image->open("Public/Uploads/".$img['albumpath'])->text('ThinkPHP','Fonts/SIMYOU.ttf',20,'#000000',\Think\Image::IMAGE_WATER_SOUTHEAST)->save("Public/Uploads/".$img['albumpath']);
        }
        header("Location:". U('Admin/listProImages'));

    }
    public function addWaterPic(){
        $image = new \Think\Image();
        $id=I('get.id');
        $addrImg=M('Album')->where("Pid='{$id}'")->select();
//        print_r($addrImg);
//        exit;
        // 在图片右下角添加水印文字 ThinkPHP 并保存为new.jpg
        foreach($addrImg as $img){
//            print_r($img);
            $image->open("Public/Uploads/".$img['albumpath'])->water("Public/Uploads/logo.jpg",\Think\Image::IMAGE_WATER_NORTHWEST,50)->save("Public/Uploads/".$img['albumpath']);
        }
        header("Location:". U('Admin/listProImages'));
    }
}