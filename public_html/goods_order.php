<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>			
</head>
<body>
	<?php
		if($_SESSION['authorize']==1 || $_SESSION['authorize']==3){	
			include_once ("navbar_backstage.php"); 
		}else{
			include_once ("navbar_customer.php"); 
		}
	?>
	<img src="images/bg.jpg">
	<div class="container" style="padding-bottom:220px;">
		<?php 
			require 'db_login.php';
			$account = $_SESSION['account'];
			error_reporting(0);
			$check=0;
			echo '<h3 class="text-center mt-3 mb-5">商品訂單</h3>';
			echo '<table class="table table-striped text-center"><thead><tr><th>訂單編號</th><th>訂購日期</th><th>商品</th><th>品牌名稱</th><th width="10%">數量</th><th>單價</th><th>小計</th></tr></thead>';		
			$gorder_sql = mysqli_query($db, "SELECT * FROM goods_order where account='$account' ORDER BY gorder_id DESC");
			while ($gorder_row = mysqli_fetch_array($gorder_sql)) {
				$goods_num = $gorder_row['goods_num'];
				$gorder_id=$gorder_row['gorder_id'];
				$goods_sql = mysqli_query($db, "SELECT * FROM goods where goods_num = '$goods_num'");	
				while ($goods_row = mysqli_fetch_array($goods_sql)) {
					echo '<tbody><tr>
						  <td class="align-middle">'.$gorder_row['gorder_id'].'</td>
						  <td class="align-middle">'.$gorder_row['sdate'].'</td>
						  <td class="align-middle">
								<img src="images/goods/'.$goods_row['photo'].'" style="width:100px;height:100px;">
						  </td>
						  <td class="align-middle">'.$goods_row['goods_name'].'</td>
						  <td class="align-middle">'.$goods_row['price'].'</td>
						  <td class="align-middle">'.$gorder_row['unit'].'</td>

						  <div class="align-middle form-group">
								<input type="hidden" min="0" data-name="'.$gorder_row['gorder_num'].'" data-price="'.$goods_row['price'].'" size="1" value="'.$gorder_row['unit'].'" class="form-control prc" >
						  </div>	
						  <td class="align-middle">
								<label id="'.$gorder_row['gorder_num'].'" class="t" readonly ></label>			  
						  </td>	
				  
						  </tr>';
				}
				$check_sum = mysqli_query($db, "SELECT gorder_id, count( * ) AS count FROM goods_order GROUP BY gorder_id");
				$check++;
				while ($check_row = mysqli_fetch_array($check_sum)) {
					if($gorder_id==$check_row[0] && $check==$check_row[1]){
						$purchase_list_sum =  mysqli_query($db, "SELECT SUM(subtotal) FROM goods_order where gorder_id = '$gorder_id'");
						$sum = mysqli_fetch_array($purchase_list_sum);
						echo '<tr><td></td><td></td><td></td><td></td><td></td><td class="align-middle">總計</td><td class="align-middle">'.$sum[0].'</td></tr>';
						$check=0;
					}
				}	
			}
//			echo '<tr><td></td><td></td><td></td><td></td><td></td><td class="align-middle">總計</td><td class="align-middle">'.$sum[0].'</td></tr>';	
//			echo '<input type="hidden" id="result"  name="result">';
//			echo '<tr><td></td><td></td><td></td><td></td><td></td><td>總計</td><td><div class="form-group"><output id="result"></output></div></td></tr>';
//			echo '<input type="hidden" id="result"  name="result">';
//			echo '<tr><td></td><td></td><td></td><td></td><td>總計</td><td><div class="form-group"><input id="result"  name="result"></div></td></tr>';
			echo '</tbody> </table>';	

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
				$("#result").text(totalSum);
			});
	</script>	
	
	<?php include_once ("footer0.php"); ?>	
	
</body>
</html>