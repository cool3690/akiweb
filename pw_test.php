<?php
		$passwd_encrypted="@";
		include("vendor/MCrypt.php");
		
		$mcrypt = new MCrypt();
		$passwd = $mcrypt->encrypt($passwd_encrypted);
		echo $passwd_encrypted."<br>";
		echo $passwd;
?>