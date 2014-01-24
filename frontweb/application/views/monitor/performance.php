<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>MySQL 性能监控平台<small> &nbsp;&nbsp;最新检测时间：<?php if(!empty($datalist)){ echo $datalist[0]['create_time'];} ?> (每30秒采集1次数据)</small></h2>
</div>
  


<div class="ui-state-default ui-corner-all" style="height: 45px;" >
<p><span class="ui-icon ui-icon-search" style="float: left; margin-right: .3em;"></span>
                    
<form name="form" class="form-inline" method="get" action="<?php site_url('mysql/replication') ?>" >
  <select name="application" class="input-medium" style="">
  <option value="">选择应用</option>
  <?php foreach ($application  as $item):?>
  <option value="<?php echo $item['name'];?>" <?php if($setval['application']==$item['name']) echo "selected"; ?> ><?php echo $item['display_name'] ?>(<?php echo $item['name'] ?>)</option>
   <?php endforeach;?>
  </select>
  <select name="server_id" class="input-medium" style="" >
  <option value="">选择主机</option>
  <?php foreach ($server as $item):?>
  <option value="<?php echo $item['id'];?>" <?php if($setval['server_id']==$item['id']) echo "selected"; ?> ><?php echo $item['host'];?>:<?php echo $item['port'];?></option>
   <?php endforeach;?>
  </select>
  
  <button type="submit" class="btn btn-success">检索</button>
  <a href="<?php echo site_url('mysql/replication') ?>" class="btn btn-warning">重置</a>

</form>
                    
</div>

                



<table class="table table-hover table-striped  table-bordered table-condensed"  >
	<tr>
       

	</tr>
    <tr style="font-size: 10px;">
        <th>主机</th>
        <th>Query_cache_hits</th>
        <th>Key_buffer_read_hits</th>
		<th>Key_buffer_write_hits</th>
        <th>Thread_cache_hits</th>
        <th>Key_blocks_used_rate</th>
        <th>Created_tmp_disk_tables_rate</th>

	</tr>
	
 <?php if(!empty($datalist)) {?>
 <?php foreach ($datalist  as $item):?>
    <tr style="font-size: 12px;">
        <td><?php echo $item['host'].':'. $item['port'] ?></td>
        <td><?php echo check_hits($item['Query_cache_hits']) ?></td>
        <td><?php echo check_hits($item['Key_buffer_read_hits']) ?></td>
        <td><?php echo check_hits($item['Key_buffer_write_hits']) ?></td>
        <td><?php echo check_hits($item['Thread_cache_hits']) ?></td>
        <td><?php echo check_hits($item['Key_blocks_used_rate']) ?></td>
        <td><?php echo check_hits($item['Created_tmp_disk_tables_rate']) ?></td>
   
       
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


