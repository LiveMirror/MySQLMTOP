
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-header">
  <h2>健康状态面板<small></small></h2>
</div>

            
<div class="row">
  <div class="span6">
     <table class="table table-bordered table-striped">
             
              <thead>
                <tr class="error">
                  <th ><div class="text-center">名称</div></th>
                  <th colspan="6"><div class="text-center">检测信息</div></th>
                </tr>
              </thead>
              <tbody>
                <tr class="info" style="font-size: 12px;">
                  <td rowspan="2"><p class="text-center">服务器</p></td>
                  <td>服务器数</td>
                  <td>总实例数</td>
                  <td>正常实例</td>
                  <td>异常实例</td>
                  <td>主库实例</td>
                  <td>备库实例</td>
                </tr>
                <tr class="warning" style="font-size: 12px;">
                  <td><?php echo $mysql_statistics['all_mysql_server']; ?></a></td>
                  <td><?php echo $mysql_statistics['all_mysql_instance']; ?></td>
                  <td><?php echo $mysql_statistics['normal_mysql_instance']; ?></td>
                  <td><?php echo $mysql_statistics['exception_mysql_instance']; ?></td>
                  <td><?php echo $mysql_statistics['master_mysql_instance']; ?></td>
                  <td><?php echo $mysql_statistics['slave_mysql_instance']; ?></td>
                </tr>
                
                <tr class="info" style="font-size: 12px;">
                  <td rowspan="2"><p class="text-center">总连接数</p></td>
                  <td>>100</td>
                  <td>>300</td>
                  <td>>500</td>
                  <td>>1000</td>
                  <td>>2000</td>
                  <td>>3000</td>
                </tr>
                <tr class="warning" style="font-size: 12px;">
                  <td><?php echo $mysql_statistics['mysql_connections_100']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_connections_300']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_connections_500']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_connections_1000']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_connections_2000']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_connections_3000']; ?></td>
                </tr>
                
                <tr class="info" style="font-size: 12px;">
                  <td rowspan="2"><p class="text-center">活动进程</p></td>
                  <td>>5</td>
                  <td>>10</td>
                  <td>>20</td>
                  <td>>30</td>
                  <td>>50</td>
                  <td>>100</td>
                </tr>
                <tr class="warning" style="font-size: 12px;">
                  <td><?php echo $mysql_statistics['mysql_active_5']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_active_10']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_active_20']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_active_30']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_active_50']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_active_100']; ?></td>
                </tr>
                
                <tr class="info" style="font-size: 12px;">
                  <td rowspan="2"><p class="text-center">QPS(每秒查询)</p></td>
                  <td>>50</td>
                  <td>>100</td>
                  <td>>500</td>
                  <td>>2000</td>
                  <td>>3000</td>
                  <td>>5000</td>
                </tr>
                <tr class="warning" style="font-size: 12px;">
                  <td><?php echo $mysql_statistics['mysql_qps_50']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_qps_100']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_qps_500']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_qps_2000']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_qps_3000']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_qps_5000']; ?></td>
                </tr>
                
                <tr class="info" style="font-size: 12px;">
                  <td rowspan="2"><p class="text-center">TPS(每秒事务)</p></td>
                  <td>>50</td>
                  <td>>100</td>
                  <td>>500</td>
                  <td>>2000</td>
                  <td>>3000</td>
                  <td>>5000</td>
                </tr>
                <tr class="warning" style="font-size: 12px;">
                  <td><?php echo $mysql_statistics['mysql_tps_50']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_tps_100']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_tps_500']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_tps_2000']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_tps_3000']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_tps_5000']; ?></td>
                </tr>
                
                <tr class="info" style="font-size: 12px;">
                  <td rowspan="2"><p class="text-center">备库延时</p></td>
                  <td>>30秒</td>
                  <td>>1分钟</td>
                  <td>>10分钟</td>
                  <td>>30分钟</td>
                  <td>>1小时</td>
                  <td>>1天</td>
                </tr>
                <tr class="warning" style="font-size: 12px;">
                  <td><?php echo $mysql_statistics['mysql_delay_30']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_delay_60']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_delay_600']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_delay_1800']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_delay_3600']; ?></td>
                  <td><?php echo $mysql_statistics['mysql_delay_86400']; ?></td>
                </tr>
                
              </tbody>
            </table>
  </div>
  <div class="span6">
   <table class="table table-bordered table-striped">
             
              <thead>
                <tr class="error">
                  <th colspan="7"><div class="text-center">最新告警信息</div></th>
                </tr>
              </thead>
              <tbody>
                <tr class="info">
   
                  <td>主机</td>
                  <td>级别</td>
                  <td>告警内容</td>
                  <td>告警时间</td>
                  <td>邮件通知</td>
                  <td>发送成功</td>
                </tr>
<?php if(!empty($last_alarm)) {?>
<?php foreach ($last_alarm  as $item):?>
                <tr class="warning" style="font-size: 12px;">
                  <td><?php echo $item['host'].":".$item['port'] ?></td>
                  <td><?php echo check_alarm_level($item['level']) ?></td>
                  <td><?php echo $item['message']." </br>当前值:".$item['alarm_value']  ?></td>
                  <td><?php echo $item['send_mail_time'] ?></td>
                  <td><?php echo check_status($item['send_mail']) ?></td>
                  <td><?php echo check_status($item['send_mail_status']) ?></td>
                </tr>
 <?php endforeach;?>
<?php }else{  ?>
<tr>
<td colspan="6">
<font color="red">当前没有任何报警信息！</font>
</td>
</tr>
<?php } ?>                
              </tbody>
            </table>
  </div>

</div>

  

