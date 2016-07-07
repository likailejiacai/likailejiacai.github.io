<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
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
                                <th width="25%">分类</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo ($vo["id"]); ?></label></td>
                                <td align="right"><?php echo ($vo["cname"]); ?></td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="edit(<?php echo ($vo["id"]); ?>)"><input type="button" value="删除" class="btn"  onclick="del(<?php echo ($vo["id"]); ?>)"></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                            	<td colspan="4"><?php echo ($page); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
	function edit(id){
		window.location="/index.php/Admin/Cate/edit/id/"+id;
	}
	function del(id){
		if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
			window.location="/index.php/Admin/Cate/del/id/"+id;
		}
	}
	function add(){
		window.location="/index.php/Admin/Cate/add";
	}
</script>
</body>
</html>