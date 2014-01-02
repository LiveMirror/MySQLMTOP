<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>服务器管理<small></small></h2>
</div>
  
<div class="btn-group">
  <a  href="<?php echo site_url('servers/add') ?>"  class="btn "><i class="icon-pencil"></i>新增</a>
  <a  href="<?php echo site_url('servers/batch_add') ?>"  class="btn "><i class="icon-pencil"></i>批量新增</a>
  <a  href="<?php echo site_url('servers/index') ?>"  class="btn "><i class="icon-list"></i>列表</a>
  <a  href="<?php echo site_url('servers/trash') ?>"  class="btn "><i class="icon-trash"></i>回收站</a>
</div>
<hr /> 
<table class="table table-hover table-striped  table-bordered table-condensed">
	<tr>
		<th colspan="3"><center>服务器</center></th>
        <th colspan="2"><center>监控开关</center></th>
		<th colspan="4"><center>告警项目</center></th>
		<th colspan="3"><center>告警阀值</center></th>
        <th rowspan="2"><center>管理</center></th>
	</tr>
    <tr>
        <th>主机</th>
        <th>端口</th>
        <th>应用</th>
		<th>监控</th>
		<th>邮件通知</th>
        <th>总连接数</th>
		<th>活动进程</th>
        <th>复制状态</th>
        <th>复制延时</th>
        <th>总连接数</th>
        <th>活动进程</th>
        <th>复制延时</th>
	</tr>
	

 <?php if(!empty($datalist)) {?>
 <?php foreach ($datalist  as $item):?>
    <tr style="font-size: 13px;">
		<td><strong><?php echo $item['host'] ?></strong></td>
        <td><strong><?php echo $item['port'] ?></strong></td>
        <td><?php echo $item['display_name'] ?>(<?php echo $item['application'] ?>)</td>
        <td><?php echo check_on_off($item['status']) ?></td>
        <td><?php echo check_on_off($item['send_mail']) ?></td>
        <td><?php echo check_on_off($item['alarm_connections']) ?></td>
        <td><?php echo check_on_off($item['alarm_active']) ?></td>
        <td><?php echo check_on_off($item['alarm_repl_status']) ?></td>
        <td><?php echo check_on_off($item['alarm_repl_delay']) ?></td>
        <td><span class='badge badge-warning'><?php echo $item['threshold_connections'] ?></span></td>
        <td><span class='badge badge-warning'><?php echo $item['threshold_active'] ?></span></td>
		<td><span class='badge badge-warning'><?php echo $item['threshold_repl_delay'] ?></span></td>
        <td><a href="<?php echo site_url('servers/edit/'.$item['id']) ?>"  title="编辑"><i class="icon-pencil"></i></a>&nbsp;<a href="<?php echo site_url('servers/delete/'.$item['id']) ?>" class="confirm_delete" title="放入回收站" ><i class="icon-trash"></i></a>
        </td>
	</tr>
 <?php endforeach;?>
   <tr>
  <td colspan="13">
  共查询到<font color="red" size="+1"><?php echo $datacount ?></font>条记录.
  </td>
  </tr>
<?php }else{  ?>
<tr>
<td colspan="12">
<font color="red">对不起，没有查询到相关数据！</font>
</td>
</tr>
<?php } ?>
	 
</table>

<script src="./bootstrap/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
	$(' .confirm_delete').click(function(){
		return confirm('确定要放入回收站？');	
	});
</script>
