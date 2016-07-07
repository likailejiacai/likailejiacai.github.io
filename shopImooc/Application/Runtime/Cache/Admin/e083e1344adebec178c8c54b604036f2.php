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
            

<body>
<div id="showDetail"  style="display:none;">

</div>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
        </div>
        <div class="fr">
            <div class="text">
                <span>商品价格：</span>
                <div class="bui_select">
                    <select id="" class="select" onchange="change(this.value)">
                        <option>-请选择-</option>
                        <option value="iPrice asc" >由低到高</option>
                        <option value="iPrice desc">由高到底</option>
                    </select>
                </div>
            </div>
            <div class="text">
                <span>上架时间：</span>
                <div class="bui_select">
                    <select id="" class="select" onchange="change(this.value)">
                        <option>-请选择-</option>
                        <option value="pubTime desc" >>最新发布</option>
                        <option value="pubTime asc">历史发布</option>
                    </select>
                </div>
            </div>
            <div class="text">
                <span>搜索</span>
                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
            </div>
        </div>
    </div>
    <!--表格-->
    <table class=" table table-striped table-hover" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="10%">编号</th>
            <th width="20%">商品名称</th>
            <th width="10%">商品分类</th>
            <th width="10%">是否上架</th>
            <th width="15%">上架时间</th>
            <th width="10%">慕课价格</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($Pro)): foreach($Pro as $key=>$pro): ?><tr>
            <!--这里的id和for里面的c1 需要循环出来-->
            <td><input type="checkbox" id="c<?php echo $row['id'];?>" class="check" value='<?php echo ($pro["id"]); ?>'><label for="c1" class="label"><?php echo ($pro["id"]); ?></label></td>
            <td><?php echo ($pro["pname"]); ?></td>
            <td><?php echo ($pro["cname"]); ?></td>
            <td>
                <?php if(($pro["isshow"]) == "1"): ?>上架
                    <?php else: ?>
                    下架<?php endif; ?>
            </td>
            <td><?php echo (date("y-m-d H:i:s",$pro['pubtime'])); ?></td>
            <td><?php echo ($pro["iprice"]); ?>元</td>
            <td align="center">
                <input type="button" value="详情" class="btn" onclick="showDetail(<?php echo ($pro["id"]); ?>,'<?php echo ($pro["pname"]); ?>')">
                <!--<input type="button" value="修改" class="btn" onclick="editPro('<?php echo ($pro["id"]); ?>')">        -->
                <a class="btn btn-default" role="button" href="<?php echo U('Admin/editPro',array('id'=>$pro['id']));?>">编辑</a>
                <input type="button" value="删除" class="btn"onclick="delPro('<?php echo ($pro["id"]); ?>')">
                <!--<a class="btn btn-default" role="button" href="<?php echo U('Admin/deletePro',array('id'=>$pro['id']));?>">删除</a>-->
                <div id="showDetail<?php echo ($pro["id"]); ?>" style="display:none;">
                    <table class="table " cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="20%" align="right">商品名称</td>
                            <td><?php echo ($pro["pname"]); ?></td>
                        </tr>
                        <tr>
                            <td width="20%"  align="right">商品类别</td>
                            <td><?php echo ($pro["cname"]); ?></td>
                        </tr>
                        <tr>
                            <td width="20%"  align="right">商品货号</td>
                            <td><?php echo ($pro["psn"]); ?></td>
                        </tr>
                        <tr>
                            <td width="20%"  align="right">商品数量</td>
                            <td><?php echo ($pro["pnum"]); ?></td>
                        </tr>
                        <tr>
                            <td  width="20%"  align="right">商品价格</td>
                            <td><?php echo ($pro["mprice"]); ?></td>
                        </tr>
                        <tr>
                            <td  width="20%"  align="right">幕课网价格</td>
                            <td><?php echo ($pro["iprice"]); ?></td>
                        </tr>
                        <tr>
                            <td width="20%"  align="right">商品图片</td>
                            <td>
                            <?php if(is_array($imgAddr)): foreach($imgAddr as $key=>$img): if(($img["pid"]) == $pro["id"]): ?><img width="100" height="100" src="/Public/Uploads/image_350/<?php echo ($img["albumpath"]); ?>" alt=""/> &nbsp;&nbsp;<?php endif; endforeach; endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%"  align="right">是否上架</td>
                            <td>
                                <?php if(($pro["isshow"]) == "1"): ?>上架
                                    <?php else: ?>
                                    下架<?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%"  align="right">是否热卖</td>
                            <td>
                                <?php if(($pro["ishot"]) == "1"): ?>热卖
                                    <?php else: ?>
                                    正常<?php endif; ?>
                            </td>
                        </tr>
                    </table>
					                        	<span style="display:block;width:80%; ">
					                        	商品描述<br/>
                                                   <?php echo ($pro["pdesc"]); ?>
					                        	</span>
                </div>

            </td>
        </tr><?php endforeach; endif; ?>

        <tr>
            <td colspan="7"><?php echo ($page); ?></td>
        </tr>

        </tbody>
    </table>
</div>

</body>
    <script >
        function showDetail(id,t){
            $("#showDetail"+id).dialog({
                height:"auto",
                width: "auto",
                position: {my: "center", at: "center",  collision:"fit"},
                modal:false,//是否模式对话框
                draggable:true,//是否允许拖拽
                resizable:true,//是否允许拖动
                title:"商品名称："+t,//对话框标题
                show:"slide",
                hide:"explode"
            });
        }
        function addPro(){
            window.location='addPro.php';
        }
        function editPro(id){
            window.location='editPro.php?id='+id;
        }
        function delPro(id){
            if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
                window.location="/index.php/Admin/Admin/deletePro/id/"+id;
            }
        }
        function search(){
            if(event.keyCode==13){
                var val=document.getElementById("search").value;
                window.location="/index.php/Admin/Admin/listPro/keywords/"+val;
            }
        }
        function change(val){

            window.location="/index.php/Admin/Admin/listPro/order/"+val;
        }
    </script>
    
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