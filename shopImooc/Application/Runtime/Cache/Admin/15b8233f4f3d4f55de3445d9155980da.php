<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>Ajax无刷新分页</title>
    <script src="/Application/Admin/Public/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        function Admin(id){    //user函数名 一定要和action中的第三个参数一致上面有
            var id = id;
            $.get('Admin/testTable', {'p':id}, function(data){  //用get方法发送信息到UserAction中的user方法
                $("#Admin").replaceWith("<div  id='Admin'>"+data+"</div>"); //user一定要和tpl中的一致
            });
        }

    </script>
</head>

<body>
<div id='Admin'>   <!--这里的user和下面js中的test要一致-->
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><!--内容输出-->
        <<?php echo ($list["id"]); ?>>&nbsp;&nbsp;<<?php echo ($list["username"]); ?>><br/><?php endforeach; endif; else: echo "" ;endif; ?>
    <<?php echo ($page); ?>>  <!--分页输出-->
</div>

</body>
</html>