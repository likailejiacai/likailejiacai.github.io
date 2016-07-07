<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>-.-</title>
    <link rel="stylesheet" href="/Public/styles/backstage.css">
    <link rel="stylesheet" href="/Public/scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <script src="/Public/scripts/jquery-ui/js/jquery-1.10.2.js"></script>
    <script src="/Public/scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="/Public/scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
  </head>

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
              <td><input type="checkbox" id="c<?php echo ($pro["id"]); ?>" class="check" value=<?php echo ($pro["id"]); ?>><label for="c1" class="label"><?php echo ($pro["id"]); ?></label></td>
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
                <input type="button" value="详情" class="btn" onclick="showDetail(<?php echo ($pro["id"]); ?>,'<?php echo ($pro["pname"]); ?>')"><input type="button" value="修改" class="btn" onclick="editPro(<?php echo ($pro["id"]); ?>)"><input type="button" value="删除" class="btn"onclick="delPro(<?php echo ($pro["id"]); ?>)">
                <div id="showDetail<?php echo ($pro["id"]); ?>" style="display:none;">
                  <table class="table" cellspacing="0" cellpadding="0">
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
                        <!-- <?php if(is_array($imgAddr)): foreach($imgAddr as $key=>$img): ?>-->
                        <!--   <?php if(($img["pid"]) == $pro["id"]): ?>-->
                        <!--    <img width="100" height="100" src="/Public/Uploads/image_350/<?php echo ($img["albumpath"]); ?>" alt=""/> &nbsp;&nbsp;<?php endif; ?> -->
                        <!--<?php endforeach; endif; ?> -->
                        <img src="/Public/Uploads/1.jpg" class="" alt="" />
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
                        <?php if(($pro["ishot"]) == "1"): ?>热卖<?php else: ?>正常<?php endif; ?>
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
            <td><?php echo ($page); ?></td>
            </tr>
        </tbody>
      </table>
    </div>
    <script type="text/javascript">
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
  window.location='/index.php/Admin/Pro/add';
}
function editPro(id){
  window.location='/index.php/Admin/Pro/edit/id/'+id;
}
function delPro(id){
  if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
    window.location="doAdminAction.php?act=delPro&id="+id;
  }
}
function search(){
  if(event.keyCode==13){
    var val=document.getElementById("search").value;
    window.location="listPro.php?keywords="+val;
  }
}
function change(val){
  window.location="listPro.php?order="+val;
}
   </script>
  </body>
</html>