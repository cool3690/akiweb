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
				echo '<h3 class="mt-5 d-flex justify-content-center mb-5"><span class="backstage_title">留學情報編輯</span></h3>';
				$course_sql = mysqli_query($db, "SELECT * FROM study");
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2" id="coures_list_max">';
					echo '<table class="table text-center mt-3">
							<thead><tr class="table-success">
								<th width="3%"><input type="checkbox"  class="checkall"/></th>
								<th width="16%">學校名稱</th>
								<th width="15%">課程期間</th>
								<th width="15%">參加費用</th>
								<th width="15%">報名期限</th>
								<th width="">參加條件</th>
							</tr></thead>';			
							$i=0;
							
					echo '<form method="POST" action="留學情報編輯" enctype="multipart/form-data">';		
				while ($course_row = mysqli_fetch_array($course_sql)) {
					$content = str_replace( PHP_EOL, '<br />', $course_row['content']);					
					echo '<tbody><tr>';
					echo '<input type="hidden" name="num[]" value="'.$course_row['id'].'">';
					echo '<input type="hidden" name="num2" value="'.$course_row['id'].'">';
					echo '<input type="hidden" name="notre" value="1">';	
					if(@$_SESSION['admin']=='Y'){	
						echo '<input type="hidden" name="id[]" value='.$course_row['id'].'>';
						echo '<input type="hidden" name="buy[]" value='.$i.'>';
						echo '<td class="align-middle"><input type="checkbox" name="checkbox[]" class="child" value='.$i.'></td>';
						echo '<td class="align-middle">
								<textarea class="form-control" rows="3" name="project[]">'.$course_row['project'].'</textarea>
						</td>';
						echo '<td class="align-middle">
								<textarea class="form-control" rows="3" name="during[]">'.$course_row['during'].'</textarea>
						</td>';
						echo '<td class="align-middle">
								<textarea class="form-control" rows="3" name="fee[]">'.$course_row['fee'].'</textarea>
						</td>';
						echo '<td class="align-middle">
								<textarea class="form-control" rows="3" name="attend[]">'.$course_row['attend'].'</textarea>
						</td>';
						echo '<td class="align-middle">
								<textarea class="form-control" rows="3" name="mycondition[]">'.$course_row['mycondition'].'</textarea>
						</td>';
	
						  $i++;	
						  
			
					}
					echo '</tr>';
				}
				echo '</tbody> </table>
						<div class="text-left mb-3">*勾選欲刪除的項目</div>
						<div class="text-left mb-3">*修改題目不需勾選</div>
						<div class="text-left">
							<button type="submit" class="btn btn-danger" name="submit" value="1">刪除</button>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-info" name="submit" value="2">完成修改</button>
						</div>
					</form>
				</div>';

				if (isset($_POST['submit'])) {
					$submit=$_POST['submit'];
					if($submit==1){	
						//刪除消息
						$check=$_POST['checkbox'];
						foreach($check as $value){		
							$id=$_POST['id'];
							$sql = "DELETE FROM study WHERE id = '$id[$value]'";

							if (mysqli_query($db, $sql)) {
								echo "<script type='text/javascript'>";
								echo 'alert("刪除成功！");';
								echo "window.location.href='留學情報編輯'";
								echo "</script>"; 
							} else {
								echo "更新失敗";
							}	
						}
					}else{
						$buy=$_POST['buy'];
						
						foreach($buy as $value2){	
							$id = $_POST['id'];
							$project = $_POST['project'];
							$during=$_POST['during'];
							$fee = $_POST['fee'];
							$attend = $_POST['attend'];
							$mycondition=$_POST['mycondition'];

							$sql2 = "UPDATE `study` SET `project`='$project[$value2]',`during`='$during[$value2]',`fee`='$fee[$value2]',`attend`='$attend[$value2]',`mycondition`='$mycondition[$value2]' WHERE id = '$id[$value2]'";
							 // echo "UPDATE `study` SET `name`='$name[$value2]',`week`='$week[$value2]',`stime`='$stime[$value2]',`sdate`='$sdate[$value2]',`course_amount`='$course_amount[$value2]',`content`='$content[$value2]',`price`='$price[$value2]' WHERE course_num = '$course_num[$value2]'<br>";
							if (mysqli_query($db, $sql2)) {
								echo "<script type='text/javascript'>";
								echo 'alert("更新成功！");';
								echo "window.location.href='留學情報編輯'";
								echo "</script>"; 
							} else {
								echo "更新失敗";
							}	
						}						
					}
				}			
				mysqli_close($db);
			?>
	</div>
<!--	<?php include_once ("../footer0.php"); ?>	 -->
</body>
</html>