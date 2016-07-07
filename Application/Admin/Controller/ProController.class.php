<?php
namespace Admin\Controller;
use Think\Controller;
class ProController extends Controller{
    public function list(){
        // $mes=M('Pro as p')->join('imooc_cate as c on c.id=p.cid')->getField('p.pName,p.pSn,p.pNum,p.mprice,p.iprice,p.pdesc,p.pubTime,p.isShow,p.isHot,p.cid');
        $Pro=M('Pro');
        $count=$Pro->count();
        $page= new \Think\Page($count,5);
        $show=$page->show();
        $mes=M('Pro as p')->join('imooc_cate as c on c.id=p.cId')->limit($page->firstRow.','.$page->listRows)->getField('p.id,p.pName,p.pSn,p.pNum,p.mprice,p.iprice,p.pdesc,p.pubTime,p.isShow,p.isHot,c.cName');
        $imgAddr=M('Album')->select();
        $this->assign('Pro',$mes);
        $this->assign('page',$show);
        $this->assign('imgAddr',$imgAddr);
        $this->display();

    }
    public function add(){
        $db=M('Cate');
        $list=$db->select();
        $this->assign('list',$list);
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

        $Pro=M("album");
        var_dump(        $info=$upload->upload());
        var_dump(      $a= $info['photo']['savename']);
        exit;
        var_dump($data['albumPath']=$info['photo']['savename']);exit;
        if($Pro->create()){
            $result=$Pro->add();
            if(!$result){
                $this->error();
            }
            $this->redirect("list");
        }else{
            $this->error();
        }

    }
    public function edit($id){
        $Pro=M('Pro');
        $id=I('id');
        $this->assign('pro',$Pro->find($id));
        $this->display();
    }
    public function editHandle($id){
        $Pro=M('Pro');
        if($Pro->create()){
            $result=$Pro->where("id=$id")->save();
            if(!$result){
                $this->error();
            }
            $this->redirect("list");
        }
    }
    public function del($id){
        $Pro=M('Pro');
        $id=I('id');
        if(!$Pro->where("id=$id")->delete()){
            $this->error();
        }
        $this->redirect("list");

    }
}