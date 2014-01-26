<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
<title>MySQLMTOP 开源的MySQL企业级监控系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<base href="<?php echo base_url().'application/views/static/'; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="./bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="./bootstrap/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
<link href="./bootstrap/css/bootstrap-switch.css" rel="stylesheet"/>
<link href="./bootstrap/css/font-awesome.min.css"  rel="stylesheet">
<link href="./bootstrap/css/prettify.css"  rel="stylesheet">
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="./bootstrap/css/jquery.ui.1.10.0.ie.css"/>
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" href="./bootstrap/css/font-awesome-ie7.min.css">
<![endif]-->
            
<link rel="stylesheet" href="css/admin.css" />

</head>

  <body>

    <div class="navbar  navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo site_url('index/index') ?>">MySQLMTOP</a>
          <div class="nav-collapse collapse">
<?php  if($this->session->userdata('logged_in')!=1) {?>
 <p class="navbar-text pull-right">
 <a href='<?php echo site_url('user/login') ?>' class="btn-success  btn">登录</a>
 </p>
<?php } else{ ?>
 <p class="navbar-text pull-right">
  <a href="<?php echo site_url('user/logout')?>" class="btn-success btn">退出</a>
 </p>
<?php }?>

             <ul class="nav">
                <li class="dropdown">
				   <a href="#" class="dropdown-toggle" data-toggle="dropdown">系统管理</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                              <li <?php if($cur_nav=='config') echo "class=active"; ?> ><a href="<?php echo site_url('option/index') ?>">全局配置</a></li>
                              <li <?php if($cur_nav=='application') echo "class=active"; ?> ><a href="<?php echo site_url('application/index') ?>">应用管理</a></li>
                              <li <?php if($cur_nav=='servers') echo "class=active"; ?> ><a href="<?php echo site_url('servers/index') ?>">主机管理</a></li>
                              <!--<li <?php if($cur_nav=='datacleaning') echo "class=active"; ?> ><a href="<?php echo site_url('datacleaning/index') ?>">数据清洗</a></li>-->
                              <li <?php if($cur_nav=='user') echo "class=active"; ?> ><a href="<?php echo site_url('user/index') ?>">用户管理</a></li>
                              <li <?php if($cur_nav=='user') echo "class=active"; ?> ><a href="<?php echo site_url('user/password') ?>">更改密码</a></li>
                              <li <?php if($cur_nav=='user') echo "class=active"; ?> ><a href="<?php echo site_url('user/logout') ?>">退出系统</a></li>
						</ul>
                </li>
                <li <?php if($cur_nav=='index_index') echo "class=active"; ?> ><a href="<?php echo site_url('index/index') ?>"> 仪表盘</a></li>
                <li <?php if($cur_nav=='monitor_status') echo "class=active"; ?> ><a href="<?php echo site_url('monitor/status') ?>">状态监控</a></li>
                <li <?php if($cur_nav=='monitor_process') echo "class=active"; ?> ><a href="<?php echo site_url('monitor/process') ?>">进程监控</a></li>
                <li <?php if($cur_nav=='monitor_replication') echo "class=active"; ?> ><a href="<?php echo site_url('monitor/replication') ?>">复制监控</a></li>
                <li <?php if($cur_nav=='slowquery_index') echo "class=active"; ?> ><a href="<?php echo site_url('slowquery/index') ?>">慢查询分析</a></li>
                <li <?php if($cur_nav=='mysql_performance') echo "class=active"; ?> ><a href="<?php echo site_url('mysql/performance') ?>">性能分析</a></li>
                <li <?php if($cur_nav=='widget_index') echo "class=active"; ?> ><a href="<?php echo site_url('widget/index') ?>">小工具</a></li>
                <li <?php if($cur_nav=='chart_index') echo "class=active"; ?> ><a href="<?php echo site_url('chart/index') ?>">图表分析</a></li>
                <li <?php if($cur_nav=='alarm_index') echo "class=active"; ?> ><a href="<?php echo site_url('alarm/index') ?>">告警事件</a></li>
                <li <?php if($cur_nav=='linux_index') echo "class=active"; ?> ><a href="<?php echo site_url('linux/index') ?>">系统资源</a></li>
                
              </ul>
 
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div style="height: 50px;"></div>

<div class="container">
   <?php echo $content_for_layout ; ?>
</div>

<div class="container-fluid">
    <hr>
    <footer>
        <p>&copy; MySQL MTOP 2013  <a href="http://www.mtop.cc" target="_blank">www.mtop.cc</a> 版权所有</p>
    </footer>
</div>

<script src="./bootstrap/js/jquery-1.9.0.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/bootstrap-switch.js"></script>
<script src="./bootstrap/js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="./bootstrap/js/prettify.js"></script>
<script language="javascript" src="js/admin.js"></script>
<script language="javascript" src="js/DatePicker/WdatePicker.js"></script>
  

  </body>
</html>
