<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>-.-</title>

    <link rel="stylesheet" type="text/css" href="/Application/Admin/Public/js/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="/Application/Admin/Public/js/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />

    <link rel="stylesheet" href="/Application/Admin/Public/style/backstage.css">
    <script src="/Application/Admin/Public/js/jquery-2.1.4.min.js"></script>
    <script src="/Application/Admin/Public/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Application/Admin/Public/js/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="/Application/Admin/Public/js/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>

<div class="head">
    <div class="logo fl"><a href="#"></a></div>
    <h3 class="head_text fr">慕课电子商务后台管理系统</h3>
</div>
<div class="operation_user clearfix">
    <div class="link fr" >
        <b>欢迎您
            <?php echo ($adminName); ?>
        </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="<?php echo U('Admin/index/Logout');?>" class="icon icon_e">退出</a>
    </div>
</div>

<div class="content clearfix">

    <div class="main">
        <!--右侧内容-->
        <div class="cont">
            <div class="title">后台管理</div>
            
    <h3>编辑用户</h3>
    <form action="<?php echo U('Admin/editUser',array('id'=>$userInf['id']));?>" method="post" enctype="multipart/form-data">
        <table class="table table-striped table-hover">
            <tr>
                <td align="right">用户名</td>
                <td><input type="text" name="username" placeholder="<?php echo ($userInf["username"]); ?>"/></td>
            </tr>
            <tr>
                <td align="right">密码</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td align="right">邮箱</td>
                <td><input type="text" name="email" placeholder="<?php echo ($userInf["email"]); ?>"/></td>

            </tr>
            <tr>
                <td align="right">性别</td>
                <td><input type="radio" name="sex" value="1"  <?php if(($userInf["sex"]) == "1"): ?>checked="checked"<?php endif; ?>/>男
                    <input type="radio" name="sex" value="2"<?php if(($userInf["sex"]) == "2"): ?>checked="checked"<?php endif; ?> />女
                    <input type="radio" name="sex" value="3" <?php if(($userInf["sex"]) == "3"): ?>checked="checked"<?php endif; ?> />保密
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="btn btn-default" value="编辑用户"/></td>
            </tr>

        </table>
    </form>

            <!-- 嵌套网页结束 -->
        </div>
    </div>

    
    <!--左侧列表-->
    <div class="menu">
        <div class="cont">
            <div class="title">管理员</div>
            <ul class="mList">
                <li>
                    <h3><span onclick="show('menu1','change1')" id="change1">+</span>商品管理</h3>
                    <dl id="menu1" style="display:none;">
                        <dd><a href="<?php echo U('Admin/Admin/addPro');?>" >添加商品</a></dd>
                        <dd><a href="<?php echo U('Admin/Admin/listPro');?>" >商品列表</a></dd>
                    </dl>
                </li>
                <li>
                    <h3><span onclick="show('menu2','change2')" id="change2">+</span>分类管理</h3>
                    <dl id="menu2" style="display:none;">
                        <dd><a href="<?php echo U('Admin/Admin/addCate');?>" >添加分类</a></dd>
                        <dd><a href="<?php echo U('Admin/Admin/listCate');?>" >分类列表</a></dd>
                    </dl>
                </li>
                <li>
                    <h3><span  onclick="show('menu3','change3')" id="change3" >+</span>订单管理</h3>
                    <dl id="menu3" style="display:none;">
                        <dd><a href="#">订单修改</a></dd>
                        <dd><a href="#">订单又修改</a></dd>
                        <dd><a href="#">订单总是修改</a></dd>
                        <dd><a href="#">测试内容你看着改</a></dd>
                    </dl>
                </li>
                <li>
                    <h3><span onclick="show('menu4','change4')" id="change4">+</span>用户管理</h3>
                    <dl id="menu4" style="display:none;">
                        <dd><a href="<?php echo U('Admin/Admin/addUser');?>" >添加用户</a></dd>
                        <dd><a href="<?php echo U('Admin/Admin/listUser');?>" >用户列表</a></dd>
                    </dl>
                </li>
                <li>
                    <h3><span onclick="show('menu5','change5')" id="change5">+</span>管理员管理</h3>
                    <dl id="menu5" style="display:none;">
                        <dd><a href="<?php echo U('Admin/Admin/addAdmin');?>" >添加管理员</a></dd>
                        <dd><a href="<?php echo U('Admin/Admin/listAdmin');?>" >管理员列表</a></dd>
                    </dl>
                </li>

                <li>
                    <h3><span onclick="show('menu6','change6')" id="change6">+</span>商品图片管理</h3>
                    <dl id="menu6" style="display:none;">
                        <dd><a href="listProImages.php" target="mainFrame">商品图片列表</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    
</div>
<script type="text/javascript">
    function show(num,change){
        var menu=document.getElementById(num);
        var change=document.getElementById(change);
        if(change.innerHTML=="+"){
            change.innerHTML="-";
        }else{
            change.innerHTML="+";
        }
        if(menu.style.display=='none'){
            menu.style.display='';
        }else{
            menu.style.display='none';
        }
    }
</script>
</body>
</html>