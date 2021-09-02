<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<div class="container" style="padding-bottom:8%;">
		<?php 
			include_once ("navbar.php");
			require 'db_login.php';
			$account = $_SESSION['account'];
			error_reporting(0);
			echo '<h3 class="text-center mt-3">選課內容</h3>';
			echo '<table class="table table-bordered text-center"><thead><tr><th>訂單編號</th><th>訂購日期</th><th width="200px">課程名稱</th><th width="120px">禮拜</th><th>日期</th><th>價錢</th></tr></thead>';			
			$aorder_sql = mysqli_query($db, "SELECT * FROM aorder where account='$account'");
			while ($aorder_row = mysqli_fetch_array($aorder_sql)) {
				$course_num = $aorder_row['course_num'];
				$course_sql = mysqli_query($db, "SELECT * FROM course where course_num = '$course_num'");	
				while ($course_row = mysqli_fetch_array($course_sql)) {
					echo '<input type="hidden" name="course_num[]" value="'.$course_num.'">';
					echo '<tbody><tr>
						  <td class="align-middle">'.$aorder_row['order_id'].'</td>
						  <td class="align-middle">'.$aorder_row['sdate'].'</td>
						  <td class="align-middle">'.$course_row['name'].'</td>
						  <td class="align-middle">'.$course_row['week'].'</td>
						  <td class="align-middle">'.$course_row['sdate'].'</td>
					 	  <td class="align-middle">'.$course_row['price'].'</td>	
<!--						  <td class="align-middle">						  
							<div class="form-group">
								<input type="number" min="0" data-name="chhash2" data-price="'.$course_row['price'].'" max="1" value="1" class="form-control prc" >
								= <label id="chhash2" class="t" readonly ></label>rs
							</div>							  
						  </td>-->
						  </tr>';
				}		  
			}
//			echo '<input type="hidden" id="result"  name="result">';
//			echo '<tr><td></td><td></td><td></td><td></td><td>總計</td><td><div class="form-group"><input id="result"  name="result"></div></td></tr>';
			echo '</tbody> </table>';	

			mysqli_close($db);
		?>
	</div>
	<?php include_once ("footer.php"); ?>	
</body>
</html>