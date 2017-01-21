<?php if (!defined('THINK_PATH')) exit();?><!--后台顶部模板-->

<!DOCTYPE html>
<html>
<head>
    <title>后台</title>
    <meta charset="utf-8">
    <!--<link rel="icon" type="image/png" href="/Public/assets/images/icon.png">-->
    <link href="/Public/assets/css/admin_cus.css" rel="stylesheet" type="text/css">
    <link href="/Public/sb-admin 1.0.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/sb-admin 1.0.4/css/sb-admin.css" rel="stylesheet">
    <link href="/Public/sb-admin 1.0.4/css/plugins/morris.css" rel="stylesheet">
    <link href="/Public/sb-admin 1.0.4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/Public/css/admin.css" rel="stylesheet" type="text/css">
    <script src="/Public/assets/js/jquery.min.js"></script>
    <script src="/Public/sb-admin 1.0.4/js/jquery.js"></script>
    <script src="/Public/sb-admin 1.0.4/js/bootstrap.min.js"></script>
    <script src="/Public/sb-admin 1.0.4/js/plugins/morris/raphael.min.js"></script>
    <script src="/Public/sb-admin 1.0.4/js/plugins/morris/morris.min.js"></script>
    <script src="/Public/sb-admin 1.0.4/js/plugins/morris/morris-data.js"></script>
</head>
<body>
<div id="wrapper" style="height:1200px;overflow:auto;">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!--载入顶部模板-->
        <!--顶部模板-->

<div class="navbar-header">
    <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">-->
        <!--<span class="sr-only">Toggle navigation</span>-->
        <!--<span class="icon-bar"></span>-->
        <!--<span class="icon-bar"></span>-->
        <!--<span class="icon-bar"></span>-->
    <!--</button>-->
    <a class="navbar-brand" href=""><?php echo session['yang.adminid']?'YANGYANG':'XXX'; ?> 后台管理 </a>
</div>
<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo session('yang.adminName')?session('yang.adminName'):'某某'; ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href=""><i class="fa fa-fw fa-gear"></i> 设置 </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo PREFIXADMIN; ?>/admin/logout"><i class="fa fa-fw fa-power-off"></i> 退出 </a>
            </li>
        </ul>
    </li>
</ul>
        <!--载入左边菜单-->
        <!--左侧菜单模板-->

<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href=""><i class="fa fa-fw fa-dashboard"></i> 首页</a>
        </li>
        <!--<li>-->
            <!--<a href="javascript:;" data-toggle="collapse" data-target="#demo1">-->
                <!--<i class="fa fa-fw fa-arrows-v"></i> 管理员-->
                <!--<i class="fa fa-fw fa-caret-down"></i>-->
            <!--</a>-->
            <!--<ul id="demo1" class="collapse">-->
                <!--<li>-->
                    <!--<a href=""><i class="fa fa-fw fa-table"></i> 管理列表</a>-->
                <!--</li>-->
                <!--&lt;!&ndash;<li>&ndash;&gt;-->
                    <!--&lt;!&ndash;<a href=""><i class="fa fa-fw fa-edit"></i> 你的资料</a>&ndash;&gt;-->
                <!--&lt;!&ndash;</li>&ndash;&gt;-->
                <!--&lt;!&ndash;<li>&ndash;&gt;-->
                    <!--&lt;!&ndash;<a href=""><i class="fa fa-fw fa-edit"></i> 你的密码</a>&ndash;&gt;-->
                <!--&lt;!&ndash;</li>&ndash;&gt;-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li>-->
            <!--<a href="javascript:;" data-toggle="collapse" data-target="#demo2">-->
                <!--<i class="fa fa-fw fa-arrows-v"></i> 会员-->
                <!--<i class="fa fa-fw fa-caret-down"></i>-->
            <!--</a>-->
            <!--<ul id="demo2" class="collapse">-->
                <!--<li>-->
                    <!--<a href=""><i class="fa fa-fw fa-table"></i> 会员列表</a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href=""><i class="fa fa-fw fa-edit"></i> 身份查询</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo3">
                <i class="fa fa-fw fa-arrows-v"></i> 管理员操作
                <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul id="demo3" class="collapse">
                <li>
                    <a href="<?php echo PREFIXADMIN; ?>/admin/index"><i class="fa fa-fw fa-wrench"></i> 管理员列表</a>
                </li>
                <li>
                    <a href="<?php echo PREFIXADMIN; ?>/log/index"><i class="fa fa-fw fa-wrench"></i>
                        <?php echo session('yang.adminid')==1 ? '管理员' : '你的'; ?>日志</a>
                </li>
            </ul>
        </li>
        <!--<li>-->
            <!--<a href=""><i class="fa fa-fw fa-dashboard"></i> 马甲格式</a>-->
        <!--</li>-->
        <!--<li>-->
            <!--<a href=""><i class="fa fa-fw fa-table"></i> 自定义单子</a>-->
        <!--</li>-->
    </ul>
</div>
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid" style="height:1150px;overflow:auto;">
<!--网页内容开始-->
<div class="row" style="margin:0;">
    <div class="col-lg-6 table_w">
        <h2>管理员列表</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table_center">
                <thead>
                <tr>
                    <th>id</th>
                    <th>管理员</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datas as $data) { ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['admin']; ?></td>
                    <td><?php echo date('Y-m-d H:i',$data['createtime']); ?></td>
                    <td><a href="">修改</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <!--@include('admin.layout.page')-->
        </div>
    </div>
    <!--后台管理员登录信息-->

<style>
    #info { width:25%;border:1px solid rgba(240,240,240,1);border-radius:5px;float:right; }
</style>
<div class="col-lg-6" id="info">
    <?php if (session('yang')) { ?>
    <h3>登录人：<?php echo session('yang.adminName'); ?></h3>
    <p>登录时间：<?php echo date('Y年m月d日 H:i',session('admin.loginTime')); ?></p>
    <p>上次登录：<?php echo session('yang.lasttime') ? date(session('Y年m月d日 H:i','yang.lasttime')) : '首次登录'; ?></p>
    <?php } ?>
    <p>YANGYANG.LTD</p>
    <!--<p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>-->
</div>
</div>
<!--网页内容开始-->
<!--后台底部模板-->

        </div>
    </div>
</div>
</body>
</html>