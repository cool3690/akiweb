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
			error_reporting(0);
			$account=$_SESSION['account'];
			echo '<h3 class="text-center mt-3">購物車內容</h3>';
			echo '<table class="table table-bordered text-center"><thead><tr><th><input type="checkbox"  class="checkall"/></th><th>商品</th><th>品牌名稱</th><th width="20%">數量</th><th>單價</th><th>小計</th></tr></thead>';
			$goods_cart_sql = mysqli_query($db, "SELECT * FROM goods_cart where account='$account'");	
			$i=0;
			$j=0;
			$notre=0;
			while ($goods_cart_row = mysqli_fetch_array($goods_cart_sql)) {
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mb-2">';
				echo '<form method="post" name="form1" id="form1" action="goods_cart.php">';	
				$goods_num = $goods_cart_row['goods_num'];
				$goods_sql = mysqli_query($db, "SELECT * FROM goods where goods_num = '$goods_num' and exist='0'");	
				while ($goods_row = mysqli_fetch_array($goods_sql)) {
					if($goods_row['exist']!=1){
					$datepicker='datepicker'.$j;
					echo '<input type="hidden" name="gcart_num[]" value="'.$goods_cart_row['gcart_num'].'">';
					echo '<input type="hidden" name="goods_num[]" value="'.$goods_num.'">';
					echo '<input type="hidden" name="price[]" value="'.$goods_row['price'].'">';
					echo '<input type="hidden" name="notre" value="1">';
					echo '<tbody><tr>
						  <input type="hidden" name="buy[]" value='.$j.'>
						  <td class="align-middle">
								<input type="checkbox" name="checkbox[]" value='.$i.' id="check" class="child" >
						  </td>
						  <td class="align-middle">
								<img src="images/goods/'.$goods_row['photo'].'" style="width:100px;height:100px;">
						  </td>
						  <td class="align-middle">
								'.$goods_row['goods_name'].'
						  </td>
						  <td class="align-middle form-group">
								<input type="number" min="0" data-name="'.$goods_cart_row['gcart_num'].'" data-price="'.$goods_row['price'].'" size="1" value="'.$goods_cart_row['quantity'].'" class="form-control prc" name="unit[]">					  
						  </td>	
						  <td class="align-middle">
								'.$goods_row['price'].'
								
						  </td>
						  <td class="align-middle form-group">	
								<span class="price"><label id="'.$goods_cart_row['gcart_num'].'" class="t" readonly ></label></span>
						  </td>							  
						  </tr>';
				}
						  $i++;
						  $j++;
				}		  
			}
//			echo '<input type="hidden" id="result"  name="result">';
//			echo '<tr><td></td><td></td><td></td><td></td><td>總計</td><td><div class="form-group"><output id="result"></output></div></td></tr>';
			echo '</tbody> </table><input type="hidden" name="notre" value="1">';
			echo '<button type="submit" class="btn btn-primary" name="submit" value="1">刪除</button>
			<div class=" text-right"><button type="submit" class="btn btn-primary" name="submit" value="2">完成訂單</button></div></form>';		
			
			if (isset($_POST['submit'])) {
			$account = $_SESSION['account'];
				$submit=$_POST['submit'];
				if($submit==1){	
				//刪除商品
					$check=$_POST['checkbox'];
					foreach($check as $value){	
						$gcart_num=$_POST['gcart_num'];
						$cart_delete_sql = "DELETE FROM goods_cart WHERE account='$account' and gcart_num = '$gcart_num[$value]'";
						if (mysqli_query($db, $cart_delete_sql)) {
							echo "更新成功";
							echo "<script type='text/javascript'>";
							echo "window.location.href='goods_cart.php'";
							echo "</script>"; 
						} else {
							echo "更新失敗";
						}	
					}			
				}else{		
				//完成商品訂單(order)------------------------------------------------------------------------------------		
					//查詢goods_order資料庫是否有資料
					date_default_timezone_set('Asia/Taipei');
					$date=date("Y/m/d");
					$today=date("Ymd");						
					$goods_order_num_sql = mysqli_query($db, "SELECT * FROM goods_order");
					//取新增訂單資料			

					//取最大值
					$goods_order_max_sql = mysqli_query($db, "SELECT MAX(gorder_id) FROM goods_order");
					while ($goods_order_max_row = mysqli_fetch_array($goods_order_max_sql)) {
						$gorder_id=$goods_order_max_row[0]+1;
						
						//取日期長度
						$order_date=substr($goods_order_max_row[0], 0, 8); 			
					}		
					
					//比較日期		
					if(strtotime($today)>strtotime($order_date) || mysqli_num_rows($goods_order_num_sql) == 0)
					{
						$gorder_id=strval($today)."001";
					}	
							
											
					$check=$_POST['checkbox'];
					foreach($check as $value){	
						$goods_num=$_POST['goods_num'];
						$price=$_POST['price'];
						$unit=$_POST['unit'];
						$subtotal=$price[$value]*$unit[$value];
						//新增訂單
						$goods_order_sql = "INSERT INTO `goods_order`(`gorder_id`, `sdate`, `account`, `goods_num`, `unit`, `subtotal`) VALUES ('$gorder_id', '$date', '$account', '$goods_num[$value]','$unit[$value]','$subtotal')";	
						//echo $goods_order_sql;
						if (mysqli_query($db, $goods_order_sql)) {
							// echo "更新成功";
							echo "<script type='text/javascript'>";
							echo "window.location.href='goods_order.php'";
							echo "</script>"; 
						} else {
							echo "更新失敗";
						}	
						
						//新增完成，同時刪除訂單	
						$goods_num=$_POST['goods_num'];
						$gcar_delete_tsql = "DELETE FROM goods_cart WHERE account='$account' and goods_num = '$goods_num[$value]'";
						mysqli_query($db, $gcar_delete_tsql);
					}	
				}
			}			
			mysqli_close($db);
		?>
	</div>
	
	<script type="text/javascript">
		//input全選
		$(function(){
			$('.checkall').on('click', function() {
				$('.child').prop('checked', this.checked)
			});
		});
	
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