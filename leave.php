<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
		$(document).ready(function(){
			$(".close").click(function(){
				$("#myAlert").alert("close");
			});
		});
	</script>
	<style>
		body {
			background-image: url("images/bg02.jpg");
			background-repeat: repeat;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	<?php include_once ("navbar_course.php"); ?>	

			<?php
				require 'db_login.php';
				error_reporting(0);
				echo '<h3 class="text-center mt-5 mb-5">請假連絡欄</h3>';
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2" id="coures_select">';
				if (isset($_POST['submit'])) {	
					$submit=$_POST['submit'];
					$account = $_SESSION['account'];
					$course_num = $_POST['course_num'];
					$name = $_POST['name'];
					$week = $_POST['week'];
					$stime = $_POST['stime'];
					$sdate=$_POST['sdate'];
					$course_amount = $_POST['course_amount'];
					$content = $_POST['content'];
					$price=$_POST['price'];
					$reserve_name = $_POST['reserve_name'];
					$phone=$_POST['phone'];
					$choose = $_POST['choose'];
					$remark = $_POST['remark'];
					ini_set('date.timezone','Asia/Taipei');	
					$date = date("Y/m/d");
					$sql = "INSERT INTO `audit`(`date`, `name`, `phone`, `choose`, `remark`) VALUES ('$date', '$reserve_name', '$phone', '$choose', '$remark')";
					// echo $sql;
					
					if (mysqli_query($db, $sql)) {
					echo '<div class="alert alert-success alert-dismissible" id="myAlert">
							<button type="button" class="close">&times;</button>
							<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>填表成功！已傳遞訊息。</strong> 
						  </div>';
					}	
					$token = "4tlQczhtz99kXiH9GoEfenC7Oci1QNdCTdCLSkcsy3G";
					// $token = "z6F9SKP6A1maUB9tGUamXlkIvoCSQcVEOVVadpIZyrg";
					 $message ="\r\n日期:". $date."\r\n姓名:". $reserve_name."\r\n電話:".$phone."\r\n事項:".$choose."\r\n備註:".$remark;
					
					$curl = curl_init(); 
					curl_setopt($curl, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); 
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
					curl_setopt($curl, CURLOPT_POST, 1); 
					curl_setopt($curl, CURLOPT_POSTFIELDS, "message=$message"); 
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
					$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.'',); 
					curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
					$result = curl_exec($curl); 
					curl_close($curl); 	
				}
				echo '</div>';
						
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12" style="padding-left:300px;padding-right:300px;padding-top:14px;padding-bottom:100px;">';
					echo '<table class="table table-hover text-center"><thead><tr class="table-warning"><th width="20%">姓名</th><th width="20%">電話</th><th>事項</th><th>備註</th><th width="10%"></th></tr></thead>';
					echo '<form method="POST" action="leave.php" enctype="multipart/form-data">';						
					echo '<tbody><tr id="myBtn'.$num.'">';
					echo '<input type="hidden" name="course_num" value="'.$course_row['course_num'].'">';
					echo '<input type="hidden" name="notre" value="1">';			
				
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="reserve_name" required>
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="phone" pattern="\d{10}" required>
						</td>
						<td class="align-middle">
									<select class="form-control" name="choose">
									<option value="事假">事假</option>
									<option value="病假">病假</option>
									<option value="調課">調課(需填寫備註)</option>
									<option value="其他">其他</option>
									</select></td>
						<td class="align-middle">
							<textarea class="form-control" rows="5" name="remark"></textarea>
						</td>';	
						echo '<td class="align-middle">
							<button type="submit" class="btn btn-info" name="submit" value="3">確定</button>
						</td>
						
						</form></tbody> </table></div>';			
							
				mysqli_close($db);
			?>
			
	<?php include_once ("footer0.php"); ?>	 
</body>
</html>