#!//bin/env python
#coding:utf-8
import MySQLdb
import string
import sys
import global_functions as func


def check_mysql_status(host,port,user,passwd):
    datalist=[]
    try:
        connect=MySQLdb.connect(host=host,user=user,passwd=passwd,port=int(port),charset='utf8')
        datalist.append('success')
        cur=connect.cursor()
        connect.select_db('mysql')
        #get uptime
        uptime=cur.execute('SHOW GLOBAL STATUS LIKE "Uptime";');
        uptime_data = cur.fetchone()
        datalist.insert(4,int(uptime_data[1]))
        #get version
        version=cur.execute('select version();')
        version_data=cur.fetchone()
        datalist.insert(5,version_data[0])

        connections=cur.execute('select id from information_schema.processlist;')
        datalist.append(connections)
        active=cur.execute('select id from information_schema.processlist where command !="Sleep";')
        datalist.append(int(active))
        cur.close()
        connect.close()
        return datalist
    except MySQLdb.Error,e:
        pass
        #print "Mysql Error %d: %s" %(e.args[0],e.args[1])
        datalist.append('fail')
        datalist.append('0')
        datalist.append('---')
        datalist.append('---')
        datalist.append('---')
        return datalist


def main():

    func.mysql_exec("insert into mysql_status_history(server_id,application,host,port,connect,uptime,version,connections,active,create_time,YmdHi) select server_id,application,host,port,connect,uptime,version,connections,active,create_time, LEFT(REPLACE(REPLACE(REPLACE(create_time,'-',''),' ',''),':',''),12) from mysql_status;",'')
    func.mysql_exec("delete from  mysql_status",'')
    #get mysql servers list
    user = func.get_config('mysql_db','username')
    passwd = func.get_config('mysql_db','password')
    servers=func.mysql_query("select id,host,port,application,status from servers where is_delete=0;")
    if servers:
            for row in servers:
                server_id=row[0]
                host=row[1]
                port=row[2]
                application=row[3]
                status=row[4]
                if status <> 0:
                    result=check_mysql_status(host,port,user,passwd)
                    sql="insert into mysql_status(server_id,application,host,port,connect,uptime,version,connections,active) values(%s,%s,%s,%s,%s,%s,%s,%s,%s)"
                    param=(server_id,application,host,port,result[0],result[1],result[2],result[3],result[4])
                    func.mysql_exec(sql,param)


if __name__=='__main__':
    main()
