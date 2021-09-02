<!DOCTYPE html>
<html>
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
	<script>
	$(function(){
		$('.checkall').on('click', function() {
			$('.child').prop('checked', this.checked)
		});
	});
	</script>
	<?php include_once ("navbar_backstage.php"); ?>	

	<div class="container-fliud pl-5 pr-5" style="padding-bottom:8%;">

			<?php
				require '../db_login.php';
				error_reporting(0);
				echo '			<h3 class="mt-5 d-flex justify-content-center"><span class="backstage_title">日檢情報編輯</span></h3>';
				$course_sql = mysqli_query($db, "SELECT * FROM cjlpt");
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2 mt-5" id="coures_list_max">';
					echo '<table class="table text-center">
							<thead><tr class="table-success">
								 
								<th width="5%">報名日期</th>
								<th width="7%">考試時間</th>
								<th width="7%">備註</th>
								 
								 
							</tr></thead>';			
							$i=0;
							
					echo '<form method="POST" action="日檢情報編輯">';		
				while ($course_row = mysqli_fetch_array($course_sql)) {
					$content = str_replace( PHP_EOL, '<br />', $course_row['content']);					
					echo '<tbody><tr>';
					 
					if(@$_SESSION['admin']=='Y'){	
					  
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="name[]" value="'.$course_row['sign'].'">
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="week[]" value="'.$course_row['date'].'">
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="stime[]" value="'.$course_row['status'].'">
						</td>';
					 
						  $i++;	
						  
			
					}
					echo '</tr>';
				}
				echo '</tbody> </table>
					
						<div class="text-center">
							<button type="submit" class="btn btn-info" name="submit" value="2">完成修改</button>
						</div>
					</form>
				</div>';

				if (isset($_POST['submit'])) {
					$submit=$_POST['submit'];
			  
							$name = $_POST['name'];
							$week = $_POST['week'];
							$stime = $_POST['stime'];
							 
							// echo  $name[$value2]."oo";
							 $k=0;
							$sql2 = "UPDATE `cjlpt` SET `sign`='$name[$k]',`date`='$week[$k]',`status`='$stime[$k]'  ";
							 
							if (mysqli_query($db, $sql2)) {
								echo "<script type='text/javascript'>";
								echo 'alert("更新成功！");';								echo "window.location.href='日檢情報編輯'";
								 
								echo "</script>"; 
							} else {
								echo "更新失敗";
							}
/**/							
						} 
				 						
					
				 			
				mysqli_close($db);
			?>
	</div>
<!--	<?php include_once ("../footer0.php"); ?>	 -->
</body>
</html>