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
				echo '<form method="post" name="form1" id="form1" action="cart.php">';	
				$goods_num = $goods_cart_row['goods_num'];
				$goods_sql = mysqli_query($db, "SELECT * FROM goods where goods_num = '$goods_num'");	
				while ($goods_row = mysqli_fetch_array($goods_sql)) {
					$datepicker='datepicker'.$j;
					echo '<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">';
					echo '<input type="hidden" name="price" value="'.$goods_row['price'].'">';
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
								<input type="number" min="0" data-name="'.$goods_cart_row['gcart_num'].'" data-price="'.$goods_row['price'].'" size="1" value="'.$goods_cart_row['quantity'].'" class="form-control prc" >					  
						  </td>	
						  <td class="align-middle">
								'.$goods_row['price'].'
								
						  </td>
						  <td class="align-middle form-group">	
								<span class="price"><label id="'.$goods_cart_row['gcart_num'].'" class="t" readonly ></label></span>
						  </td>							  
						  </tr>';

						  $i++;
						  $j++;
				}		  
			}
//			echo '<input type="hidden" id="result"  name="result">';
			echo '<tr><td></td><td></td><td></td><td></td><td>總計</td><td><div class="form-group"><output id="result"></output></div></td></tr>';
			echo '</tbody> </table><input type="hidden" name="notre" value="1">';
			echo '<button type="submit" class="btn btn-primary" name="submit" value="1">刪除</button>
			<div class=" text-right"><button type="submit" class="btn btn-primary" name="submit" value="2">下一步</button></div></form>';		
			
			function date_week($date_w){
				return ['', '一', '二', '三', '四', '五', '六', '日'][$date_w];
			}			
			$notre=$_POST['notre'];
			if($notre==1){	
				$submit=$_POST['submit'];
				if($submit==1){	
					$check=$_POST['checkbox'];
					echo '<br>';
					$result=$_POST['result'];
					echo $result.'<br>';
					foreach($check as $value){	
						$quantity=$_POST['quantity'];
						$cart_id=$_POST['cart_id'];	
						$sql = "DELETE FROM cart_list WHERE cart_list_id = '$cart_id[$value]'";

						if (mysqli_query($db, $sql)) {
//							echo "更新成功";
							echo "<script type='text/javascript'>";
							echo "window.location.href='cart.php'";
							echo "</script>"; 
						} else {
							echo "更新失敗";
						}	
					}			
				}else{		
					$_SESSION['result']=$_POST['result'];
					$buy=$_POST['buy'];
					foreach($buy as $value2){	
						$quantity=$_POST['quantity'];
						$cart_id=$_POST['cart_id'];	
						$period=$_POST['period'];
						$delivery_date=$_POST['delivery_date'];	
						$today = date('Y-m-d');
						
						if(strtotime($delivery_date[$value2]) > strtotime($today)){
							$date = mktime(0, 0, 0, substr($delivery_date[$value2], 4, 2), substr($delivery_date[$value2], 6, 2), substr($delivery_date[$value2], 0, 4));
							$date_w = date("N", $date); 
							$date_d = date("d", $date); 
							$date_s = date("m-d", $date); 
							$date_y = date("m/d", $date); 
							
							$date_year = date("Y", $date); 
							$date_month = date("m", $date);
							$delivery_date = date("Y/m/d", $date); 
							
							if($period[$value2]=="W"){
								$day = date_week($date_w);
								$nextdate  = mktime(0, 0, 0, $date_month, $date_d+7, $date_year);
								$next_date = date("Y/m/d", $nextdate); 
								echo $day.'<br>';
								echo $next_date.'<br>';								
							}else if($period[$value2]== "M"){
								$day = $date_d;
								$nextdate = mktime(0, 0, 0, $date_month+1, $date_d, $date_year);
								$next_date = date("Y/m/d", $nextdate); 
								echo $day.'<br>';
								echo $next_date.'<br>';							
							}else if($period[$value2]== "S"){
								$day = '04-'.$date_d;
								$nextdate  = mktime(0, 0, 0, $date_month+4, $date_d, $date_year);
								$next_date = date("Y/m/d", $nextdate); 
								echo $day.'<br>'; 
								echo $next_date.'<br>';							
							}else if($period[$value2]== "Y"){
								$day = $date_month.'/'.$date_d;
								$nextdate  = mktime(0, 0, 0, $date_month, $date_d, $date_year+1);
								$next_date = date("Y/m/d", $nextdate); 
								echo $day.'<br>';
								echo $next_date.'<br>';
							}		
							
							$sql = "UPDATE cart_list SET quantity='$quantity[$value2]', period='$period[$value2]', day='$day', delivery_date='$delivery_date', next_delivery_date='$next_date' WHERE cart_list_id='$cart_id[$value2]'"; 
							
							if (mysqli_query($db, $sql)) {
								// echo "更新成功";
								echo "<script type='text/javascript'>";
								echo "window.location.href='purchase.php'";
								echo "</script>"; 
							} else {
								echo "更新失敗";
							}	
					
						}else{
							echo '<script language="javascript">';
							echo 'alert("運送日期必須大於今天日期！");';
							echo "window.location.href='cart.php'";
							echo '</script>';
						}						
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
	
	//計算小計
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
		//$("#result").val(totalSum);
	});
	
	$('.form-group').on('input', '.prc', function(){
		var totalSum = 0;
		var Sum = 0;
		var sum = 0;
		$('.form-group .prc').each(function(){
			var pr = $(this).data("price");
			var name = $(this).data("name");
			var qut = $(this).val();
			var total = pr * qut;
       $('.child:checked').each(function(){
			$("#"+name).text(total);	
			
       $('#result').text(sum);
	   });
			var inputVal = $(this).val();
			if($.isNumeric(inputVal)){
				totalSum += total;
			}

		}); 				
		//$("#result").val(totalSum);
	});
		
	//計算已經checked總計	
	$('.child').change(function(){
       var sum = 0;
       $('.child:checked').each(function(){
            sum+=parseFloat($(this).parent().next('td').next('td').next('td').next('td').next('td').find('.price').text());
       });
       $('#result').text(sum);
    });		
	</script>
	<?php include_once ("footer.php"); ?>	
</body>
</html>