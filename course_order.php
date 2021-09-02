<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<?php include_once ("navbar_course.php"); ?>	
	
	<?php
		require 'db_login.php';
			$account = $_SESSION['account'];
			if(@$_SESSION['account']!=null && @$_SESSION['admin']=='Y'){	
				$course_sql3 = mysqli_query($db, "SELECT * FROM `aorder` order by order_num DESC");
			}else{
				$course_sql3 = mysqli_query($db, "SELECT * FROM `aorder`  where account='$account' order by order_num DESC");
			}			
	
			while ($course_row = mysqli_fetch_array($course_sql3)) {
				$num=$course_row['order_num'];
				echo '

				  <!-- The Modal -->
				 <div class="modal fade" id="myModal'.$num.'">
					<div class="modal-dialog">
						<div class="modal-content">
					  
						<!-- Modal Header -->
							<div class="">
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
						
							<!-- Modal body -->
							<div class="modal-body">';
								echo'  <table class="table">
										<tbody>
											 <tr>
												<td class="table-success" width="30%">課程名稱</td>
												<td width="70%">'.$course_row['name'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">禮拜</td>
												<td>'.$course_row['week'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">開始時間</td>
												<td>'.$course_row['stime'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">開始日期</td>
												<td>'.$course_row['sdate'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">課程數量</td>
												<td>'.$course_row['course_amount'].'</td>
											 </tr>

											 <tr>
												<td class="table-success">內容</td>
												<td>'.$course_row['content'].'</td>
											 </tr>

											 <tr>
												<td class="table-success">價錢</td>
												<td>'.$course_row['price'].'</td>
											 </tr>
										</tbody>
									</table>';	
						
							echo'</div>
						<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						
						</div>
					</div>
				</div>';
			}
		echo '<script>
			$(document).ready(function(){';
			$aorder_sql = mysqli_query($db, "SELECT * FROM `aorder`  where account='$account' order by order_num DESC");
				while ($row = mysqli_fetch_array($aorder_sql)) {
					$num=$row['order_num'];
					echo '			
					$("#myBtn'.$num.'").click(function(){
						$("#myModal'.$num.'").modal();
					});';
			}
		echo'});
		</script>';
	?>
	<div class="container" style="padding-bottom:100px;">
		<?php 
			require 'db_login.php';
			$account = $_SESSION['account'];
			$order_tmp="0";
			error_reporting(0);
			echo '<h3 class="text-center mt-5 mb-5">課程訂單</h3>';
			echo '<table class="table" id="coures_order_max">';						;
			if(@$_SESSION['account']!=null && @$_SESSION['admin']=='Y'){	
				$aorder_sql = mysqli_query($db, "SELECT * FROM `aorder` order by order_num DESC");
			}else{
				$aorder_sql = mysqli_query($db, "SELECT * FROM `aorder`  where account='$account' order by order_num DESC");
			}			
			while ($aorder_row = mysqli_fetch_array($aorder_sql)) {
				if($aorder_row['order_id']!=$order_tmp){
					echo '<thead class="table-borderless"><tr><td colspan="5" style="padding-top:50px;"><span class="ml-5">訂單編號：'.$aorder_row['order_id'].'</span><span class="ml-5">訂購日期：'.$aorder_row['sdate'].'</span></td>
						
					 </tr></thead>
						<tr class="table-warning text-center""><th width="15%">課程名稱</th><th width="6%">禮拜</th><th width="12%">時間</th><th width="20%">日期</th><th width="9%">課程數</th><th>內容</th><th width="10%">價錢</th></tr>						  
					';
					$order_tmp=$aorder_row['order_id'];
				}
				$order_id=$aorder_row['order_id'];
				echo '<input type="hidden" name="order_num[]" value="'.$order_num.'">';
				echo '<tbody class="text-center">
						<tr>
						  <td class="align-middle">'.$aorder_row['name'].'</td>
						  <td class="align-middle">'.$aorder_row['week'].'</td>
						  <td class="align-middle">'.$aorder_row['stime'].'</td>
						  <td class="align-middle">'.$aorder_row['date'].'</td>
						  <td class="align-middle">'.$aorder_row['course_amount'].'</td>
						  <td class="align-middle">'.$aorder_row['content'].'</td>
						  <td class="align-middle">'.$aorder_row['price'].'</td>
						</tr>';
				
				$check_sum = mysqli_query($db, "SELECT order_id, count( * ) AS count FROM aorder GROUP BY order_id");
				$check++;
				while ($check_row = mysqli_fetch_array($check_sum)) {
				//echo  $order_id."==".$check_row[0]."@@".$check."==".$check_row[1] ;
						if($order_id==$check_row[0] && $check==$check_row[1]){
							
						$sql = mysqli_query($db, "SELECT SUM(price) FROM `course` JOIN `aorder` ON `course`.order_num = `aorder`.order_num where order_id = '$order_id'");	
						while ($sql_row = mysqli_fetch_array($sql)) {
							echo '<tr><td></td><td></td><td></td><td></td><td class="align-middle">總計</td><td class="align-middle">'.$sql_row[0].'</td></tr>';
						
						}						
						$check=0;
					}
				}		  
			}
			echo '</tbody> </table>';	
			echo '<table class="table" id="coures_order_min">';							;
			if(@$_SESSION['account']!=null && @$_SESSION['admin']=='Y'){	
				$aorder_sql = mysqli_query($db, "SELECT * FROM `aorder` order by order_num DESC");
			}else{
				$aorder_sql = mysqli_query($db, "SELECT * FROM `aorder`  where account='$account' order by order_num DESC");
			}				
			while ($aorder_row = mysqli_fetch_array($aorder_sql)) {
				$order_num=$aorder_row['order_num'];
				if($aorder_row['order_id']!=$order_tmp){
					echo '<thead class="table-borderless">
							<tr><td>訂單編號：</td><td colspan="3">'.$aorder_row['order_id'].'</td></tr>
							<tr><td>訂購日期：</td><td colspan="3">'.$aorder_row['sdate'].'</td></tr>
						</thead>
						<tr class="table-warning text-center""><th width="35%">課程名稱</th><th width="20%">日期</th><th width="20%">價錢</th><th width="25%"></th></tr>						  
					';
					$order_tmp=$aorder_row['order_id'];
				}
				$order_id=$aorder_row['order_id'];
				echo '<tbody class="text-center">
						<tr>
							<td class="align-middle">'.$aorder_row['name'].'</td>
							<td class="align-middle">'.$aorder_row['date'].'</td>
							<td class="align-middle">'.$aorder_row['price'].'</td>	
							<td><button type="button" class="btn btn-info" id="myBtn'.$order_num.'">明細</button>	</td>	
						</tr>';
				
				$check_sum = mysqli_query($db, "SELECT order_id, count( * ) AS count FROM aorder GROUP BY order_id");
				$check++;
				while ($check_row = mysqli_fetch_array($check_sum)) {
					//echo  $order_id."==".$check_row[0]."@@".$check."==".$check_row[1] ;
					if($order_id==$check_row[0] && $check==$check_row[1]){
						
						$sql = mysqli_query($db, "SELECT SUM(price) FROM `course` JOIN `aorder` ON `course`.order_num = `aorder`.order_num where order_id = '$order_id'");	
						while ($sql_row = mysqli_fetch_array($sql)) {
							echo '<tr><td></td><td class="align-middle">總計</td><td class="align-middle">'.$sql_row[0].'</td><td></td></tr>';
						
						}						
						$check=0;
					}
				}		  
			}
			echo '</tbody> </table>';	
			mysqli_close($db);
		?>
	</div>
	<?php include_once ("footer0.php"); ?>	
</body>
</html>