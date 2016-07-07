<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" 
  title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
    <h3>添加商品</h3>
    <form action="<?php echo U('Admin/editPro',array('id'=>$pro['id']));?>" method="post" enctype="multipart/form-data">
        <table class="table table-striped table-hover">
            <tr>
                <td align="right">商品名称</td>
                <td><input type="text" name="pName"  placeholder="<?php echo ($pro["pname"]); ?>"/></td>
            </tr>
            <tr>
                <td align="right">商品分类</td>
                <td>
                    <select name="cId">
                        <?php if(is_array($cateInf)): foreach($cateInf as $key=>$cate): ?><option name='cid' value="<?php echo ($cate["id"]); ?>"><?php echo ($cate["cname"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">商品货号</td>
                <td><input type="text" name="pSn"  placeholder="<?php echo ($pro["psn"]); ?>"/></td>
            </tr>
            <tr>
                <td align="right">商品数量</td>
                <td><input type="text" name="pNum"  placeholder="<?php echo ($pro["pnum"]); ?>"/></td>
            </tr>
            <tr>
                <td align="right">商品市场价</td>
                <td><input type="text" name="mPrice"  placeholder="<?php echo ($pro["mprice"]); ?>"/></td>
            </tr>
            <tr>
                <td align="right">商品慕课价</td>
                <td><input type="text" name="iPrice"  placeholder="<?php echo ($pro["iprice"]); ?>"/></td>
            </tr>
            <tr>
                <td align="right">商品描述</td>
                <td>
                    <textarea name="pDesc" id="editor_id" style="width:100%;height:150px;"><?php echo ($pro["pdesc"]); ?></textarea>
                </td>
            </tr>
            <tr>
                <td align="right">商品图像</td>
                <td>
                    <input type='file'  name='photo[]'>
                    <input type='file'  name='photo[]'>
                    <input type='file'  name='photo[]'>
                    <div id="attachList" class="clear"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="btn btn-default" value="编辑商品"/></td>
            </tr>
        </table>
    </form>
</body>
</html>