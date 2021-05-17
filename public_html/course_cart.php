<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
	$(function(){
		$('.checkall').on('click', function() {
			$('.child').prop('checked', this.checked)
		});
	});
	</script>
	<?php include_once ("navbar_course.php"); ?>	
	<div class="container" style="padding-bottom:8%;">
		<?php 
			require 'db_login.php';
			$account = $_SESSION['account'];
			error_reporting(0);
			echo '<h3 class="text-center mt-5 mb-5">課程購物車</h3>';
			echo '<table class="table table-hover text-center"><thead><tr class="table-info"><th><input type="checkbox"  class="checkall"/></th><th width="200px">課程名稱</th><th width="120px">禮拜</th><th>時間</th><th>日期</th><th>課程數</th><th>內容</th><th>價錢</th></tr></thead>';			
			$cart_sql = mysqli_query($db, "SELECT * FROM cart where account='$account'");
			$i=0;
			$j=0;
			while ($cart_row = mysqli_fetch_array($cart_sql)) {
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mb-2">';
				echo '<form method="post" name="form1" id="form1" action="課程購物車">';	
				$course_num = $cart_row['course_num'];
				$course_sql = mysqli_query($db, "SELECT * FROM course where course_num = '$course_num'");	
				while ($course_row = mysqli_fetch_array($course_sql)) {
					echo '<input type="hidden" name="course_num[]" value="'.$course_num.'">';
					echo '<input type="hidden" name="name[]" value="'.$course_row['name'].'">';
					echo '<input type="hidden" name="week[]" value="'.$course_row['week'].'">';
					echo '<input type="hidden" name="stime[]" value="'.$course_row['stime'].'">';
					echo '<input type="hidden" name="course_date[]" value="'.$course_row['sdate'].'">';
					echo '<input type="hidden" name="course_amount[]" value="'.$course_row['course_amount'].'">';
					echo '<input type="hidden" name="content[]" value="'.$course_row['content'].'">';
					echo '<input type="hidden" name="price[]" value="'.$course_row['price'].'">';
					echo '<tbody><tr>
						  <td class="align-middle"><input type="checkbox" name="checkbox[]" class="child" value='.$i.'></td>
						  <td class="align-middle">'.$course_row['name'].'</td>
						  <td class="align-middle">'.$course_row['week'].'</td>
						  <td class="align-middle">'.$course_row['stime'].'</td>
						  <td class="align-middle">'.$course_row['sdate'].'</td>
						  <td class="align-middle">'.$course_row['course_amount'].'</td>
						  <td class="align-middle">'.$course_row['content'].'</td>
					 	  <td class="align-middle">'.$course_row['price'].'</td>	
<!--						  <td class="align-middle">						  
							<div class="form-group">
								<input type="number" min="0" data-name="chhash2" data-price="'.$course_row['price'].'" max="1" value="1" class="form-control prc" >
								= <label id="chhash2" class="t" readonly ></label>rs
							</div>							  
						  </td>-->
						  </tr>';

						  $i++;
						  $j++;
				}		  
			}
