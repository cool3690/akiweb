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
				echo '<h3 class="text-center mt-5 mb-5">留學情報編輯</h3>';
				$course_sql = mysqli_query($db, "SELECT * FROM study");
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2" id="coures_list_max">';
					echo '<table class="table text-center">
							<thead><tr class="table-success">
								<th width="3%"><input type="checkbox"  class="checkall"/></th>
								<th width="4%">NO.</th>
								<th width="14%">學校名稱</th>
								<th width="15%">課程期間</th>
								<th width="15%">參加費用</th>
								<th width="12%">報名期限</th>
								<th width="">參加條件</th>
								 
							</tr></thead>';			
							$i=0;
							
					echo '<form method="POST" action="留學情報編輯"  >';		
				while ($course_row = mysqli_fetch_array($course_sql)) {
					$content = str_replace( PHP_EOL, '<br />', $course_row['content']);					
					echo '<tbody><tr>';
					echo '<input type="hidden" name="num[]" value="'.$course_row['id'].'">';
					echo '<input type="hidden" name="num2" value="'.$course_row['id'].'">';
					echo '<input type="hidden" name="notre" value="1">';	
					if(@$_SESSION['admin']=='Y'){	
						echo '<input type="hidden" name="course_num[]" value='.$course_row['id'].'>';
						echo '<input type="hidden" name="buy[]" value='.$course_row['id'].'>';
						echo '<td class="align-middle"><input type="checkbox" name="checkbox[]" class="child" value='.$course_row['id'].'></td>';
						echo '<td class="align-middle">'.$course_row['id'].'</td>';
						echo '<td class="align-middle">								<textarea class="form-control" rows="3" name="name[]">'.$course_row['project'].'</textarea>
						</td>';
						echo '<td class="align-middle">								<textarea class="form-control" rows="3" name="week[]">'.$course_row['during'].'</textarea>
						</td>';
						echo '<td class="align-middle">								<textarea class="form-control" rows="3" name="stime[]">'.$course_row['fee'].'</textarea>
						</td>';
						echo '<td class="align-middle">								<textarea class="form-control" rows="3" name="sdate[]">'.$course_row['attend'].'</textarea>
						</td>';
				 
	                    echo '<td class="align-middle">								<textarea class="form-control" rows="3" name="course_amount[]">'.$course_row['mycondition'].'</textarea>
						</td>';
						  $i++;	
						  
			
					}
					echo '</tr>';
				}
				echo '</tbody> </table>
						<div class="text-left mb-3">*勾選欲刪除的題目</div>
						<div class="text-left mb-3">*修改題目不需勾選</div>
						 
						<div class="text-center">
							<button type="submit" class="btn btn-info" name="submit" value="2">完成修改</button>
						</div>
					</form>
				</div>';

				if (isset($_POST['submit'])) {
					$submit=$_POST['submit'];
			 $mycheck = $_POST ["checkbox"];
			      if($mycheck >0){
						$buy=$_POST['buy'];
						 
						foreach($mycheck as $value2){	
							$course_num = $_POST['course_num'];
						 
							$name = $_POST['name'];
							$week = $_POST['week'];
							$stime = $_POST['stime'];
							$sdate=$_POST['sdate'];
							$course_amount = $_POST['course_amount'];
							// echo  $name[$value2]."oo";
							 $k=$value2-1;
							$sql2 = "UPDATE `study` SET `project`='$name[$k]',`during`='$week[$k]',`fee`='$stime[$k]',`attend`='$sdate[$k]',`mycondition`='$course_amount[$k]'  WHERE id = '$value2'";
							 
							if (mysqli_query($db, $sql2)) {
								echo "<script type='text/javascript'>";
								echo 'alert("更新成功！");';
								 								echo "window.location.href='留學情報編輯'";
								echo "</script>"; 
							} else {
								echo "更新失敗";
							}
/**/							
						}
				}						
					
				}			
				mysqli_close($db);
			?>
	</div>
<!--	<?php include_once ("../footer0.php"); ?>	 -->
</body>
</html>