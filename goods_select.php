<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>			
</head>
 
 </head>
 <body>
	<?php include_once ("navbar_customer.php"); ?>	
	<img src="images/bg.jpg">
		<div class="container mb-5 mt-5">	
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home">教材用具</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1">日本精品</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu2">限定物</a>
				</li>
			</ul>
			
			<!-- Tab panes -->
			<div class="tab-content mb-5">
				<div id="home" class="container tab-pane active"><br>
					<?php
						require 'db_login.php';
						error_reporting(0);
						$goods=$_POST['goods'];
						$goods_sql = mysqli_query($db, "SELECT * FROM goods where goods_name LIKE '%$goods%' and item_num='4' and exist='0'");
												
						echo '<div class="row">';
							while ($goods_row = mysqli_fetch_array($goods_sql)) {
								if($goods_row['price']<1){
									$price="上架中";
								}else{
									$price=$goods_row['price']."元";
								}
								echo'	<div class="col-sm-3 col-md-3 col-lg-3 mt-5">
									<form action="商品資訊" method="get">
										<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">

										<button type="submit" class="btn btn-link"><img class="img-fluid text-center" src="images/goods/'.$goods_row['photo'].'" width="80%"></button>
										<button type="submit" class="btn btn-link text-info" style="text-decoration:none;"><div class="text-left" style="height:50px;">'.$goods_row['goods_name'].'</div></button>
								
										<div class="text-center">'.$price.'</div>
									</form>
								</div>';	
							}
						?>		
					</div>
				</div>
				<div id="menu1" class="container tab-pane fade"><br>
					<?php
						require 'db_login.php';
						error_reporting(0);
						$goods=$_POST['goods'];
						$goods_sql = mysqli_query($db, "SELECT * FROM goods where goods_name LIKE '%$goods%' and item_num='2' and exist='0'");
							
						echo '<div class="row">';
							while ($goods_row = mysqli_fetch_array($goods_sql)) {
								if($goods_row['price']<1){
									$price="上架中";
								}else{
									$price=$goods_row['price']."元";
								}
								echo'	<div class="col-sm-3 col-md-3 col-lg-3 mt-5">
									<form action="商品資訊" method="get">
										<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">

										<button type="submit" class="btn btn-link"><img class="img-fluid text-center" src="images/goods/'.$goods_row['photo'].'" width="80%"></button>
										<button type="submit" class="btn btn-link text-info" style="text-decoration:none;"><div class="text-left" style="height:50px;">'.$goods_row['goods_name'].'</div></button>
								
										<div class="text-center">'.$price.'</div>
									</form>
								</div>';	
							}
						?>		
					</div>
				</div>
				<div id="menu2" class="container tab-pane fade"><br>
					<?php
						require 'db_login.php';
						error_reporting(0);
						$goods_sql = mysqli_query($db, "SELECT * FROM goods where goods_name LIKE '%$goods%' and item_num='5' and exist='0'");
							
						echo '<div class="row">';
							while ($goods_row = mysqli_fetch_array($goods_sql)) {
								if($goods_row['price']<1){
									$price="上架中";
								}else{
									$price=$goods_row['price']."元";
								}
								echo'	<div class="col-sm-3 col-md-3 col-lg-3 mt-5">
									<form action="商品資訊" method="get">
										<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">

										<button type="submit" class="btn btn-link"><img class="img-fluid text-center" src="images/goods/'.$goods_row['photo'].'" width="80%"></button>
										<button type="submit" class="btn btn-link text-info" style="text-decoration:none;"><div class="text-left" style="height:50px;">'.$goods_row['goods_name'].'</div></button>
								
										<div class="text-center">'.$price.'</div>
									</form>
								</div>';	
							}
						?>		
				</div>
			</div>	
		</div>	

<!--		<?php include_once ("footer0.php"); ?>-->
	
</body>
</html>