//			echo '<input type="hidden" id="result"  name="result">';
//			echo '<tr><td></td><td></td><td></td><td></td><td>總計</td><td><div class="form-group"><input id="result"  name="result"></div></td></tr>';
			echo '</tbody> </table>';
			echo '*請勾選所需的課程<br><br>';
			echo '<button type="submit" class="btn btn-info" name="submit" value="1">刪除</button>
			<div class=" text-right"><button type="submit" class="btn btn-info" name="submit" value="2">完成選課</button></div></form>';		

			if (isset($_POST['submit'])) {
			$account = $_SESSION['account'];
				$submit=$_POST['submit'];
				if($submit==1){	
				//刪除課程
					$check=$_POST['checkbox'];
					foreach($check as $value){	
						$course_num=$_POST['course_num'];
						$cart_delete_sql = "DELETE FROM cart WHERE account='$account' and course_num = '$course_num[$value]'";

						if (mysqli_query($db, $cart_delete_sql)) {
							echo "更新成功";
							echo "<script type='text/javascript'>";
							echo "window.location.href='課程購物車'";
							echo "</script>"; 
						} else {
							echo "更新失敗";
						}	
					}			
				}else{		
				//完成選課(aorder)------------------------------------------------------------------------------------		
					//查詢aorder資料庫是否有資料
					date_default_timezone_set('Asia/Taipei');
					$date=date("Y/m/d");
					$today=date("Ymd");						
					$aorder_num_sql = mysqli_query($db, "SELECT * FROM aorder");
					//取新增訂單資料			

					//取最大值
					$aorder_max_sql = mysqli_query($db, "SELECT MAX(order_id) FROM aorder");
					while ($aorder_max_row = mysqli_fetch_array($aorder_max_sql)) {
						$order_id_tmp=substr($aorder_max_row[0], 4, 12)+1; 
						$order_id="AKIC".$order_id_tmp;
						
						//取日期長度
						$order_date=substr($aorder_max_row[0], 4, 8); 
						// echo $order_date;
					}		
					
					//比較日期		
					if(strtotime($today)>strtotime($order_date) || mysqli_num_rows($aorder_num_sql) == 0)
					{
						$order_id="AKIC".strval($today)."001";
					}	
							
											
					$check=$_POST['checkbox'];
					foreach($check as $value){		
						$name=$_POST['name'];
						$week=$_POST['week'];
						$stime=$_POST['stime'];
						$course_date=$_POST['course_date'];
						$course_amount=$_POST['course_amount'];
						$content=$_POST['content'];
						$price=$_POST['price'];
						//新增訂單
						$aorder_sql = "INSERT INTO `aorder`(`order_id`, `sdate`, `account`, `name`, `week`, `stime`, `date`, `course_amount`, `content`, `price`) VALUES ('$order_id', '$date', '$account', '$name[$value]', '$week[$value]', '$stime[$value]', '$course_date[$value]', '$course_amount[$value]', '$content[$value]', '$price[$value]')";			
						// echo "INSERT INTO `aorder`(`order_id`, `sdate`, `account`, `name`, `week`, `stime`, `date`, `course_amount`, `price`) VALUES ('$order_id', '$date', '$account', '$name[$value]', '$week[$value]', '$stime[$value]', '$course_date[$value]', '$course_amount[$value]', '$price[$value]')";							
						if (mysqli_query($db, $aorder_sql)) {
							// echo "更新成功";
							echo "<script type='text/javascript'>";
							echo "window.location.href='課程訂單查詢'";
							echo "</script>"; 
							
							
							//新增完成，同時刪除訂單	
							$course_num=$_POST['course_num'];
							$car_delete_tsql = "DELETE FROM cart WHERE account='$account' and course_num = '$course_num[$value]'";
							mysqli_query($db, $car_delete_tsql);
						} else {
							echo "更新失敗";
						}	
						
					}	
				}
			}			
			mysqli_close($db);
		?>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			var totalSum = 0;
			var Sum = 0;
			$('.form-group .prc').each(function(){
				var pr = $(this).data("price");
				var name = $(this).data("name");
				var qut = $(this).val();
				var total = pr * qut;
				$("#"+name).text(total);		
				var inputVal = $(this).val();
				if($.isNumeric(inputVal)){
					totalSum += total;
				}
			});  
			$("#result").val(totalSum);
		});
		
		$('.form-group').on('input', '.prc', function(){
			var totalSum = 0;
			var Sum = 0;
			$('.form-group .prc').each(function(){
				var pr = $(this).data("price");
				var name = $(this).data("name");
				var qut = $(this).val();
				var total = pr * qut;
				$("#"+name).text(total);		
				var inputVal = $(this).val();
				if($.isNumeric(inputVal)){
					totalSum += total;
				}
			});  
			$("#result").val(totalSum);
		});
	</script>
	<?php include_once ("footer0.php"); ?>	
</body>
</html>