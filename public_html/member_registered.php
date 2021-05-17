<?php
	if (isset($_POST['submit'])) {
		$account=$_POST["account"];
		// $passwd=$_POST["passwd"];
		$passwd_encrypted=$_POST["passwd"];
		$name=$_POST["name"];
		$email=$_POST["email"];

		require 'db_login.php';			
		include("vendor/MCrypt.php");
		
		$mcrypt = new MCrypt();
		$passwd = $mcrypt->encrypt($passwd_encrypted);
		$sql2 = mysqli_query($db, "SELECT * FROM user where account = '$account'");
		if (mysqli_num_rows($sql2) > 0) {
			echo '<script language="javascript">';
			echo 'alert(" 帳號已存在");';
			echo "window.location.href='首頁'";
			echo '</script>';				
		} else {
			$sql = "INSERT INTO user (account , passwd , name, email, user_authorize) VALUES ('$account', '$passwd', '$name', '$email', '1')";	
            // echo "INSERT INTO user (account , passwd , name, email, user_authorize) VALUES ('$account', '$passwd', '$name', '$email', '1')";
			if (mysqli_query($db, $sql)) {
				echo '<script language="javascript">';
				echo 'alert("填寫成功！");';
				echo 'window.location.href = "首頁"';
				echo '</script>';	
			} else {
				echo "Error: " . $sql . "<br />" . mysqli_error($db);
			}
			mysqli_close($db);
		}	
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<?php include_once ("navbar_null.php"); ?>
	<div class='container mb-5'>
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" style="padding-top:9%;padding-bottom:8.8%;padding-left:30%;padding-right:30%;">
			<img src="images/logo.png"><span class="ml-4"style="font-size:26px;font-weight:bold;">註冊帳號</span>
			<div class="form-group mt-5">
				<input type="text" class="form-control" placeholder="請輸入手機0912345678" name="account" pattern='\d{10}' title="請輸入手機0912345678" id="login_input" required>
			</div>
		
			<div class="form-group mt-4">
				<input type="password" class="form-control" placeholder="密碼" name="passwd" id="login_input" required>
			</div>
			
			<div class="form-group mt-4">
				<input type="text" class="form-control" placeholder="姓名" name="name" id="login_input" required>
			</div>

			<div class="form-group mt-4">
				<input type="email" class="form-control"placeholder="E-mail" name="email" title="請輸入正確的E-mail" id="login_input" required>
			</div>   
			
			<button type="submit" name="submit" class="btn text-white mb-4" style="background-color:#ff9797;">送出</button>
		</form>	
	</div>	
	<?php include_once ("footer0.php"); ?>	
</body>
</html>