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
	<div class="container" style="padding-bottom:57px;">
		<?php
			if (isset($_POST['submit'])) {

				require '../db_login.php';		
					
					// Get text
					$project = $_POST['project'];
					$during = $_POST['during'];
					$fee = $_POST['fee'];
					$attend = $_POST['attend'];
					$mycondition = $_POST['mycondition'];
					
					$sql = "INSERT INTO `study`(`project`, `during`, `fee`, `attend`, `mycondition`) VALUES ('$project', '$during', '$fee', '$attend', '$mycondition')";
					//echo $sql;
					if (mysqli_query($db, $sql)) {
						// echo '<script language="javascript">';
						// echo 'alert("新增成功！");';
						// echo 'window.location.href = "單選題登錄";';
						// echo '</script>';	
						echo ' 
							<div class="alert alert-primary alert-dismissible fade show">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>新增成功</strong><br>
								學校名稱：'.$project.'<br>
								課程期間：'.$during.'<br>
								參加費用：'.$fee.'<br>
								報名期限：'.$attend.'<br>
								參加條件：'.$mycondition.'<br>
							</div>
						 ';
					}else{
						echo '<script language="javascript">';
						echo 'alert("新增失敗！請重新操作");';
						// echo 'window.location.href = "留學情報登錄";';
						echo '</script>';
					}
				
				mysqli_close($db);		
			}
		?>		
		<form action="留學情報登錄" method="POST" enctype="multipart/form-data">
			<h3 class="mt-5 d-flex justify-content-center"><span class="backstage_title">新增留學情報</span></h3>
			<div class="row text-center">
				<div class="col-sm-12 col-md-2 col-lg-2 mb-3">
				</div>
				<div class="col-sm-12 col-md-2 col-lg-8 mb-3">
				<div class="row text-center mt-5">
					<div class="col-sm-12 col-md-12 col-lg-2 mb-3">
						<p>學校名稱</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-10 mt-3 mb-3">
						<input type="text" class="form-control" name="project" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3">
						<p>課程期間</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-10 mt-3 mb-3">
						<input type="text" class="form-control" name="during" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3">
						<p>參加費用</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-10 mt-3 mb-3">
						<input type="text" class="form-control" name="fee" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3">
						<p>報名期限</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-10 mt-3 mb-3">
						<input type="text" class="form-control" name="attend" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3">
						<p>參加條件</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-10 mt-3 mb-3">
					<textarea class="form-control" rows="5" name="mycondition" required></textarea>
					</div>
			
				</div>
				<div class="mt-4 text-center" style="padding-bottom:20px;">
					<button type="submit" class="btn btn-primary" name="submit" value="2">送出</button>
				</div>	
				</div>
				<div class="col-sm-12 col-md-2 col-lg-2 mb-3">
				</div>	
			</div>		
		</form>
	</div>
	
	<?php include_once ("../footer0.php"); ?>	
</body>
</html>


