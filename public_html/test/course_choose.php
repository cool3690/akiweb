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

	<div class="container" style="padding-bottom:8%;">
		<?php 
			include_once ("navbar.php");
			require 'db_login.php';
			$account = $_SESSION['account'];
			error_reporting(0);
			echo '<h3 class="text-center mt-3">選課內容</h3>';
			echo '<table class="table table-bordered text-center"><thead><tr><th><input type="checkbox"  class="checkall"/></th><th width="200px">課程名稱</th><th width="120px">禮拜</th><th>日期</th><th>價錢</th></tr></thead>';			
			$cart_sql = mysqli_query($db, "SELECT * FROM cart where account='$account'");
			$i=0;
			$j=0;
			while ($cart_row = mysqli_fetch_array($cart_sql)) {
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mb-2">';
				echo '<form method="post" name="form1" id="form1" action="course_choose.php">';	
				$course_num = $cart_row['course_num'];
				$course_sql = mysqli_query($db, "SELECT * FROM course where course_num = '$course_num'");	
				while ($course_row = mysqli_fetch_array($course_sql)) {
					echo '<input type="hidden" name="course_num[]" value="'.$course_num.'">';
					echo '<tbody><tr>
						  <td class="align-middle"><input type="checkbox" name="checkbox[]"  class="child" value='.$i.'></td>
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

						  $i++;
						  $j++;
				}		  
			}
//			echo '<input type="hidden" id="result"  name="result">';
//			echo '<tr><td></td><td></td><td></td><td></td><td>總計</td><td><div class="form-group"><input id="result"  name="result"></div></td></tr>';
			echo '</tbody> </table>';
			echo '*請勾選所需的課程<br><br>';
			echo '<button type="submit" class="btn btn-primary" name="submit" value="1">刪除</button>
			<div class=" text-right"><button type="submit" class="btn btn-primary" name="submit" value="2">完成選課</button></div></form>';		

			if (isset($_POST['submit'])) {
			$account = $_SESSION['account'];
				$submit=$_POST['submit'];
				if($submit==1){	
				//刪除課程
					$check=$_POST['checkbox'];
					foreach($check as $value){	
						$course_num=$_POST['course_num'];
						$car_delete_tsql = "DELETE FROM cart WHERE account='$account' and course_num = '$course_num[$value]'";

						if (mysqli_query($db, $car_delete_tsql)) {
							echo "更新成功";
							echo "<script type='text/javascript'>";
							echo "window.location.href='course_choose.php'";
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
						$order_id=$aorder_max_row[0]+1;
						
						//取日期長度
						$order_date=substr($aorder_max_row[0], 0, 8); 			
					}		
					
					//比較日期		
					if(strtotime($today)>strtotime($order_date) || mysqli_num_rows($aorder_num_sql) == 0)
					{
						$order_id=strval($today)."001";
					}	
							
											
					$check=$_POST['checkbox'];
					foreach($check as $value){	
						$course_num=$_POST['course_num'];
						//新增訂單
						$aorder_sql = "INSERT INTO `aorder`(`order_id`, `sdate`, `account`, `course_num`, `unit`) VALUES ('$order_id', '$date', '$account', '$course_num[$value]','1')";	
						if (mysqli_query($db, $aorder_sql)) {
							// echo "更新成功";
							echo "<script type='text/javascript'>";
							echo "window.location.href='course_order.php'";
							echo "</script>"; 
						} else {
							echo "更新失敗";
						}	
						
						//新增完成，同時刪除訂單	
						$course_num=$_POST['course_num'];
						$car_delete_tsql = "DELETE FROM cart WHERE account='$account' and course_num = '$course_num[$value]'";
						mysqli_query($db, $car_delete_tsql);
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
	<?php include_once ("footer.php"); ?>	
</body>
</html>