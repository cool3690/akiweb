<?php
	if (isset($_POST['submit'])) {
		$account=$_POST["account"];
		$passwd=$_POST["passwd"];
		$name=$_POST["name"];
		$email=$_POST["email"];

		require 'db_login.php';			
		$sql2 = mysqli_query($db, "SELECT * FROM user where account = '$account'");
		if (mysqli_num_rows($sql2) > 0) {
			echo '<script language="javascript">';
			echo 'alert(" 帳號已存在");';
			echo "window.location.href='index.php'";
			echo '</script>';				
		} else {
			$sql = "INSERT INTO user (account , passwd , name, email) VALUES ('$account', '$passwd', '$name', '$email')";	
            
			if (mysqli_query($db, $sql)) {
				echo '<script language="javascript">';
				echo 'alert("填寫成功！");';
				echo 'window.location.href = "index.php"';
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
	<div class='container mb-5'>
	
		<?php include_once ("navbar.php"); ?>
	
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" style="padding-top:8%;padding-bottom:12%;padding-left:20%;padding-right:20%;">
			<h4 class="mb-3 d-flex justify-content-center"><b>註冊帳號</b></h4>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="請輸入手機0912345678" name="account" pattern='\d{10}' title="請輸入手機0912345678" required>
			</div>
		
			<div class="form-group">
				<input type="password" class="form-control" placeholder="密碼" name="passwd" required>
			</div>
			
			<div class="form-group">
				<input type="text" class="form-control" placeholder="姓名" name="name" required>
			</div>

			<div class="form-group">
				<input type="email" class="form-control"placeholder="E-mail" name="email" title="請輸入正確的E-mail" required>
			</div>   
			
			<input type="submit" name="submit" class="btn btn-primary" value="送出">
		</form>	
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>