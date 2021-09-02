<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<div class="container" style="padding-bottom:9%;">
		<?php include_once ("navbar.php"); ?>
	
		<form method="post" action="login_connect.php" style="padding-top:10%;padding-bottom:10%;padding-left:20%;padding-right:20%;">
			<div class="form-group">
				<label>帳號：</label>
				<input type="text" class="form-control" placeholder="聯絡電話" name="account" pattern='\d{10}' title="請輸入手機0912345678" required>				
			</div>
			<div class="form-group">
				<label>密碼：</label>
				<input type="password" class="form-control" name="passwd">
			</div>
			<button type="submit" class="btn btn-primary">登入</button>
			<a href="member_registered.php">註冊帳號</a>
			<a href="member_forget.php">忘記密碼</a>
		</form>			
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>