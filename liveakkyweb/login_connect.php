<?php
	session_start();
	$account = $_POST['account'];
	$passwd_encrypted = $_POST['passwd'];
	
	include("vendor/MCrypt.php");
	require 'db_login.php';	
	
	$mcrypt = new MCrypt();
	$passwd = $mcrypt->encrypt($passwd_encrypted);
	$user_sql = mysqli_query($db, "SELECT * FROM user where account = '$account' and passwd = '$passwd'");
	$admin_sql = mysqli_query($db, "SELECT * FROM administrator where account = '$account' and passwd = '$passwd'");
	if (mysqli_num_rows($user_sql) > 0) {		
			$_SESSION['admin']="N";
			$_SESSION['account'] = $account;
			while ($row = mysqli_fetch_array($user_sql)) {	
				$_SESSION['name'] = $row['name'];
				$_SESSION['user_authorize'] = $row['user_authorize'];
			}	
				ini_set('date.timezone','Asia/Taipei');	
				$datetime = date("Y-m-d H:i:s");
				$name = $_SESSION['name'];			
				$login_sql = "INSERT INTO `login`(`account`, `name`, `sdatetime`) VALUES ('$account', '$name', '$datetime')";
				mysqli_query($db, $login_sql);
				header('Location:index.php');
	} else {
		if (mysqli_num_rows($admin_sql) > 0) {				
			$_SESSION['admin']="Y";
			$_SESSION['account'] = $account;
			while ($row = mysqli_fetch_array($admin_sql)) {	
				$_SESSION['name'] = $row['name'];
				$_SESSION['authorize'] = $row['authorize'];
			}		
				ini_set('date.timezone','Asia/Taipei');	
				$datetime = date("Y-m-d H:i:s");
				$name = $_SESSION['name'];			
				$login_sql = "INSERT INTO `login`(`account`, `name`, `sdatetime`) VALUES ('$account', '$name', '$datetime')";
				//echo "INSERT INTO `login`(`account`, `name`, `sdatetime`) VALUES ('$account', '$name', '$datetime')";
				mysqli_query($db, $login_sql);
				header('Location:日語補習班');
		} else {
			$_SESSION['account'] = '';
			echo '<script language="javascript">';
			echo 'alert("登入失敗");';
			echo "window.location.href='登入會員'";
			echo '</script>';	
		}
	}
	mysqli_close($db);		
?>