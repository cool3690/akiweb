<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>		
</head>
<body>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	
	<?php include_once ("navbar_backstage.php"); ?>
	
	<div class="container" style="padding-bottom:155px;">
		<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">註冊帳號</span></h3>
		<form action="新增帳號" method="post" style="padding-left:10%;padding-right:10%;">
			<div class="row">
				<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
				</div>   
				<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group mt-5">
						<div class="row">
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-2">
								<span class="align-middle">人員:</span>
							</div>   
							<div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-10">
								<select class="form-control identity" name="identity" id="login_input" required>
								<option value="0">選擇人員類別</option>
								<option value="1">管理者</option>
								<option value="2">使用者</option>
								</select>
							</div>   
						</div>
					</div>		
					
					<div class="form-group authorize1 mt-4" style="display:none;">
						<div class="row">
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-2">
								<span class="align-middle">權限:</span>
							</div>   
							<div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-10">
								<select class="form-control" name="authorize_admin" id="login_input" required>
									<option value="1">全</option>
									<option value="2">題庫</option>
									<option value="3">商品</option>
								</select>
							</div>   
						</div>
					</div>	
					
					<div class="form-group authorize2 mt-4" style="display:none;">
						<div class="row">
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-2">
								<span class="align-middle">權限:</span>
							</div>   
							<div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-10">
								<select class="form-control" name="authorize_user" id="login_input" required>
									<option value="1">一般使用者</option>
									<option value="2">線上課程</option>
								</select>
							</div>   
						</div>
					</div>	
					
					<div class="form-group mt-4">
						<input type="text" class="form-control" placeholder="備註" name="remark" id="login_input">
					</div>
				</div>   
			</div>
			<button type="submit" name="submit" class="btn text-white mb-4" style="background-color:#ff9797;">送出</button>
		</form>	
		<script>
			$( ".identity" ).change(function() {
				$selectval=$('.identity').val();
				if($selectval==1){
					$( ".authorize1" ).show( "slow" );
					$( ".authorize2" ).hide( "slow" );
				}else if($selectval==2){
					$( ".authorize2" ).show( "slow" );
					$( ".authorize1" ).hide( "slow" );
				}else{
					$( ".authorize1" ).hide( "slow" );
					$( ".authorize2" ).hide( "slow" );
				}
			});
		</script>
		<?php
			if (isset($_POST['submit'])) {
				$account=$_POST["account"];
				// $passwd=$_POST["passwd"];
				$passwd_encrypted = $_POST['passwd'];
				$name=$_POST["name"];
				$email=$_POST["email"];
				$identity=$_POST["identity"];
				$authorize_admin=$_POST["authorize_admin"];
				$authorize_user=$_POST["authorize_user"];
				$remark=$_POST["remark"];
				
				require '../db_login.php';
				include("../vendor/MCrypt.php");
				
				$mcrypt = new MCrypt();
				$passwd = $mcrypt->encrypt($passwd_encrypted);

				
				if($identity==1){
					$identity_sql = mysqli_query($db, "SELECT * FROM administrator where account = '$account'");
				}else{
					$identity_sql = mysqli_query($db, "SELECT * FROM user where account = '$account'");
				}
				if (mysqli_num_rows($identity_sql) > 0) {
					echo '<script language="javascript">';
					echo 'alert(" 帳號已存在");';
					echo "window.location.href='新增帳號'";
					echo '</script>';				
				} else {	
					if($identity==1){
						$sql = "INSERT INTO administrator (account , passwd , name, email, authorize, remark) VALUES ('$account', '$passwd', '$name', '$email', '$authorize_admin', '$remark')";	
					}else{                                                                                                                 
						$sql = "INSERT INTO user (account , passwd , name, email, user_authorize, remark) VALUES ('$account', '$passwd', '$name', '$email', '$authorize_user', '$remark')";	
					}
					// echo $sql;
					if (mysqli_query($db, $sql)) {
						echo '<script language="javascript">';
						echo 'alert("填寫成功！");';
						echo 'window.location.href = "新增帳號"';
						echo '</script>';	
					} else {
						echo "Error: " . $sql . "<br />" . mysqli_error($db);
					}
					mysqli_close($db);
				}	
			}
		?>
	</div>
	<?php include_once ("../footer0.php"); ?>
</body>
</html>
