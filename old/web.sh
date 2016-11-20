#!/bin/sh
#PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
#export PATH
#clear;
#rm -- "$0" 
#变量设置
echo -e "\033[33m=================================================================\033[0m"
echo -e "\033[36m                    SoftEtherVPN+blg流控 支持网易6.x-7.x     \033[0m"
echo -e "\033[32m                        									\033[0m" 
echo -e "\033[32m                          										\033[0m" 
echo -e "\033[33m==================================================================\033[0m"
echo
echo "开始整理安装环境..."
echo
yum -y update
yum -y install openssl gcc make cmake vim tar
echo
echo "开始安装lnmp"
cd /
wget https://raw.githubusercontent.com/wx1183618058/SoftEther-Netraffic-BLG/master/vpnserver64bit.tar.gz
wget http://file.daixh.com/lnmp/lnmp1.3-full.tar.gz
tar zxf lnmp1.3-full.tar.gz
cd lnmp1.3-full
./install.sh <<EOF

n



EOF
echo "开始安装sevpn"
cd /
tar -zxvf vpnserver64bit.tar.gz
chmod -R 777 /vpnserver
cd vpnserver
./.install.sh <<EOF
1
1
1
EOF
./vpnserver start
/vpnserver/cmd/SecureNatEnable.sh
/vpnserver/cmd/ListenerCreate.sh
/vpnserver/cmd/OpenVpnMakeConfig.sh
/vpnserver/cmd/UserCreate.sh user
/vpnserver/cmd/Access.sh user yes
/vpnserver/cmd/ServerPasswordSet.sh
./vpnserver stop
/vpnserver/cmd/Change.sh
./vpnserver start
echo
echo "开始安装web"
echo
mv default/* /home/wwwroot/default
rm -rf default
rm /home/wwwroot/default/index.html
mv -f php.ini /usr/local/php/etc/
cd /usr/local/php/etc/
chmod 644 php.ini
lnmp restart
echo
echo "正在安装HTTP转发..."
echo
cd /vpnserver
./mproxy-kangml -l 8080 -d
./mproxy-kangml -l 138 -d
./mproxy-kangml -l 137 -d
./cmdtool
echo
echo "最后配置"
mv config.zip /home/wwwroot/default
cd /home/wwwroot/default
chmod 777 config.zip
echo
echo "复活成功！！"
echo -e "\033[33m=================================================================\033[0m"
echo -e "\033[36m           输入 ip/phpmyadmin   建立一个ov库   				  \033[0m"
echo -e "\033[36m           然后 ip/install.php  进入设置界面   				  \033[0m"
echo -e "\033[32m               点跳过配置即可(会报错别管)						  \033[0m" 
echo -e "\033[32m              后台 ip/admin 默认用户密码 admin			     	  \033[0m" 
echo -e "\033[32m                   配置文件 ip/config.zip			     	      \033[0m" 
echo -e "\033[32m       注意user用户可以删除，但确保必须至少要有一个用户          \033[0m" 
echo -e "\033[32m                    已经开通137,138端口						  \033[0m" 
echo -e "\033[33m=================================================================\033[0m"