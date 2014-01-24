<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>MySQL 慢查询分析平台<small> </small></h2>
</div>

<div class="ui-widget">
<div class="ui-state-highlight      ui-corner-all">
<p><span class="ui-icon ui-icon-volume-on" style="float: left; margin-right: .3em;"></span>
MySQLMTOP温馨提示：1.点击对应的checksum可以查看当前语句的执行详情; 2.点击展开所有按钮可以展开所有的语句,点击对应的+按钮可以展开当前语句。 </p>
</div>
</div>
  
<script src="./bootstrap/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  
	//hide message_body after the first one
	//$(".table .message_body:gt(0)").hide();
    $(".table .message_body").hide();
	$(".collpase_all_message").hide();
	
	//toggle message_body
	$(".message_head").click(function(){
		$(this).next(".message_body").slideToggle(200)
		return false;
	});

    //collapse all messages
	$(".collpase_all_message").click(function(){
	   		$(this).hide()
		$(".show_all_message").show()
		$(".message_body").slideUp(200)
		return false;
	});

	//show all messages
	$(".show_all_message").click(function(){
		$(this).hide()
		$(".collpase_all_message").show()
		$(".message_body").slideDown()
		return false;
	});
 
   $(".pinned").pin();

});

</script>
<style type="text/css">

/* message display page */

.message_head {
	padding: 2px 5px;
	cursor: pointer;
	position: relative;
}

.message_head cite {
	font-size: 100%;
	font-weight: bold;
	font-style: normal;
}

</style>


<div class="ui-state-default ui-corner-all" style="height: 45px;" >
<p><span class="ui-icon ui-icon-search" style="float: left; margin-right: .3em;"></span>
                    
<form name="form" class="form-inline" method="get" action="<?php site_url('monitor/replication') ?>" >
  <input type="hidden" name="search" value="submit" />
  <select name="application_id" class="input-medium" style="">
  <option value="">选择应用</option>
  <?php foreach ($application  as $item):?>
  <option value="<?php echo $item['id'];?>" <?php if($setval['application_id']==$item['id']) echo "selected"; ?> ><?php echo $item['display_name'] ?>(<?php echo $item['name'] ?>)</option>
   <?php endforeach;?>
  </select>
  <select name="server_id" class="input-medium" style="" >
  <option value="">选择主机</option>
  <?php foreach ($server as $item):?>
  <option value="<?php echo $item['id'];?>" <?php if($setval['server_id']==$item['id']) echo "selected"; ?> ><?php echo $item['host'];?>:<?php echo $item['port'];?></option>
   <?php endforeach;?>
  </select>
 
  <select name="order" class="input-small" style="width: 110px;">
  <option value="id">排序字段</option>
  <option value="id" <?php if($setval['order']=='id') echo "selected"; ?> >默认ID</option>
  <option value="delay" <?php if($setval['order']=='delay') echo "selected"; ?> >延时时间</option>
  </select>
  <select name="order_type" class="input-small" style="width: 110px;">
  <option value="asc" <?php if($setval['order_type']=='asc') echo "selected"; ?> >默认升序</option>
  <option value="desc" <?php if($setval['order_type']=='desc') echo "selected"; ?> >降序排序</option>
  </select>
  <button type="submit" class="btn btn-success">检索</button>
  <a href="<?php echo site_url('monitor/replication') ?>" class="btn btn-warning">重置</a>

</form>
                    
</div>

                



<table class="table table-hover table-striped  table-bordered table-condensed" style="font-size: 12px;" >
	<tr>
		<th colspan="3"><center>SQL</center></th>
		<th colspan="3"><center>Query</center></th>
        <th colspan="3"><center>Lock</center></th>
		<th colspan="2"><center>Rows</center></th>
		<th colspan="2"><center>Review</center></th>

	</tr>
    <tr>
        <th>checksum</th>
        <th>fringerprint <span class="collapse_buttons" ><a href="#" class="show_all_message">展开所有</a> <a href="#" class="collpase_all_message">合并所有</a></span></th>
        <th>ts_cnt</th>
        <th>time_sum</th>
		<th>time_min</th>
        <th>time_max</th>
        <th>time_sum</th>
        <th>time_min</th>
		<th>time_max</th>
		<th>sent_sum</th>
		<th>examined_sum</th>
        <th>status</th>
        <th>dba</th>
		
	</tr>
	
 <?php if(!empty($datalist)) {?>
 <?php foreach ($datalist  as $item):?>
    <tr style="font-size: 12px;">
        <td><a href="<?php echo site_url('slowquery/detail/'.$item['checksum']) ?>"  title="点击进入详情"><?php  echo $item['checksum'] ?></a></td>
         <td>
         <div class="message_head"><span class="message_icon"><i class="icon-plus"></i></span><cite><?php echo substring($item['fingerprint'],0,40); ?>:</cite></div>
		<div class="message_body" style="width: 300px;">
			<pre><span style="color: blue;"><?php echo $item['fingerprint']; ?></span></pre>
		</div>
        <td><?php echo $item['ts_cnt'] ?></td>
        <td><?php echo $item['Query_time_sum'] ?></td>
        <td><?php  echo $item['Query_time_min'] ?></td>
        <td><?php echo $item['Query_time_max'] ?></td>
        <td><?php echo $item['Lock_time_sum'] ?></td>
        <td><?php echo $item['Lock_time_min'] ?></td>
        <td><?php echo $item['Lock_time_max'] ?></td>
        <td><?php echo $item['Rows_sent_sum'] ?></td>
        <td><?php echo $item['Rows_examined_sum'] ?></td>
        <td><?php echo $item['reviewed_status'] ?></td>
        <td><?php echo $item['reviewed_by'] ?></td>
       
        
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


