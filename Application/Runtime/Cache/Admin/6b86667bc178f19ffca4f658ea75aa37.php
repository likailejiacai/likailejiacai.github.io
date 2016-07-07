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
                <option value="pubTime desc" >最新发布</option>
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
      <table class="table" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th width="10%">编号</th>
            <th width="20%">商品名称</th>
            <th>商品图片</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <!--这里的id和for里面的c1 需要循环出来-->
              <td><input  type="checkbox" id="c<?php echo ($vo["id"]); ?>" class="check" value=<?php echo ($vo["id"]); ?>><label for="c1" class="label"><?php echo ($vo["id"]); ?></label></td>

              <td><?php echo ($vo["pname"]); ?></td>
              <td><?php echo ($vo["albumpath"]); ?></td>
              <img width="100" height="100" src="Public/Uploads/<?php echo ($vo["albumpath"]); ?>" alt=""/> &nbsp;&nbsp;


	      <td>

		<input type="button" value="添加文字水印" onclick="doImg('<?php echo ($vo["id"]); ?>','waterText')" class="btn"/>

		<br/>
		<input type="button" value="添加图片水印" onclick="doImg('<?php echo ($vo["id"]); ?>','waterPic')" class="btn"/>
	      </td>




            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
    </div>
    <script type="text/javascript">
  function doImg(id,act){
    window.location="/index.php/Admin/Image/"+act+"/id/"+id;
  }
    </script>
  </body>
</html>