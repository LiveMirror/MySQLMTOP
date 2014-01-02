<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>Linux健康检查与监控平台<small> &nbsp;&nbsp;最新检测时间：<?php echo $datalist[0]['create_time'] ?> </small></h2>
</div>
  

<table class="table table-hover table-striped  table-bordered table-condensed">
	<tr>
		<th>主机IP</th>
        <th>HOSTNAME</th>
		<th>内核版本</th>
		<th>负载</th>
		<th>负载5</th>
        <th>负载15</th>
		<th>磁盘使用率(/)</th>
		<th>磁盘使用率(/home)</th>
        <th>磁盘使用率(/data)</th>
        <th>总内存</th>
        <th>使用内存</th>
	</tr>
	
 <?php if(!empty($datalist)) {?>
 <?php foreach ($datalist  as $item):?>
    <tr style="font-size: 13px;">
		<td><?php echo $item['ip'] ?></td>
        <td><?php echo $item['hostname'] ?></td>
		<td><?php echo $item['kernel'].' '.$item['digit'] ?></td>
		<td><?php echo $item['load1'] ?></td>
        <td><?php echo $item['load5'] ?></td>
        <td><?php echo $item['load15'] ?></td>
        <td><?php echo $item['disk_use_root'] ?></td>
        <td><?php echo $item['disk_use_data'] ?></td>
        <td><?php echo $item['disk_use_data'] ?></td>
        <td><?php echo $item['mem_total'] ?>G</td>
        <td><?php echo $item['mem_use'] ?>G</td>
	</tr>
 <?php endforeach;?>
<?php }else{  ?>
<tr>
<td colspan="12">
<font color="red">对不起，没有查询到相关数据！</font>
</td>
</tr>
<?php } ?>
	 
</table>


