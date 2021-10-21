<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
<?php include_once ("navbar_null.php"); ?>
		<div class="container">
			<form method="post" action="login_connect.php" id="login_index">
				<img src="images/logo.png"><span class="ml-4"style="font-size:26px;font-weight:bold;">Login</span>
				<div class="form-group mt-5">
					<input type="text" class="form-control" placeholder="聯絡電話" name="account" pattern='\d{10}' title="請輸入手機0912345678" id="login_input" required>				
				</div>
				<div class="form-group mt-4">
					<input type="password" class="form-control" placeholder="密碼" name="passwd" id="login_input" required>
				</div>
				<button type="submit" class="btn text-white mb-3" style="background-color:#ff9797;">登入</button><br>
				<hr>
				<a class="btn text-white mt-2" style="background-color:#DC6D4E;" href="註冊帳號">註冊帳號</a>
				<a class="btn text-white mt-2" style="background-color:#DC6D4E;" href="member_forget.php">忘記密碼</a>
			</form>					
		</div>	
	<?php include_once ("footer0.php"); ?>	
</body>
</html>