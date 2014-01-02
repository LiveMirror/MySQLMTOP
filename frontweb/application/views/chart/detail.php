
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>MySQL状态图表分析<small></small></h2>
</div>

<div class="ui-state-default ui-corner-all" style="height: 45px;" >
<p><span class="ui-icon ui-icon-search" style="float: left; margin-right: .3em;"></span>
<form name="form" class="form-inline" method="get" action="<?php echo  site_url('chart/detail') ?>" >

  <select name="server_id" class="input-medium" style="" >
  <option value="">所有主机</option>
  <?php foreach ($server as $item):?>
  <option value="<?php echo $item['id'];?>" <?php if($server_id==$item['id']) echo "selected"; ?> ><?php echo $item['host'];?>:<?php echo $item['port'];?></option>
   <?php endforeach;?>
  </select>

  <select name="time" class="input-small" style="width: 120px;">
  <option value="">时间范围</option>
  <option value="3600"  <?php if($time=='3600') echo "selected"; ?> >1小时</option>
  <option value="10800" <?php if($time=='10800') echo "selected"; ?>>3小时</option>
  <option value="21600" <?php if($time=='21600') echo "selected"; ?>>6小时</option>
  <option value="43200" <?php if($time=='43200') echo "selected"; ?>>12小时</option>
  <option value="86400" <?php if($time=='86400') echo "selected"; ?>>1天</option>
  <option value="172800" <?php if($time=='172800') echo "selected"; ?>>2天</option>
  <option value="259200" <?php if($time=='259200') echo "selected"; ?>>3天</option>
  <option value="864800" <?php if($time=='864800') echo "selected"; ?>>1周</option>
  </select>
  
  <button type="submit" class="btn btn-success">检索</button>
  </form>
</div>

<p></p>
<p><img src="<?php  echo site_url('grapha/active/large/'.$server_id.'/'.$time); ?>"></p>
<p></p>
<p><img src="<?php  echo site_url('grapha/connections/large/'.$server_id.'/'.$time); ?>"></p>
<p></p>
<p><img src="<?php  echo site_url('grapha/qpstps/large/'.$server_id.'/'.$time); ?>"></p>
<p></p>
<p><img src="<?php  echo site_url('grapha/bytes_r/large/'.$server_id.'/'.$time); ?>"></p>
<p></p>
<p><img src="<?php  echo site_url('grapha/bytes_s/large/'.$server_id.'/'.$time); ?>"></p>










