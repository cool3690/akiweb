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

				$sql = mysqli_query($db, "SELECT * FROM user");
				$i=1;
					echo '<table class="table table-bordered text-center"><thead><tr><th width="20%">帳號</th><th width="20%">姓名</th><th>email</th><th width="15%"></th></tr></thead>';		
					while ($row = mysqli_fetch_array($sql)) {
					echo '<form method="POST" action="member_aselect.php" enctype="multipart/form-data">';						
					echo "<tbody><tr>";
						echo '<input type="hidden" name="account" value="'.$row['account'].'">';
						echo '<td class="align-middle">'.$row['account'].'</td>';
						echo '<td class="align-middle"><input type="text" class="form-control" name="name" value="'.$row['name'].'"></td>';
						echo '<td class="align-middle"><input type="text" class="form-control" name="email" value="'.$row['email'].'"></td>';
						echo '<td class="align-middle"><button type="submit" class="btn btn-primary" name="submit">修改</button>';
						echo '</tr></form>';
					}
					
					echo "</tbody></table>";
				
				
				mysqli_close($db);
			?>
		</div>
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>

<?php		
	if (isset($_POST['submit'])) {
		require 'db_login.php';
		$account = $_POST['account'];
		$name = $_POST['name'];
		$email = $_POST['email'];

		$sql = "UPDATE user SET name='$name', email='$email' where account = '$account'";

		if (mysqli_query($db, $sql)) {
			echo '<script language="javascript">';
			echo 'alert("更新成功！");';
			echo "window.location.href='member_aselect.php'";
			echo "</script>"; 
		}	
		mysqli_close($db);
	}
?>