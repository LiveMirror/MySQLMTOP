<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="page-header">
  <h2>MySQL 大表检测<small> &nbsp;&nbsp;请执行程序./check_mysql_widget_bigtable.py启动检查</h2>
</div>

<div class="span7">
<table class="table table-hover table-striped  table-bordered table-condensed"  >
	<tr class="success">
		<th><center>服务器</center></th>
		<th ><center>数据库名</center></th>
        <th ><center>表名</center></th>
		<th ><center>表大小</center></th>
		<th ><center>表注释</center></th>

	</tr>
  	
 <?php if(!empty($datalist)) {?>
 <?php foreach ($datalist  as $item):?>
    <tr style="font-size: 12px;" >
        <td><?php  echo $item['host'].':'. $item['port'] ?></td>
        <td><?php echo $item['db_name'] ?></td>
        <td><?php echo $item['table_name'] ?></td>
        <td><?php echo $item['table_size'] ?>G</td>
        <td><?php echo $item['table_comment'] ?></td>
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
</div>
