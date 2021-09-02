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
	<?php include_once ("navbar_cramy.php"); ?>
		
	<div class="container" style="padding-bottom:21px;">
		<div class="row my-3">
			<div class="col-sm-12 col-md-6 col-lg-12 px-5" style="border:2px solid #FFD2D2;border-radius:10px;">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<h4 class="text-center mt-3"><span style="color:#FF60AF">課程詢問</span></h4>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<img src="images/contact.png" class="mx-auto d-block" style="width:80%;" id="img">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 mt-4">
						<form action="contact_connect.php" method="post">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="姓名" name="name" id="login_input" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="聯絡電話" name="tel" pattern='\d{9,10}' title="請輸入市話061234567或手機0912345678" id="login_input" required>
							</div>
							<div class="form-group">
								<input type="email" class="form-control"placeholder="E-mail" name="email" title="請輸入正確的E-mail" id="login_input" required>
							</div>  
							<div class="form-group">
								<textarea class="form-control"rows="5" placeholder="詢問內容" name="suggest" id="login_input" required></textarea>
							</div>
							<div class="text-center">
								<input type="submit" class="btn text-white mb-3" style="background-color:#ff9797;"value="送出">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 mt-3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14692.191493103668!2d120.1775511!3d22.985267!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x436bba486d27bfef!2z5Lqe57SA5aG-5pel5paH6KOc57-S54-t!5e0!3m2!1szh-TW!2stw!4v1560212953786!5m2!1szh-TW!2stw" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>		
		</div>
	</div>

	<?php include_once ("footer0.php"); ?>	
		
</body>
</html>
