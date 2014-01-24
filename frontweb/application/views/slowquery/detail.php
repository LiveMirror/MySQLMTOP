<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>MySQL 慢查询分析平台<small> </small></h2>
</div>

  

<table class="table  table-bordered table-condensed" style="font-size: 12px;" >
    <tr>
        <th style="width: 150px;">checksum</th>
        <th colspan="4"><?php echo $record['checksum']; ?></th>
        <th>sample</th>	
        <th>sample</th>
	</tr>
    <tr>
        <th>fingerprint</th>
        <th colspan="6"><?php echo $record['fingerprint']; ?></th>	
	</tr>
    <tr>
        <th>sample</th>
        <th colspan="6"><?php echo $record['sample']; ?></th>
	</tr>
    <tr>
        <th>first_seen</th>
        <th><?php echo $record['first_seen']; ?></th>
        <th>sample</th>
        <th>sample</th>
        <th>sample</th>	
        <th>sample</th>
        <th>sample</th>	
	</tr>
    <tr>
        <th>last_seen</th>
        <th><?php echo $record['last_seen']; ?></th>	
	</tr>
    <tr>
        <th>first_seen</th>
        <th><?php echo $record['first_seen']; ?></th>	
	</tr>
    <tr>
        <th>last_seen</th>
        <th><?php echo $record['last_seen']; ?></th>	
	</tr>
    <tr>
        <th>first_seen</th>
        <th><?php echo $record['first_seen']; ?></th>	
	</tr>
    <tr>
        <th>last_seen</th>
        <th><?php echo $record['last_seen']; ?></th>	
	</tr>
    <tr>
        <th>first_seen</th>
        <th><?php echo $record['first_seen']; ?></th>	
	</tr>
    <tr>
        <th>last_seen</th>
        <th><?php echo $record['last_seen']; ?></th>	
	</tr>	
	 
</table>


