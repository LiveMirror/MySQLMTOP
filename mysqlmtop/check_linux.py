#!//bin/env python
#ssh_cmd_ver2.py
#coding:utf-8
import pexpect
import MySQLdb
import os, sys, string, time, datetime, traceback;
from multiprocessing import Process;
import global_functions as func

def ssh_cmd(ip,port,user,keyfile,passwd,cmd):
    if keyfile <> '':
        ssh = pexpect.spawn('ssh -p%s -i %s %s@%s "%s"' % (port,keyfile, user, ip, cmd))
        #ssh = pexpect.spawn('ssh -p22 -i /home/ruzuojun/.ssh/id_rsa ruzuojun@10.0.0.76 uptime')
        try:
            i = ssh.expect(["Enter passphrase for key '"+keyfile+"': ", 'continue connecting (yes/no)?'])
            if i == 0 :
                ssh.sendline(passwd)
                r = ssh.read()
            elif i == 1:
               ssh.sendline('yes\n')
               ssh.expect("Enter passphrase for key '"+keyfile+"': ")
               ssh.sendline(passwd)
               r = ssh.read()
        except pexpect.EOF:
            ssh.close()
        return r
         
    else:
        ssh = pexpect.spawn('ssh -p%s %s@%s "%s"' % (port, user, ip, cmd))
        try:
            i = ssh.expect(['password: ', 'continue connecting (yes/no)?'])
            if i == 0 :
                ssh.sendline(passwd)
                r = ssh.read()
            elif i == 1:
                ssh.sendline('yes\n')
                ssh.expect('password: ')
                ssh.sendline(passwd)
                r = ssh.read()
        except pexpect.EOF:
            ssh.close()
        return r
 

def job_task(ip,port,user,keyfile,passwd):
    commands = open('./servers/linux_commands.list')
    result = [ip]
    for cmd in commands:
        r=ssh_cmd(ip,port,user,keyfile,passwd,cmd)
        result.append(r.strip('\r').strip('\n').strip('\r'))
    #insert data to mysql database
    sql="insert into linux_resource(ip,hostname,kernel,digit,load1,load5,load15,disk_use_root,disk_use_home,disk_use_data,mem_total,mem_use) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
    param=(result[0],result[1],result[2],result[3],result[4],result[5],result[6],result[7],result[8],result[9],result[10],result[11])
    func.mysql_exec(sql,param)



def main():
    print("%s: controller started." % (time.strftime('%Y-%m-%d %H:%M:%S', time.localtime()),));
    func.mysql_exec("delete from linux_resource",'')
    hosts = open('./servers/linux_servers.list');
    plist = []
    for host in hosts:
        if host:
            ip,port,user,keyfile,passwd = host.split(":")
            datalist = [ip]
            p = Process(target = job_task, args = (ip,port,user,keyfile,passwd))
            plist.append(p)
            #print plist
            p.start();
    for p in plist:
        p.join();
    print("%s: controller finished." % (time.strftime('%Y-%m-%d %H:%M:%S', time.localtime()),))


if __name__=='__main__':
    main()
