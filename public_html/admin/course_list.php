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
				echo '<h3 class="text-center mt-5 mb-5">課程資料</h3>';
				$course_sql = mysqli_query($db, "SELECT * FROM course");
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2" id="coures_list_max">';
					echo '<table class="table text-center">
							<thead><tr class="table-success">
								<th width="5%"><input type="checkbox"  class="checkall"/></th>
								<th width="5%">課程編號</th>
								<th width="12%">課程名稱</th>
								<th width="8%">禮拜</th>
								<th width="12%">時間</th>
								<th width="12%">日期</th>
								<th width="8%">課程數</th>
								<th width="">內容</th>
								<th width="8%">價錢</th>
							<!--	<th width="25%">處理狀態</th>  -->
							</tr></thead>';			
							$i=0;
							
					echo '<form method="POST" action="課程編輯" enctype="multipart/form-data">';		
				while ($course_row = mysqli_fetch_array($course_sql)) {
					$content = str_replace( PHP_EOL, '<br />', $course_row['content']);					
					echo '<tbody><tr>';
					echo '<input type="hidden" name="num[]" value="'.$course_row['num'].'">';
					echo '<input type="hidden" name="num2" value="'.$course_row['num'].'">';
					echo '<input type="hidden" name="notre" value="1">';	
					if(@$_SESSION['admin']=='Y'){	
						echo '<input type="hidden" name="course_num[]" value='.$course_row['course_num'].'>';
						echo '<input type="hidden" name="buy[]" value='.$i.'>';
						echo '<td class="align-middle"><input type="checkbox" name="checkbox[]" class="child" value='.$i.'></td>';
						echo '<td class="align-middle">'.$course_row['course_num'].'</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="name[]" value="'.$course_row['name'].'">
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="week[]" value="'.$course_row['week'].'">
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="stime[]" value="'.$course_row['stime'].'">
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="sdate[]" value="'.$course_row['sdate'].'">
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="course_amount[]" value="'.$course_row['course_amount'].'">
						</td>';
						echo '<td class="align-middle">
							<textarea class="form-control" rows="5" name="content[]">'.$course_row['content'].'</textarea>
						</td>';	
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="price[]" value="'.$course_row['price'].'">
						</td>';
	
						  $i++;	
						  
			
					}
					echo '</tr>';
				}
				echo '</tbody> </table>
						<div class="text-left mb-3">*勾選欲刪除的題目</div>
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
							$course_num=$_POST['course_num'];
							$sql = "DELETE FROM course WHERE course_num = '$course_num[$value]'";

							if (mysqli_query($db, $sql)) {
								echo "<script type='text/javascript'>";
								echo 'alert("刪除成功！");';
								echo "window.location.href='課程編輯'";
								echo "</script>"; 
							} else {
								echo "更新失敗";
							}	
						}
					}else{
						$buy=$_POST['buy'];
						
						foreach($buy as $value2){	
							$course_num = $_POST['course_num'];
							$name = $_POST['name'];
							$week = $_POST['week'];
							$stime = $_POST['stime'];
							$sdate=$_POST['sdate'];
							$course_amount = $_POST['course_amount'];
							$content = $_POST['content'];
							$price=$_POST['price'];

							$sql2 = "UPDATE `course` SET `name`='$name[$value2]',`week`='$week[$value2]',`stime`='$stime[$value2]',`sdate`='$sdate[$value2]',`course_amount`='$course_amount[$value2]',`content`='$content[$value2]',`price`='$price[$value2]' WHERE course_num = '$course_num[$value2]'";
							 // echo "UPDATE `course` SET `name`='$name[$value2]',`week`='$week[$value2]',`stime`='$stime[$value2]',`sdate`='$sdate[$value2]',`course_amount`='$course_amount[$value2]',`content`='$content[$value2]',`price`='$price[$value2]' WHERE course_num = '$course_num[$value2]'<br>";
							if (mysqli_query($db, $sql2)) {
								echo "<script type='text/javascript'>";
								echo 'alert("更新成功！");';
								echo "window.location.href='課程編輯'";
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