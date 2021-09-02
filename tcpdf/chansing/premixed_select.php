<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once ("head.php"); ?>	
	</head>
	<body>
		<div class="container mb-5">
			<div class='text-right'>
				<?php include_once ("navbar.php"); ?>
			</div>	
			
			<div class="mt-5">
				<?php

					if(@$_SESSION['name']==null){						
						echo '
							請先登入帳號
							
						';
					}else{	
						require 'db_login.php';
						$i=1;
						$name = $_SESSION['name'];
						$name = $_SESSION['name'];
						$select_order = mysqli_query($db, "SELECT * FROM premixed where business_name = '$name'");

						echo '<table class="table table-hover text-center">
						<thead><tr class="table-warning"><th></th><th>建立日期</th><th>客戶</th><th>工程名稱</th><th>聯絡電話</th><th>傳真電話</th><th>修改</th><th>查詢</th></tr></thead>';	
						while ($row = mysqli_fetch_array($select_order)) {
							echo '<tbody><tr>				
							  <td class="align-middle">'.$i.'</td>
							  <td class="align-middle">'.$row['today'].'</td>
							  <td class="align-middle">'.$row['customer'].'</td>	
							  <td class="align-middle">'.$row['ee_name'].'</td>	
							  <td class="align-middle">'.$row['ee_phone'].'</td>
							  <td class="align-middle">'.$row['ee_fax'].'</td>	
							  <td class="align-middle">
								<form method="post" name="form1" id="form1" action="premixed_update.php" target="_blank">
									<input type="hidden" name="num" value="'.$row['num'].'">
									<button type="submit" class="btn btn-info" name="submit">PDF</button></div>
								</form>
							  </td>		
							  <td class="align-middle">
								<form method="post" name="form1" id="form1" action="report_premixed.php" target="_blank">
									<input type="hidden" name="num" value="'.$row['num'].'">
									<button type="submit" class="btn btn-success" name="submit">PDF</button></div>
								</form>
							  </td>									
							  </tr>';
							  $i++;
						}	
							
						echo '</table>';
					}
				?>
			</div>
		</div>
		
		
		<?php include_once ("footer.php"); ?>	
	</body>
</html>						