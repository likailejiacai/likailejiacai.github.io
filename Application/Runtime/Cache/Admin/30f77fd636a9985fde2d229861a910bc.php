<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="/Public/styles/backstage.css">
</head>

<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">管理员名称</th>
                                <th width="30%">管理员邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if(is_array($userInf)): $i = 0; $__LIST__ = $userInf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>
                              <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo ($user["id"]); ?></label>
</td>
                              <td><?php echo ($user["username"]); ?></td>
                              <td><?php echo ($user["email"]); ?></td>
                              <td align="center"><input type="button" value="edit" class="btn" onclick="editAdmin(<?php echo ($user["id"]); ?>)"><input type="button" value="delete" class="btn" onclick="delAdmin(<?php echo ($user["id"]); ?>)"></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                          <tr>
                            <td colspan="4"><?php echo ($page); ?></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function addAdmin(){
		window.location="/index.php/Admin/Admin/add";	
	}
	function editAdmin(id){
			window.location="/index.php/Admin/Admin/edit/id/"+id;
	}
	function delAdmin(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="/index.php/Admin/Admin/delete/id/"+id;
			}
	}
</script>
</html>