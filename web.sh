#!/bin/sh

echo -e "================================================================="
echo -e "                                                                 "        
echo -e "    	   SoftEtherVPN+blg流控+云端app+自动配置模式              " 
echo -e "                                                                 " 
echo -e "  	 监控为本人编写,流控基于blg二次开发.云app修改的叮咚流量卫士   " 
echo -e "  感谢以上源码的提供者,和制作者。                                " 
echo -e "    因为是开源产物,所以本人并不提供任何商业代码。去除了所有的代  " 
echo -e "  理功能,卡密功能。											  "
echo -e "                                                                 "
echo -e "          请接着看,因为20s后才会执行下一步，谢谢！！             "  
echo -e "                                                                 "      
echo -e "    本源码理论支持所有安装了SoftEtherVPN的机器,但没这个条件测试  "
echo -e "  所以只测试了网易centos6.7。本人欢迎大家对我的源码进行二次开发  " 
echo -e "  开源地址:https://github.com/wx1183618058/SoftEther-Netraffic/  " 
echo -e "                                                                 "
echo -e "    最后在啰嗦一句本人只是源码的搬运工。任何版权问题与本人无关   " 
echo -e "              								                      "
echo -e "        作者不易；如果觉得本流控还不错欢迎大家支持               "
echo -e "              支付宝：weixiao1996722@qq.com                      "
echo -e "        感谢捐赠名单:http://bxu2359140757.my3w.com/              "
echo -e "================================================================="

sleep 15
echo "
---------------------------------------------------------
请选择您的系统版本，输入相应的序号后回车
---------------------------------------------------------

---------------------------------------------------------
【1】网易 centos6.x-7.x (必须使用我提供的镜像,不是请选择通用)

【2】通用 centos6.x

【3】通用 centos7.x

---------------------------------------------------------
"
read install_type

clear 

echo -e "请输入您的IP 不要加端口和http://"
read domain
port=80
file1="/home/wwwroot/default/"
web_path=$file1
app_key=aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
echo -e "输入您的APP名称（默认：叮咚流量卫士）"
read app_name
	if test -z $app_name;then
		echo -e "已经默认为叮咚流量卫士"
		app_name="叮咚流量卫士"
	fi
clear	

echo "开始整理安装环境..."
yum -y update
yum -y install openssl gcc make cmake vim tar java

cd /
#wget -O vpnserver64bit.tar.gz http://d.nrfly.com/v/down.php?u=c41da68d94146c11a5e4261c293e33b2.undefined.zip
#wget -O vpnserver.zip http://d.nrfly.com/v/down.php?u=5177a777bc6116423ec82353f904d46e.undefined.zip
wget ftp://bxu2359140757:wacwt123@60.205.27.56/htdocs/vpnserver64bit.tar.gz
wget ftp://bxu2359140757:wacwt123@60.205.27.56/htdocs/vpnserver.zip

if [ $install_type != 1 ];then
echo "开始安装lnmp"
wget -c http://mirrors.duapp.com/lnmp/lnmp1.3-full.tar.gz
tar zxf lnmp1.3-full.tar.gz
cd lnmp1.3-full
./install.sh <<EOF

n



EOF
fi

echo "开始安装sevpn"
cd /
tar -zxvf vpnserver64bit.tar.gz
unzip -o vpnserver.zip
chmod -R 777 /vpnserver
cd /vpnserver
./.install.sh <<EOF
1
1
1
EOF
./vpnserver start

