<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	

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
	<div class="container mb-5">
		<?php
			if (isset($_POST['submit'])) {

				require 'db_login.php';	
					// Get text
					$Q = $_POST['Q'];
					$contain1=$_POST['contain1'];
					$contain2=$_POST['contain2'];
					$contain3=$_POST['contain3'];
					$contain4=$_POST['contain4'];
					$jp=$_POST['jp'];
					$ch=$_POST['ch'];
					$mych = $_POST['mych'];			
					
					$contain=$contain1.','.$contain2.','.$contain3.','.$contain4;
					$sql = "INSERT INTO `bun`(`Q`, `contain`, `jp`, `ch`, `mych`) VALUES ('$Q', '$contain', '$jp', '$ch', '$mych')";
					//echo $sql;
					if (mysqli_query($db, $sql)) {
						// echo '<script language="javascript">';
						// echo 'alert("新增成功！");';
						// echo 'window.location.href = "重組登錄";';
						// echo '</script>';	
						echo '  <div class="alert alert-primary alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>新增成功</strong>
						  </div>';
						echo '題目：'.$Q.'<br>重組內容 '.$contain.'<br>正確答案(日文)：'.$jp.'<br>正確答案(中文)：'.$ch.'<br>第幾課：'.$mych;
					}else{
						echo '<script language="javascript">';
						echo 'alert("新增失敗！請重新操作");';
						echo 'window.location.href = "重組登錄";';
						echo '</script>';
					}
				
				mysqli_close($db);		
			}
		?>		
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" enctype="multipart/form-data">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">新增重組題庫</span></h3>

			<div class="row text-center mt-5">
				<div class="col-sm-12 col-md-12 col-lg-2 mt-3 mb-3">
					<p>第幾課</p>
					<select class="form-control" name="mych">
						<?php
						for($i=1;$i<25;$i++){
							echo '
								<option value="'.$i.'">'.$i.'</option>
							';
							}
						?>
					</select>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-10 mt-3 mb-3">
				<p>題目</p>
				<textarea class="form-control" rows="5" name="Q" required></textarea>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mt-3 mb-3">
					<p>重組選項</p>
					<div class="row text-center">
						<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
							<div class="form-group">
							  <label for="usr">1</label>
							  <input type="text" class="form-control" name="contain1">
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
							<div class="form-group">
							  <label for="usr">2</label>
							  <input type="text" class="form-control" name="contain2">
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
							<div class="form-group">
							  <label for="usr">3</label>
							  <input type="text" class="form-control" name="contain3">
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
							<div class="form-group">
							  <label for="usr">4</label>
							  <input type="text" class="form-control" name="contain4">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 mt-3 mb-3">
					<p>正確答案(日文)</p>
					<textarea class="form-control" rows="5" name="jp" required></textarea>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 mt-3 mb-3">
					<p>正確答案(中文)</p>
					<textarea class="form-control" rows="5" name="ch" required></textarea>
				</div>
		
			</div>
			<div class="mt-3 text-center">
				<button type="submit" class="btn btn-primary" name="submit" value="2">送出</button>
			</div>		
		</form>
	</div>
	
	<?php include_once ("footer0.php"); ?>	
</body>
</html>


