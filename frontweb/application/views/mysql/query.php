<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>MySQL SQL慢查询监控平台<small> &nbsp;&nbsp;最新检测时间：<?php if(!empty($datalist)){ echo $datalist[0]['create_time'];} ?> (每30秒采集1次数据)</small></h2>
</div>



<div class="ui-state-default ui-corner-all" style="height: 45px;" >
<p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-search"></span>

<form name="form" class="form-inline" method="get" action="<?php site_url('mysql/query') ?>">
  
  <input class="Wdate" style="width:120px;" type="text" name="stime" id="start_time>" value="<?php echo $setval['stime'] ?>" onFocus="WdatePicker({doubleCalendar:false,isShowClear:false,readOnly:false,dateFmt:'yyyy-MM-dd HH:mm'})"/>
  <input class="Wdate" style="width:120px;" type="text" name="etime" id="end_time>" value="<?php echo $setval['etime'] ?>" onFocus="WdatePicker({doubleCalendar:false,isShowClear:false,readOnly:false,startDate:'1980-05-01',dateFmt:'yyyy-MM-dd HH:mm'})"/>
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
  <select name="query_time" class="input-small" style="width: 110px;">
  <option value="">查询时间</option>
  <option value="5" <?php if($setval['query_time']=='5') echo "selected"; ?> >> 5秒</option>
  <option value="10" <?php if($setval['query_time']=='10') echo "selected"; ?> >> 10秒</option>
  <option value="30" <?php if($setval['query_time']=='30') echo "selected"; ?> >> 30秒</option>
  <option value="60" <?php if($setval['query_time']=='60') echo "selected"; ?> >> 1分钟</option>
  <option value="180" <?php if($setval['query_time']=='180') echo "selected"; ?> >> 3分钟</option>
  <option value="300" <?php if($setval['query_time']=='300') echo "selected"; ?> >> 5分钟</option>
  <option value="600" <?php if($setval['query_time']=='600') echo "selected"; ?> >> 10分钟</option>
  <option value="1800" <?php if($setval['query_time']=='1800') echo "selected"; ?> >> 30分钟</option>
  <option value="3600" <?php if($setval['query_time']=='3600') echo "selected"; ?> >> 1小时</option>
 
  </select>
  <input type="text" name="query_sql" class="input-large" placeholder="SQL关键字" value="<?php echo $setval['query_sql'] ?>">
  <button type="submit" class="btn btn-success">检索</button>
  <a href="<?php echo site_url('mysql/query') ?>" class="btn btn-warning">重置</a>


</form>                    
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


        
<table class="table table-hover table-striped  table-bordered table-condensed">
	<tr>
       <th >SQL语句 <span class="collapse_buttons" ><a href="#" class="show_all_message">展开所有SQL</a> <a href="#" class="collpase_all_message">合并所有SQL</a></span></th>
		<th>查询用户</th>
        <th>来源</th>
		<th>目标库</th>
		<th>时间</th>
        <th>状态</th>
        <th>应用</th>
        <th>主机</th> 
        <th>记录时间</th>
	</tr>
	
 <?php if(!empty($datalist)) {?>
 <?php foreach ($datalist  as $item):?>
    <tr style="font-size: 12px;">
        <td>
		<div class="message_head"><span class="message_icon"><i class="icon-plus"></i></span><cite><?php echo substring($item['query_sql'],0,40); ?>:</cite></div>
		<div class="message_body" style="width: 300px;">
			<pre><span style="color: blue;"><?php echo $item['query_sql']; ?></span></pre>
		</div>
        </td>
        <td><?php echo $item['query_user'] ?></td>
        <td><?php echo substring($item['query_host'],0,30) ?></td>
        <td><?php echo $item['query_db'] ?></td>
        <td><?php echo $item['query_time'] ?>&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $item['query_status'] ?></td>
        <td><?php echo $item['application'] ?></td>
        <td><?php echo $item['host'].':'.$item['port'] ?></td>
        
        <td><?php echo substring($item['create_time'],0,16); ?></td>
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

<div class="pagination">
  <ul>
	<?php echo $this->pagination->create_links(); ?>
  </ul>
</div>
