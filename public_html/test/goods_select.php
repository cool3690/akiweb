<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<div class="container mb-5">	
		<?php include_once ("navbar.php"); ?>
	<script>
document.querySelector('textarea').addEventListener('keyup', function() {
  document.querySelector('pre').innerText = this.value;
});	
	</script>
	
		<h4 class="mt-3 mb-5 d-flex justify-content-center"><b>商品列表</b></h4>
		<div class="row">
			<?php
				require 'db_login.php';
				error_reporting(0);
				$goods_sql = mysqli_query($db, "SELECT * FROM goods where exist='0'");
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2">';
				if(@$_SESSION['admin']=='Y'){
					echo '<table class="table table-bordered text-center"><thead><tr><th width="15%">商品照片</th><th width="13%">商品名稱</th><th>商品資訊</th><th width="8%">單位</th><th width="10%">單價</th><th width="20%">更新圖片</th><th width="8%"></th></tr></thead>';						
				}else{	
					echo '<table class="table table-bordered text-center"><thead><tr><th width="15%">商品照片</th><th width="15%">商品名稱</th><th>商品資訊</th><th  width="8%">單位</th><th width="8%">單價</th><th width="3%">數量</th><th></th></tr></thead>';	
				}						
				while ($goods_row = mysqli_fetch_array($goods_sql)) {					
					echo '<form method="POST" action="goods_select.php" enctype="multipart/form-data">';						
					echo "<tbody><tr><td class='align-middle'>
						  <a href='images/goods/".$goods_row['photo']."' data-fancybox data-fancybox>	
							<img class='img-fluid text-center' src='images/goods/".$goods_row['photo']."' style='width:150px;height:150px;'>		
						  </a></td>";
					echo '<input type="hidden" name="item_num" value="'.$goods_row['item_num'].'">';
					echo '<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">';
					echo '<input type="hidden" name="notre" value="1">';
					if(@$_SESSION['admin']=='Y'){
						echo '<td class="align-middle"><input type="text" class="form-control " name="goods_name" value="'.$goods_row['goods_name'].'"></td>';
						echo '<td class="align-middle"><textarea class="form-control" rows="5" name="information">'.$goods_row['information'].'</textarea></td>';
						echo '<td class="align-middle"><input type="text" class="form-control" name="unit" value="'.$goods_row['unit'].'"></td>';
						echo '<td class="align-middle"><input type="number" class="form-control" name="price" value="'.$goods_row['price'].'"></td>';
						echo '<td class="align-middle"><input type="file" class="form-control-file border" name="photo"></td>';
						echo '<td class="align-middle"><button type="submit" class="btn btn-primary" name="submit" value="2">修改</button>';
						echo '<button type="submit" class="btn btn-primary mt-3" name="submit" value="3">刪除</button></td>';							
					}else{	
					$information = str_replace( PHP_EOL, '<br />', $goods_row['information']);
						echo '<td class="align-middle""align-middle"><p>'.$goods_row['goods_name'].'</p></td>';		
						echo '<td class="align-left"><p>'.$information.'</p></td>';
						echo '<td class="align-middle"><p>'.$goods_row['unit'].'</p></td>';				
						echo '<td class="align-middle"><p>'.$goods_row['price'].'</p></td>';
						echo '<td class="align-middle"><input type="number" class="form-control" min="0" value="1" name="quantity" style="width:80px;"></td>';				
						$goods_num = $goods_row['goods_num'];
						$account = $_SESSION['account'];
						$gcart_sql = mysqli_query($db, "SELECT * FROM goods_cart where account = '$account' and goods_num = '$goods_num'");
						if (mysqli_num_rows($gcart_sql) == 0) {		
							echo '<td class="align-middle"><button type="submit" class="btn btn-outline-info mt-3 mr-3" name="submit" value="1"><i class="fas fa-shopping-cart fa-2x"></i></button></td>';
						}else{
							echo '<td class="align-middle"><a href="#" class="btn btn-outline-dark disabled mt-3 mr-3" name="submit"><i class="fas fa-cart-arrow-down fa-2x"></i></a></td>';
							
						}						
					}	
					echo "</tr></form>";
				}
				
				echo '</tbody> </table></div>';
				
				if(@$_SESSION['admin']!='Y'){
					echo '*綠色 <i class="fas fa-shopping-cart mt-1 text-info"></i> 未選商品，灰色 <i class="fas fa-cart-arrow-down mt-1 text-secondary"></i> 為已放入購物車商品';	
				}
				
				
				if (isset($_POST['submit'])) {
					if(@$_SESSION['account']!=""){	
						$submit=$_POST['submit'];
						$account = $_SESSION['account'];
						$goods_num = $_POST['goods_num'];
						$item_num = $_POST['item_num'];
						$goods_name = $_POST['goods_name'];
						$information = $_POST['information'];
						$price = $_POST['price'];
						$unit=$_POST['unit'];
						$quantity=$_POST['quantity'];
						$photo = $_FILES['photo']['name'];
						$target = "images/goods/".basename($photo);
						
						if($submit == 1){	
							$gcart_sql = mysqli_query($db, "SELECT * FROM goods_cart where account = '$account' and goods_num = '$goods_num'");	
							date_default_timezone_set('Asia/Taipei');
							$date = date("Y/m/d");				
							$cart_into_sql = "INSERT INTO `goods_cart`(`account`, `sdate`, `goods_num`, `quantity`) VALUES ('$account', '$date', '$goods_num', '$quantity')";
							if (mysqli_query($db, $cart_into_sql)) {
								
								echo '<script language="javascript">';
								echo 'alert("放入購物車！");';
								echo "window.location.href='goods_select.php'";
								echo '</script>';	
							} else {
								echo "Error: " . $cart_sql . "<br />" . mysqli_error($db);
							}
						}else if($submit == 2){
							 if($photo!=''){
								$sql = "UPDATE goods SET item_num='$item_num', goods_name='$goods_name', information='$information', unit='$unit', price='$price' , photo='$photo' where goods_num = '$goods_num'";
								
								mysqli_query($db, $sql);
								if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
									echo '<script language="javascript">';
									echo 'alert("更新成功！");';
									echo "window.location.href='goods_select.php'";
									echo '</script>';				
								}else{
									echo '<script language="javascript">';
									echo 'alert("更新失敗！請重新操作");';
									echo '</script>';
								}	
							}else{
								$sql = "UPDATE goods SET item_num='$item_num', goods_name='$goods_name', information='$information', unit='$unit', price='$price' where goods_num = '$goods_num'";
								if (mysqli_query($db, $sql)) {
									echo '<script language="javascript">';
									echo 'alert("更新成功！");';
									echo "window.location.href='goods_select.php'";
									echo "</script>"; 
								}							
							}		
						}else{
							$sql = "DELETE FROM goods WHERE goods_num = '$goods_num'";
							if (mysqli_query($db, $sql)) {
								echo '<script language="javascript">';
								echo 'alert("刪除成功！");';
								echo "window.location.href='goods_select.php'";
								echo "</script>"; 
							} 
						}
					}else{
							echo '<script language="javascript">';
							echo 'alert("請進行登入！");';
							echo "window.location.href='login.php'";
							echo '</script>';
					}
				}
				mysqli_close($db);
			?>
			
		</div>
	</div>
	
<!--	<?php include_once ("footer.php"); ?>	-->
</body>
</html>