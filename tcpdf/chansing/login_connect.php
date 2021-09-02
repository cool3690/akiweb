<?php
		session_start();
		$account = $_POST['account'];
		$passwd = $_POST['passwd'];
		
		require 'db_login.php';
		$sql = mysqli_query($db, "SELECT * FROM user where account = '$account' and passwd = '$passwd'");	
		if (mysqli_num_rows($sql) > 0) {				
				while ($row = mysqli_fetch_array($sql)) {
					$_SESSION['name'] = $row['name'];
					$_SESSION['num'] = $row['num'];
				}	
				$name=$_SESSION['name'];
				date_default_timezone_set('Asia/Taipei');
				$datetime = date("Y-m-d H:i:s");	
				$sql2 = "INSERT INTO `login`(`name`, `datetime`) VALUES ('$name', '$datetime')";
				mysqli_query($db, $sql2);		
				echo $_SESSION['name'].'登入成功!';
				echo '<script language="javascript">';
				echo "window.location.href='index.php'";
				echo '</script>';	
		} else {
			$_SESSION['name'] = '';
			echo '<script language="javascript">';
			echo 'alert("登入失敗");';
			echo "window.location.href='login.php'";
			echo '</script>';	
		}
		mysqli_close($db);	
?>