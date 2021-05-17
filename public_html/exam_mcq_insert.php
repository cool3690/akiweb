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
	<div class="container" style="padding-bottom:57px;">
		<?php
			if (isset($_POST['submit'])) {

				require 'db_login.php';		
					
					// Get text
					$Q1 = $_POST['Q1'];
					$A1 = $_POST['A1'];
					$A2 = $_POST['A2'];
					$A3 = $_POST['A3'];
					$A4 = $_POST['A4'];
					$ans = $_POST['ans'];
					$mych = $_POST['mych'];			
					
					$sql = "INSERT INTO `QandA`(`Q1`, `A1`, `A2`, `A3`, `A4`, `ans`, `mych`) VALUES ('$Q1', '$A1', '$A2', '$A3', '$A4', '$ans', '$mych')";
					//echo $sql;
					if (mysqli_query($db, $sql)) {
						// echo '<script language="javascript">';
						// echo 'alert("新增成功！");';
						// echo 'window.location.href = "多選題登錄";';
						// echo '</script>';	
						echo '  <div class="alert alert-primary alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>新增成功</strong>
						  </div>';
						echo '題目：'.$Q1.'<br>（1） '.$A1.'<br>（2） '.$A2.'<br>（3） '.$A3.'<br>（4） '.$A4.'<br>正確答案：'.$ans.'<br>第幾課：'.$mych;
					}else{
						echo '<script language="javascript">';
						echo 'alert("新增失敗！請重新操作");';
						echo 'window.location.href = "多選題登錄";';
						echo '</script>';
					}
				
				mysqli_close($db);		
			}
		?>		
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" enctype="multipart/form-data">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">新增單選題題庫</span></h3>
			<div class="text-center mt-5">
				<p>題目</p>
				<textarea class="form-control" rows="3" name="Q1" required></textarea>
			</div>
			<div class="row text-center mt-5">
				<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
					<p>選項1</p>
					<input type="text" class="form-control" name="A1" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
					<p>選項2</p>
					<input type="text" class="form-control" name="A2" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
					<p>選項3</p>
					<input type="text" class="form-control" name="A3" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
					<p>選項4</p>
					<input type="text" class="form-control" name="A4" required>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
				<p>正確答案</p>
					<select class="form-control" name="ans">
						<?php
						for($i=1;$i<5;$i++){
							echo '
								<option value="'.$i.'">'.$i.'</option>
							';
							}
						?>
					</select>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 mt-3 mb-3">
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
		
			</div>
			<div class="mt-3">
				<button type="submit" class="btn btn-primary" name="submit" value="2">送出</button>
			</div>		
		</form>
	</div>
	
	<?php include_once ("footer0.php"); ?>	
</body>
</html>


