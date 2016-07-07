<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <link type="text/css" rel="stylesheet" href="/Application/Home/Public/style/reset.css">
    <link type="text/css" rel="stylesheet" href="/Application/Home/Public/style/main.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="/Application/Home/Public/js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript" src="/Application/Home/Public/js/ie6Fixpng.js"></script>
    <![endif]-->
    <link type="text/css" rel="stylesheet" media="all" href="/Application/Home/Public/style/jquery.jqzoom.css"/>
    <script src="/Application/Home/Public/js/jquery-1.6.js" type="text/javascript"></script>
    <script src="/Application/Home/Public/js/jquery.jqzoom-core.js" type="text/javascript"></script>

</head>
<body>
<div class="headerBar">
    <div class="topBar">
        <div class="comWidth">
            <div class="leftArea">
                <a href="#" class="collection">收藏慕课</a>
            </div>
            <div class="rightArea">
                欢迎来到慕课网！
                <?php if(($loginFlag ) > "0"): ?><span>欢迎您</span> <?php echo ($User["userName"]); ?><a href="<?php echo U('Home/Index/logout',array('id'=>$User.userId));?>">[退出]</a>
                    <?php else: ?> <a href="<?php echo U('Home/Index/login');?>">[登录]</a><a href="<?php echo U('Home/Index/reg');?>">[免费注册]</a><?php endif; ?>

            </div>
        </div>
    </div>
    
<body>

    <div class="logoBar">
        <div class="comWidth">
            <div class="logo fl">
                <a href="#"><img src="/Application/Home/Public/images/logo.jpg" alt="慕课网"></a>
            </div>
            <div class="search_box fl">
                <input type="text" class="search_text fl">
                <input type="button" value="搜 索" class="search_btn fr">
            </div>
            <div class="shopCar fr">
                <span class="shopText fl">购物车</span>
                <span class="shopNum fl">0</span>
            </div>
        </div>
    </div>
    <div class="navBox">
        <div class="comWidth clearfix">
            <div class="shopClass fl">
                <h3>全部商品分类<i class="shopClass_icon"></i></h3>
                <div class="shopClass_show">
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                    <dl class="shopClass_item">
                        <dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
                        <dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
                    </dl>
                </div>
                <div class="shopClass_list hide">
                    <div class="shopClass_cont">
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <dl class="shopList_item">
                            <dt>电脑装机</dt>
                            <dd>
                                <a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
                            </dd>
                        </dl>
                        <div class="shopList_links">
                            <a href="#">文字测试内容等等<span></span></a><a href="#">文字容等等<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav fl">
                <li><a href="#" class="active">数码城</a></li>
                <li><a href="#">天黑黑</a></li>
                <li><a href="#">团购</a></li>
                <li><a href="#">发现</a></li>
                <li><a href="#">二手特卖</a></li>
                <li><a href="#">名品会</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="banner comWidth clearfix">
    <div class="banner_bar banner_big">
        <ul class="imgBox">
            <li><a href="#"><img src="/Application/Home/Public/images/banner/banner_01.jpg" alt="banner"></a></li>
            <li><a href="#"><img src="/Application/Home/Public/images/banner/banner_02.jpg" alt="banner"></a></li>
        </ul>
        <div class="imgNum">
            <a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
        </div>
    </div>
</div>
<?php if(is_array($datas)): foreach($datas as $key=>$cate): ?><div class="shopTit comWidth">
    <span class="icon"></span><h3><?php echo ($cate["cname"]); ?></h3>
    <a href="#" class="more">更多&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
    <div class="leftArea">
        <div class="banner_bar banner_sm">
            <ul class="imgBox">
                <li><a href="#"><img src="/Application/Home/Public/images/banner/banner_sm_01.jpg" alt="banner"></a></li>
                <li><a href="#"><img src="/Application/Home/Public/images/banner/banner_sm_02.jpg" alt="banner"></a></li>
            </ul>
            <div class="imgNum">
                <a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
            </div>
        </div>
    </div>
    <div class="rightArea">
        <div class="shopList_top clearfix">
            <?php if(is_array($cate["BigPro"])): foreach($cate["BigPro"] as $key=>$pro): ?><div class="shop_item">
                <div class="shop_img">
                    <a href="<?php echo U('Home/Index/proDetails',array('id'=>$pro['id']));?>"><img src="/Public/Uploads/image_220/<?php echo ($pro['albumPath'][0]['albumpath']); ?>" alt=""></a>
                </div>
                <h3><?php echo ($pro["pname"]); ?></h3>
                <p><?php echo ($pro["iprice"]); ?></p>
            </div><?php endforeach; endif; ?>
        </div>
        <div class="shopList_sm clearfix">
            <?php if(is_array($cate["smPro"])): foreach($cate["smPro"] as $key=>$pro): ?><div class="shopItem_sm">
                <div class="shopItem_smImg">
                    <a href="<?php echo U('Home/Index/proDetails',array('id'=>$pro['id']));?>"><img src="/Public/Uploads/image_220/<?php echo ($pro['albumPath'][0]['albumpath']); ?>" alt=""></a>
                </div>
                <div class="shopItem_text">
                    <p><?php echo ($pro["pname"]); ?></p>
                    <h3><?php echo ($pro["iprice"]); ?>	</h3>
                </div>
            </div><?php endforeach; endif; ?>
        </div>
    </div>
</div><?php endforeach; endif; ?>

<div class="hr_25"></div>
<div class="footer">
    <p><a href="#">慕课简介</a><i>|</i><a href="#">慕课公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
    <p>Copyright &copy; 2006 - 2014 慕课版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
    <p class="web"><a href="#"><img src="/Application/Home/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/Application/Home/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/Application/Home/Public/images/webLogo.jpg" alt="logo"></a><a href="#"><img src="/Application/Home/Public/images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>