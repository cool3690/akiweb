<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<div class="container" style="padding-bottom:9%;">
		<?php include_once ("navbar.php"); ?>
	
		<form method="post" action="member_forget_connect.php" style="padding-top:10%;padding-bottom:10%;padding-left:20%;padding-right:20%;">
			<div class="form-group">
				<label>帳號：</label>
				<input type="text" class="form-control" name="account">
			</div>
			<div class="form-group">
				<label>信箱：</label>
				<input type="text" class="form-control" name="email">
			</div>
			<a href="member_forget.php"><button type="submit" class="btn btn-primary">重新申請密碼</button></a>
		</form>			
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>
