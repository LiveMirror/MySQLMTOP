
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>MySQL状态图表概况<small> (展示所有服务器近15分钟内的健康状态图表)</small></h2>
</div>

<div class="ui-state-default ui-corner-all" style="height: 45px;" >
<p><span class="ui-icon ui-icon-search" style="float: left; margin-right: .3em;"></span>
<form name="form" class="form-inline" method="get" action="<?php echo  site_url('chart/detail') ?>" >

  <select name="server_id" class="input-medium" style="" >
  <option value="">选择主机</option>
  <?php foreach ($server as $item):?>
  <option value="<?php echo $item['id'];?>"  ><?php echo $item['host'];?>:<?php echo $item['port'];?></option>
   <?php endforeach;?>
  </select>

 <select name="time" class="input-small" style="width: 120px;">
  <option value="">时间范围</option>
  <option value="3600" >1小时</option>
  <option value="10800" >3小时</option>
  <option value="21600" >6小时</option>
  <option value="43200" >12小时</option>
  <option value="86400" >1天</option>
  <option value="172800" >2天</option>
  <option value="259200" >3天</option>
  <option value="864800" >1周</option>
  </select>
 
  <button type="submit" class="btn btn-success">检索</button>
  </form>
</div>


<table class="table table-hover table-striped  table-bordered table-condensed"  >
	<tr class="info">
        <th><center>总连接数</center></th>
        <th><center>活动进程</center></th>
        <th><center>QPS/TPS</center></th>
	</tr>
	
 <?php if(!empty($server)) {?>
 <?php foreach ($server  as $item):?>
    <tr style="font-size: 13px;" class="">
       <td><img src="<?php  echo site_url('grapha/active/small/'.$item["id"].'/900'); ?>"></td>
       <td><img src="<?php  echo site_url('grapha/connections/small/'.$item["id"].'/900'); ?>"></td>
       <td><img src="<?php  echo site_url('grapha/qpstps/small/'.$item["id"].'/900'); ?>"></td>
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







