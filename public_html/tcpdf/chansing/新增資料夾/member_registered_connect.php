<?php
	$account=$_POST["account"];
	$passwd=$_POST["passwd"];
	$phone=$_POST["phone"];

	$today = date('Ymd');
	
	require 'db_login.php';			
	$sql2 = mysqli_query($db, "SELECT * FROM customer where account = '$account'");
	if (mysqli_num_rows($sql2) > 0) {
			echo '<script language="javascript">';
			echo 'alert(" 帳號已存在");';
			echo "window.location.href='member_registered.php'";
			echo '</script>';				
	} else {
			$sql = "INSERT INTO customer ( account , passwd , birthday , phone, email , active) VALUES ('$account', '$passwd', '$birthday', '$phone', '$email', 'Y')";	

			if (mysqli_query($db, $sql)) {
				echo '<script language="javascript">';
				echo 'alert("填寫成功！");';
				echo 'window.location.href = "index.php"';
				echo '</script>';	
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}
			mysqli_close($db);
	}	
?>

