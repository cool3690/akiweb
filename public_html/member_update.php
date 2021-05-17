<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<div class="container" style="padding-bottom:18%;">
		<?php include_once ("navbar.php"); ?>	
		
		<div class="mt-5">
			<h5 class="mb-3 d-flex justify-content-center"><b>查詢資料</b></h5>
			<?php		
				require 'db_login.php';
				$passwdo1=$_SESSION['passwd'];
				$passwdo2=$_POST['passwd'];
				$passwdn1=$_POST['passwdn1'];	
				$passwdn2=$_POST['passwdn2'];
				$birthday=$_POST['birthday'];	
				$phone=$_POST['phone'];
				$email=$_POST['email'];	
				$customer_id=$_SESSION['customer_id'];
	

				echo '$passwdo2'.$passwdo2.'<br>';
				echo '$passwdn1'.$passwdn1.'<br>';
				echo '$passwdn2'.$passwdn2.'<br>';
				echo '$birthday'.$birthday.'<br>';
				echo '$phone'.$phone.'<br>';
				echo '$email'.$email.'<br>';
				echo '$customer_id'.$customer_id.'<br>';
				
					if($passwdo2==''){
						$sql = mysqli_query($db, "SELECT * FROM customer where customer_id = '$customer_id' and passwd = '$passwdo1'");
						while ($row = mysqli_fetch_array($sql)) {
							if($birthday==$row['birthday'] && $phone==$row['phone'] && $customer_id==$row['customer_id']){
								echo '1----------------------';
								echo "<script type='text/javascript'>";
								echo 'alert("未有資料變更！");';
								echo "window.location.href='member_select.php'";
								echo "</script>"; 
							}else{
								$sql2 = "UPDATE customer SET birthday='$birthday', phone='$phone', email='$email' WHERE customer_id='$customer_id'"; 
									if (mysqli_query($db, $sql2)) {
										// echo "更新成功";
								echo '2----------------------';
										echo "<script type='text/javascript'>";
										echo 'alert("資料更新成功！");';
										echo "window.location.href='member_select.php'";
										echo "</script>"; 
									} else {
										echo 'alert("資料更新失敗，請重新嘗試！");';
									}						
							}
						}
					}else{
						$sql = mysqli_query($db, "SELECT * FROM customer where customer_id = '$customer_id' and passwd = '$passwdo2'");
						$sql2 = "UPDATE customer SET passwd='$passwdn1', birthday='$birthday', phone='$phone', email='$email' WHERE customer_id='$customer_id'"; 
						if($passwdn1==$passwdn2){
								if (mysqli_num_rows($sql) > 0) {						
									if (mysqli_query($db, $sql2)) {
										echo '3----------------------';
										// echo "更新成功";
										echo "<script type='text/javascript'>";
										echo 'alert("資料更新成功！");';
										echo "window.location.href='member_select.php'";
										echo "</script>"; 
									} else {
										echo 'alert("資料更新失敗，請重新嘗試！");';
									}						
								} else {
										echo '4----------------------';
										echo "<script type='text/javascript'>";
										echo 'alert("原密碼輸入錯誤！");';
										echo "window.location.href='member_select.php'";
										echo "</script>"; 		
								}						
							
						}else{
							echo "<script type='text/javascript'>";
							echo 'alert("新密碼兩次輸入錯誤！");';
							echo "window.location.href='member_select.php'";
							echo "</script>"; 	
						}																	
					}

					


				
				
				mysqli_close($db);
			?>
		</div>
	</div>
	
	<?php include_once ("footer0.php"); ?>	
</body>
</html>