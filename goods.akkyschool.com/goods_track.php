<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>			
</head>
 
 </head>
 <body>
	<div class="container-filud" id="app">	
		<?php include_once ("navbar_goods_user.php"); ?>
		<div class="container mt-5 mb-5">	
			<h3 class="text-center mt-5 mb-5"><span class="pl-4" style="border-left:6px solid #005AB5;">追蹤商品</span></h3>
			<div class="row">
			<?php 
				require 'db_login.php';
				error_reporting(0);
				$account=$_SESSION['account'];
				$goods_cart_sql = mysqli_query($db, "SELECT * FROM goods_track01 where account='$account'");	
				$i=0;
				$j=0;
				$notre=0;
				while ($goods_cart_row = mysqli_fetch_array($goods_cart_sql)) {	
					$goods_num = $goods_cart_row['goods_num'];
					$goods_sql = mysqli_query($db, "SELECT * FROM goods01 where goods_num = '$goods_num' and exist='0'");	
					while ($goods_row = mysqli_fetch_array($goods_sql)) {
						echo'	<div class="col-sm-3 col-md-3 col-lg-3 mt-5">
							<form action="商品資訊" method="get">
								<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">

								<button type="submit" class="btn btn-link"><img class="img-fluid text-center" src="images/goods/'.$goods_row['photo'].'" width="80%"></button>
								<button type="submit" class="btn btn-link text-info" style="text-decoration:none;"><div class="text-left" style="height:50px;">'.$goods_row['goods_name'].'</div></button>
					 
								<div class="text-center">'.$goods_row['price'].'元</div>
							</form>
						</div>';
					}		  
				}

				echo '</form>';		
				
				mysqli_close($db);
			?>
			</div>
		</div>
	</div>	
	
	<script src="language/language.js"></script>
</body>
</html>