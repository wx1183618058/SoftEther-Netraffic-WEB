<?php
	if($_GET['act'] == 'cuser'){
		$u = $_GET['user'];
		$p = $_GET['pass'];
		$a = $_GET['access'];
		$t = $_GET['time'];
		$v = $_GET['maxll'];
		shell_exec("/bin/sh /vpnserver/cmd/UserCreate.sh {$u}");
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
		shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${a}");
		shell_exec("/bin/sh /vpnserver/cmd/UserExpiresSet.sh ${u} ${t}");
		shell_exec("/bin/sh /vpnserver/cmd/ShellCreateCount.sh ${u} ${v}");
		
	}elseif($_GET['act'] == 'duser'){
		$u = $_GET['user'];
		shell_exec("/bin/sh /vpnserver/cmd/UserDelete.sh ${u}");
		shell_exec("/bin/sh /vpnserver/cmd/UserDeleteCount.sh ${u}");
		
	}elseif($_GET['act'] == 'suser'){
		$u = $_GET['user'];
		$p = $_GET['pass'];
		$a = $_GET['access'];
		$v = $_GET['maxll'];
		$t = $_GET['time'];
		$up = $_GET['up'];
		$do = $_GET['down'];
		$log = $_GET['logins'];
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
		shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${a}");
		shell_exec("/bin/sh /vpnserver/cmd/ShelChangelCount.sh ${u} ${v}");
		shell_exec("/bin/sh /vpnserver/cmd/UserExpiresSet.sh ${u} ${t}");
		shell_exec("/bin/sh /vpnserver/cmd/MaxUpload.sh ${u} ${up}");
		shell_exec("/bin/sh /vpnserver/cmd/MaxDownload.sh ${u} ${do}");
		shell_exec("/bin/sh /vpnserver/cmd/MultiLogins.sh ${u} ${log}");
		
	}elseif($_GET['act'] == 'kami'){
		$u = $_GET['user'];
		$p = $_GET['pass'];
		$a = $_GET['access'];
		$t = $_GET['time'];
		$up = $_GET['up'];
		$do = $_GET['down'];
		$log = $_GET['logins'];
		$v = $_GET['maxll'];
		shell_exec("/bin/sh /vpnserver/cmd/UserDelete.sh ${u}");
		shell_exec("/bin/sh /vpnserver/cmd/UserDeleteCount.sh ${u}");
		shell_exec("/bin/sh /vpnserver/cmd/UserCreate.sh {$u}");
		shell_exec("/bin/sh /vpnserver/cmd/ShellCreateCount.sh ${u} ${v}");
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
		shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${a}");
		shell_exec("/bin/sh /vpnserver/cmd/UserExpiresSet.sh ${u} ${t}");
		shell_exec("/bin/sh /vpnserver/cmd/MaxUpload.sh ${u} ${up}");
		shell_exec("/bin/sh /vpnserver/cmd/MaxDownload.sh ${u} ${do}");
		shell_exec("/bin/sh /vpnserver/cmd/MultiLogins.sh ${u} ${log}");
		
	}elseif($_GET['act'] == 'reg'){
		$u = $_GET['user'];
		$p = $_GET['pass'];
		$a = $_GET['access'];
		$v = $_GET['maxll'];
		shell_exec("/bin/sh /vpnserver/cmd/UserCreate.sh ${u}");
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
		shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${a}");
		shell_exec("/bin/sh /vpnserver/cmd/ShellCreateCount.sh ${u} ${v}");
		
	}elseif($_GET['act'] == 'mod'){
		$u = $_GET['user'];
		$p = $_GET['pass'];
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
		
	}elseif($_GET['act'] == 'appreg'){
		$u = $_GET['user'];
		$p = $_GET['pass'];
		$a = $_GET['access'];
		$t = $_GET['time'];
		$v = $_GET['maxll'];
		shell_exec("/bin/sh /vpnserver/cmd/UserCreate.sh ${u}");
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
		shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${a}");
		shell_exec("/bin/sh /vpnserver/cmd/UserExpiresSet.sh ${u} ${t}");
		shell_exec("/bin/sh /vpnserver/cmd/ShellCreateCount.sh ${u} ${v}");
		
	}elseif($_GET['act'] == 'server'){
		$p = $_GET['pass'];
		$ip = $_GET['sip'];
		$content = file_get_contents('./KEY');
		if(!empty($ip)){
			if($p==$content) {
				shell_exec("/bin/sh /vpnserver/cmd/config.sh");
			}
		}
		/*shell_exec("/bin/sh /vpnserver/cmd/UserCreate.sh ${u}");
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
		shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${a}");
		shell_exec("/bin/sh /vpnserver/cmd/UserExpiresSet.sh ${u} ${t}");
		shell_exec("/bin/sh /vpnserver/cmd/ShellCreateCount.sh ${u} ${v}");
		*/
	}else{
		//file_get_contents("http://ip/shell.php?act=Cuser&username=${u}");
	} ?>