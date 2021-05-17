<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
</head>
<body>
	<style>
		body {
			background-image: url("image/cs1-3-2.png");
		}
	</style>
	
		
	<div class="container" style="margin-top:1%">
		<?php include_once ("navbar.php"); ?>
		<div class="row border pt-4 pb-3 pl-3 pr-3">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<form action="contact_connect.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="姓名" name="name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="聯絡電話" name="tel" pattern='\d{9,10}' title="請輸入市話061234567或手機0912345678" required>
					</div>
					<div class="form-group">
						<input type="email" class="form-control"placeholder="E-mail" name="email" title="請輸入正確的E-mail" required>
					</div>  
					<div class="form-group">
						<textarea class="form-control"rows="5" placeholder="您的建議" name="suggest" required></textarea>
					</div>
						<input type="submit" class="btn btn-primary" value="送出">
				</form>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14692.191493103668!2d120.1775511!3d22.985267!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x436bba486d27bfef!2z5Lqe57SA5aG-5pel5paH6KOc57-S54-t!5e0!3m2!1szh-TW!2stw!4v1560212953786!5m2!1szh-TW!2stw" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>		
		</div>
	</div>

	<?php include_once ("footer.php"); ?>
		
</body>
</html>