echo "开始安装web"
echo
cd /
#wget -O default.zip http://d.nrfly.com/v/down.php?u=bee1f8c19858b814b07ba564fdb7627c.undefined.zip
wget ftp://bxu2359140757:wacwt123@60.205.27.56/htdocs/default.zip
unzip -o default.zip
mv default/* /home/wwwroot/default
rm -rf default
cd /vpnserver
rm /home/wwwroot/default/index.html
mv /home/wwwroot/default/phpmyadmin /home/wwwroot/default/cmdtool
mv -f php.ini /usr/local/php/etc/
cd /usr/local/php/etc/
chmod 644 php.ini
lnmp restart

echo "正在安装HTTP转发..."
echo
cd /vpnserver
./mproxy-kangml -l 8080 -d
./mproxy-kangml -l 138 -d

echo "开始安装云app"
echo -e "流控目录为：$web_path"
clear
echo -e "开始进行数据库导入"
db_host="localhost"
db_port=3306
db_user="root"
db_pass="root"
db_ov="ov"
echo -e "地址：$db_host"
echo -e "端口：$db_port"
echo -e "用户：$db_user"
echo -e "密码：$db_pass"
echo -e "库名：$db_ov"
echo -e "开始创建数据库"
mysql -h$db_host -P$db_port -u$db_user -p$db_pass -e "create database ${db_ov}"
echo -e "开始导入数据库"
mysql -h$db_host -P$db_port -u$db_user -p$db_pass $db_ov < ${web_path}install.sql
sed -i 's/192.168.1.1/'${domain}'/g' "/home/wwwroot/default/line.sql"
mysql -h$db_host -P$db_port -u$db_user -p$db_pass $db_ov < ${web_path}line.sql
echo -e "数据库导入完成"
sed -i 's/192.168.1.1:8888/'${domain}:${port}'/g' "/vpnserver/cmd/update.sh"
clear

echo -e  "开始制作APP"
echo -e "正在加载基础环境(较慢 耐心等待)...."
cd /home
#wget -O android.apk http://d.nrfly.com/v/down.php?u=4babbc8c138bca8e16c67d90c450a159.undefined.zip
#wget -O apktool.jar http://d.nrfly.com/v/down.php?u=bd18d7945a5f7b75ad95210a748234e9.undefined.zip
#wget -O autosign.zip http://d.nrfly.com/v/down.php?u=82ac3aeaab7e7b9e90da2256cb8731af.undefined.zip
wget ftp://bxu2359140757:wacwt123@60.205.27.56/htdocs/android.apk
wget ftp://bxu2359140757:wacwt123@60.205.27.56/htdocs/apktool.jar
wget ftp://bxu2359140757:wacwt123@60.205.27.56/htdocs/autosign.zip
chmod 0777 -R /home
if [ $install_type == 2 ];then
#wget -O glibc-2.14.1.tar.gz http://d.nrfly.com/v/down.php?u=44ab23a09e41b832e2673009e9dbcbf1.undefined.zip
wget ftp://bxu2359140757:wacwt123@60.205.27.56/htdocs/glibc-2.14.1.tar.gz
tar -zxvf glibc-2.14.1.tar.gz
cd glibc-2.14.1
mkdir build
cd build
../configure --prefix=/opt/glibc-2.14.1
make -j4
make install
ln -f /home/glibc-2.14.1/build/libc.so /lib64/libc.so.6
fi

cd /home
echo -e "清理旧的目录"
rm -rf android
echo -e "分析APK"
java -jar apktool.jar d android.apk
echo -e "批量替换"
chmod 0777 -R /home/android
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' /home/android/smali/net/openvpn/openvpn/base.smali >/dev/null 2>&1
sed -i 's/8beed678706df3a9ae7f6485cad7f179/'${app_key}'/g' /home/android/smali/net/openvpn/openvpn/base.smali >/dev/null 2>&1
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' "/home/android/smali/net/openvpn/openvpn/OpenVPNClient.smali" >/dev/null 2>&1
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' "/home/android/smali/net/openvpn/openvpn/OpenVPNClient\$10.smali" >/dev/null 2>&1
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' "/home/android/smali/net/openvpn/openvpn/OpenVPNClient\$11.smali" >/dev/null 2>&1
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' "/home/android/smali/net/openvpn/openvpn/OpenVPNClient\$13.smali" >/dev/null 2>&1
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' "/home/android/smali/net/openvpn/openvpn/Main2Activity\$MyListener\$1.smali" >/dev/null 2>&1
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' '/home/android/smali/net/openvpn/openvpn/Main2Activity$MyListener.smali' >/dev/null 2>&1
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' '/home/android/smali/net/openvpn/openvpn/MainActivity.smali' >/dev/null 2>&1
sed -i 's/app.dingd.cn:80/'${domain}:${port}'/g' '/home/android/smali/net/openvpn/openvpn/update$myClick$1.smali' >/dev/null 2>&1
sed -i 's/叮咚流量卫士/'${app_name}'/g' "/home/android/res/values/strings.xml" >/dev/null 2>&1
echo -e "打包"
java -jar apktool.jar b android
if test -f /home/android/dist/android.apk;then 
	echo -e "APK生成完毕"
	unzip -o autosign.zip 
	cd autosign 
	echo "签名APK...."
	cp -rf /home/android/dist/android.apk /home/unsign.apk
	java -jar signapk.jar testkey.x509.pem testkey.pk8 /home/unsign.apk /home/sign.apk 
	cp -rf /home/sign.apk  ${web_path}dingd.apk
	rm -rf /home/sign.apk
	rm -rf /home/unsign.apk
	rm -rf /home/android.apk
	rm -rf /home/android
	rm -rf /home/autosign.zip
	rm -rf /home/autosign
	rm -rf /home/glibc-2.14.1.tar.gz
	rm -rf /home/glibc-2.14.1
	rm -rf /home/apktool.jar
	chmod 777 ${web_path}dingd.apk
	chmod -R 755 ${web_path}cmdtool
	cd /vpnserver
	./cmdtool
	cd /vpnserver/cmd
	nohup ./star.sh &
	echo "添加服务命令"
	mv /vpnserver/vpn /bin
	cd /bin
	chmod 777 vpn
else
	echo "
	---------------------------------------------------------
	ERROR----------- APP制作出错 请手动对接
	---------------------------------------------------------
	"
	exit 0
fi

echo "
---------------------------------------------------------
		复活成功！！
					
后台管理系统： http://${domain}:${port}/admin
APP地址：   http://${domain}:${port}/dingd.apk 

		后台账号：admin
		后台密码：admin
	  服务启动命令：vpn
	  
已经开通137,138(TCP和UDP)端口和8080端口
	后台已经自动生成模式
	
作者不易；如果觉得本流控还不错欢迎大家支持               
   支付宝：weixiao1996722@qq.com            

 感谢捐赠名单:http://bxu2359140757.my3w.com/            
---------------------------------------------------------
"
exit 0