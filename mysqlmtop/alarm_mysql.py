#!/bin/env python
#-*-coding:utf-8-*-
from datetime import *
import global_functions as func


def get_alarm_mysql_status():
    sql="select a.application,a.server_id,a.host,a.port,a.create_time,a.connect,a.connections,a.active,b.send_mail,b.alarm_connections,b.alarm_active,b.threshold_connections,b.threshold_active from mysql_status a, servers b where a.server_id=b.id;"
    result=func.mysql_query(sql)
    if result <> 0:
        for line in result:
            application=line[0]
            server_id=line[1]
            host=line[2]
            port=line[3]
            create_time=line[4]
            connect=line[5]
            connections=line[6]
            active=line[7]
            send_mail=line[8]
            alarm_connections=line[9]
            alarm_active=line[10]
            threshold_connections=line[11]
            threshold_active=line[12]

            if connect <> "success":
                    sql="insert into alarm(application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);"
                    param=(application,server_id,host,port,create_time,'mysql','connect',connect,'error','数据库服务器连接失败',send_mail)    
                    func.mysql_exec(sql,param)
            else:
                if int(alarm_connections)==1:
                    if int(connections)>=int(threshold_connections):
                        sql="insert into alarm(application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);"
                        param=(application,server_id,host,port,create_time,'mysql','connections',connections,'warning','数据库连接数过多',send_mail)                 
                        func.mysql_exec(sql,param)
                if int(alarm_active)==1:
                    if int(active)>=int(threshold_active):
                        sql="insert into alarm(application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);"
                        param=(application,server_id,host,port,create_time,'mysql','active',active,'warning','数据库活动进程过多',send_mail)
                        func.mysql_exec(sql,param)
    else:
       pass


def get_alarm_mysql_replcation():
    sql="select a.application,a.server_id,a.host,a.port,a.create_time,a.slave_io_run,a.slave_sql_run,a.delay,b.send_mail,b.alarm_repl_status,b.alarm_repl_delay,b.threshold_repl_delay from mysql_replication a,servers b  where a.server_id=b.id and a.slave='1';"
    result=func.mysql_query(sql)
    if result <> 0:
        for line in result:
            application=line[0]
            server_id=line[1]
            host=line[2]
            port=line[3]
            create_time=line[4]
            slave_io_run=line[5]
            slave_sql_run=line[6]
            delay=line[7]
            send_mail=line[8]
            alarm_repl_status=line[9]
            alarm_repl_delay=line[10]
            threshold_repl_delay=line[11]
            if alarm_repl_status==1:
                if (slave_io_run== "Yes") and (slave_sql_run== "Yes"):
                    if alarm_repl_delay=="yes":
                        if int(delay)>=int(threshold_repl_delay):
                            sql="insert into alarm(application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);"
                            param=(application,server_id,host,port,create_time,'mysql','delay',delay,'warning','数据库备库延时',send_mail)
                            func.mysql_exec(sql,param)
		else:
                    sql="insert into alarm(application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);"
                    param=(application,server_id,host,port,create_time,'mysql','replication','IO Thread:'+slave_io_run+',SQL Thread:'+slave_sql_run,'error','数据库同步进程停止',send_mail)
                    func.mysql_exec(sql,param)
    else:
       pass


def send_alarm_mail():
    sql="select application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail from alarm;"
    result=func.mysql_query(sql)
    if result <> 0:
        send_alarm_mail = func.get_option('send_alarm_mail')
        mail_to_list = func.get_option('mail_to_list')
        mailto_list=mail_to_list.split(';')
        for line in result:
            application=line[0]
            server_id=[1]
            host=line[2]
            port=line[3]
            create_time=line[4]
            db_type=line[5]
            alarm_type=line[6]
            alarm_value=line[7]
            level=line[8]
            message=line[9]
            send_mail=line[10]
            if send_alarm_mail=="1":
                if send_mail==1:
                    mail_subject=message+' 当前值:'+alarm_value+' 服务器:'+application+'-'+host+':'+port+' 时间:'+create_time.strftime('%Y-%m-%d %H:%M:%S')
                    mail_content="please check!"
                    result = func.send_mail(mailto_list,mail_subject,mail_content)
                    if result:
                        send_mail_status=1
                    else:
                        send_mail_status=0
                else:
                    send_mail_status=0
            else:
                send_mail_status=0

            if send_mail_status==1:
                func.mysql_exec("insert into alarm_history(application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail,send_mail_status) select application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail,1 from alarm;",'')
            elif send_mail_status==0:
                func.mysql_exec("insert into alarm_history(application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail,send_mail_status) select application,server_id,host,port,create_time,db_type,alarm_type,alarm_value,level,message,send_mail,0 from alarm;",'')
            func.mysql_exec("delete from alarm",'')

    else:
        pass


if __name__ == '__main__':
    get_alarm_mysql_status()
    get_alarm_mysql_replcation()
    send_alarm_mail()














