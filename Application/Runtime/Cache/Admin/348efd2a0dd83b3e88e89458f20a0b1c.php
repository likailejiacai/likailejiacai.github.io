<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="/Public/styles/backstage.css">
</head>

<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="add()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="20%">用户名称</th>
                                <th width="20%">用户邮箱</th>
                                <th width="20%">是否激活</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                              <!--这里的id和for里面的c1 需要循环出来-->


                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo ($vo["id"]); ?></label></td>
                                <td><?php echo ($vo["username"]); ?></td>
                                <td><?php echo ($vo["email"]); ?></td>
                                <td>

                                 </td>
                              <td align="center"><input type="button" value="修改" class="btn" onclick="edit(<?php echo ($vo["id"]); ?>)"><input type="button" value="删除" class="btn"  onclick="del(<?php echo ($vo["id"]); ?>)"></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                          <tr>
                          <td>  <?php echo ($page); ?></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function add(){
		window.location="/index.php/Admin/User/add";	
	}
	function edit(id){
			window.location="/index.php/Admin/User/edit/id/"+id;
	}
	function del(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="/index.php/Admin/User/del/id/"+id;
			}
	}
</script>
</html>