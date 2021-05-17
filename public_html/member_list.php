<!DOCTYPE html>
<html>
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
		$(function() {
			$('#button').click(function() {
				if ($('#member_modify tr:nth-child(3)').is(':visible') != true) {
					$('#member_modify tr:nth-child(3)').show();
					$('#member_modify tr:nth-child(4)').show();  
					$('#member_modify tr:nth-child(5)').show();          
					$(this).text('取消修改');
				} else {
					$('#member_modify tr:nth-child(3)').hide();
					$('#member_modify tr:nth-child(4)').hide();
					$('#member_modify tr:nth-child(5)').hide();
					$(this).text('修改密碼');
				}
			});
		});	
	</script>

		<?php include_once ("navbar_cramy.php"); ?>	
	<div class="container" style="padding-bottom:18%;">
		
		<div class="mt-5">
			<h5 class="mb-3 d-flex justify-content-center"><b>查詢資料</b></h5>
			<?php		
				require 'db_login.php';

				$account = $_SESSION['account'];
				$i=1;
				if(@$_SESSION['account']!=null && @$_SESSION['admin']=='N'){	
					$result = mysqli_query($db, "SELECT * FROM user where account = '$account'");

					echo "<table class='table table-bordered text-center' id='member_modify'><tbody>";
					echo '<form method="post" name="form1" id="form1" action="member_select.php">';	
					while ($row = mysqli_fetch_array($result)) {
						echo '<tr><td>密碼</td><td class="text-left"><button type="button" class="btn btn-outline-info" id="button">修改密碼</button></td></tr>
							  <tr style="display:none;"><td>原密碼</td><td><input type="password" class="form-control" name="passwd" value=""></td></tr>
						      <tr style="display:none;"><td>新密碼</td><td><input type="password" class="form-control" name="passwdn1" value=""></td></tr>
						      <tr style="display:none;"><td>再次輸入<br />新密碼</td><td><input type="password" class="form-control" name="passwdn2" value=""></td></tr>
						      <tr><td>E-mail</td><td><input type="text" class="form-control" name="email" value="'.$row['email'].'"></td></tr>';
						echo '<input type="hidden" name="notre" value="1">';
					}
					
					echo "</tbody></table>";
					echo '<div class=" text-right"><button type="submit" class="btn btn-primary" name="submit">完成修改</button></div></form>';	
				}else if(@$_SESSION['account']!=null && @$_SESSION['admin']=='Y'){	

					$result = mysqli_query($db, "SELECT * FROM user");

					echo "<table class='table table-bordered' id='member_modify'>";
					echo '<thead><tr class="table-info text-center"><th width="10%">編號</th><th width="20%">帳號</th><th width="20%">姓名</th><th >mail</th></tr></thead><tbody>';
					while ($row = mysqli_fetch_array($result)) {
						echo '<tr>
								<td class="text-center align-middle">'.$i.'</td>
								<td class="text-center align-middle">'.$row['account'].'</td>
								<td><input type="text" class="form-control" name="name" value="'.$row['name'].'"></td>
								<td><input type="text" class="form-control" name="email" value="'.$row['email'].'"></td>
							</tr>';
						echo '<tr></tr>';
						$i++;
					}
					
					echo "</tbody></table>";				
				}
				mysqli_close($db);
			?>
		</div>
	</div>
	
	<?php include_once ("footer0.php"); ?>	
</body>
</html>

<?php		
	if (isset($_POST['submit'])) {
		require 'db_login.php';
		$passwdo1=$_POST['passwd'];
		$passwdn1=$_POST['passwdn1'];	
		$passwdn2=$_POST['passwdn2'];
		$email=$_POST['email'];	
		
		if($passwdo1==''){
			echo '1-';
			$sql = mysqli_query($db, "SELECT * FROM user where account = '$account'");
			while ($row = mysqli_fetch_array($sql)) {
				if($email==$row['email']){
					echo '1----------------------';
					echo "<script type='text/javascript'>";
					echo 'alert("未有資料變更！");';
					echo "window.location.href='member_select.php'";
					echo "</script>"; 
				}else{
					$sql2 = "UPDATE user SET email='$email' WHERE account='$account'"; 
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
			$sql = mysqli_query($db, "SELECT * FROM user where account = '$account' and passwd = '$passwdo1'");
			$sql2 = "UPDATE user SET passwd='$passwdn1', email='$email' WHERE account='$account'"; 
			if (mysqli_num_rows($sql) > 0) {	
				if($passwdn1 == $passwdn2 && $passwdn1!=''){					
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
			
				}else{
					echo "<script type='text/javascript'>";
					echo 'alert("新密碼兩次輸入錯誤！");';
					echo "window.location.href='member_select.php'";
					echo "</script>"; 	
				}				
			} else {
					echo '4----------------------';
					echo "<script type='text/javascript'>";
					echo 'alert("原密碼輸入錯誤！");';
					echo "window.location.href='member_select.php'";
					echo "</script>"; 		
			}		
		}
		mysqli_close($db);
	}
?>