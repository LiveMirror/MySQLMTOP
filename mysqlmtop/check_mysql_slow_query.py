#!//bin/env python
#coding:utf-8
import MySQLdb
import string
import sys
import global_functions as func

def check_slow_query(host,port,user,passwd,application,server_id):
    try:
        datalist=[server_id,application,host,port]
        connect=MySQLdb.connect(host=host,user=user,passwd=passwd,port=int(port),charset='utf8')
        cur=connect.cursor()
        connect.select_db('information_schema')
        processlist=cur.execute('select * from information_schema.processlist where db!="information_schema" and user!="system user" and command !="Sleep" and info like "select%" and TIME>="2" ;')
        if processlist: 
            for row in cur.fetchall():
                for r in row:
                   datalist.append(r)
                result=datalist
                sql="insert into mysql_slow_query(server_id,application,host,port,query_id,query_user,query_host,query_db,query_command,query_time,query_status,query_sql) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
                param=(result[0],result[1],result[2],result[3],result[4],result[5],result[6],result[7],result[8],result[9],result[10],result[11])
                func.mysql_exec(sql,param)
    except MySQLdb.Error,e:
        pass
        #print "Mysql Error %d: %s" %(e.args[0],e.args[1])



def main():
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
                    check_slow_query(host,port,user,passwd,application,server_id)

if __name__=='__main__':
    main()
