<!DOCTYPE html>
<html>
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

	<div class="container" style="height:586px;">
		<?php
			if(@$_SESSION['admin']=="Y"){	
				echo '
					<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">佈告欄編輯</span></h3>
				';
				require 'db_login.php';

				if(isset($_POST['submit'])){
					$content=$_POST['content'];
					$sql = "UPDATE `news_handbill` SET `content`='$content' WHERE id = '1'";
					if (mysqli_query($db, $sql)) {
						echo "<script type='text/javascript'>";
						echo 'alert("更新成功！");';
						echo "window.location.href='佈告欄編輯'";
						echo "</script>"; 
					} else {
						echo "更新失敗";
					}	
				}

				$handbill_sql = mysqli_query($db, "SELECT * FROM news_handbill");
				echo '<form method="POST" action="佈告欄編輯">';		
				while ($handbill_row = mysqli_fetch_array($handbill_sql)) {
					echo '
						<textarea class="form-control" rows="10" name="content">'.$handbill_row['content'].'</textarea>
						<div class="text-center">
							<button type="submit" class="btn btn-info mt-5" name="submit" value="2">完成修改</button>
						</div>
					</form>';
				}			
				mysqli_close($db);
			}
		?>
	</div>
	<?php include_once ("footer0.php"); ?>	 
</body>
</html>