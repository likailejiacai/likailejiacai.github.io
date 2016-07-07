<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理系统</title>

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
        </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Admin/Index/Index');?>" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="<?php echo U('Admin/Index/Logout');?>" class="icon icon_e">退出</a>
    </div>
</div>

<div class="content clearfix">

    <div class="main">
        <!--右侧内容-->
        <div class="cont">
            <div class="title">后台管理</div>
            
    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Insert title here</title>
    </head>
    <body>
    <center>
        <h3>系统信息</h3>
        <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
            <tr>
                <th>操作系统</th>
                <td><?php echo PHP_OS;?></td>
            </tr>
            <tr>
                <th>Apache版本</th>
                <td><?php echo apache_get_version();?></td>
            </tr>
            <tr>
                <th>PHP版本</th>
                <td><?php echo PHP_VERSION;?></td>
            </tr>
            <tr>
                <th>运行方式</th>
                <td><?php echo PHP_SAPI;?></td>
            </tr>
        </table>
        <h3>软件信息</h3>
        <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
            <tr>
                <th>系统名称</th>
                <td>慕课网电子商城</td>
            </tr>
            <tr>
                <th>开发团队</th>
                <td>Ewan <Reton></Reton></td>
            </tr>
            <tr>
                <th>公司网址</th>
                <td><a href="http://www.imooc.com">http://www.imooc.com</a></td>
            </tr>
            <tr>
                <th>成功案例</th>
                <td>慕课网</td>
            </tr>
        </table>
    </center>

    </body>
    </html>

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
                        <dd><a href="<?php echo U('Admin/Admin/listProImages');?>" >商品图片列表</a></dd>
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