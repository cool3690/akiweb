<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>			
</head>
 <body>
	<div class="container-filud" id="app">	
		<?php 
			if(@$_SESSION['admin']=="Y"){
				include_once ("navbar_goods_admin.php");
			}else if(@$_SESSION['admin']=="N"){
				include_once ("navbar_goods_user.php"); 
			}else{
				include_once ("navbar_null.php"); 
			}
		?>
		<div class="container mb-5">	
			<div class=" ml-2 mr-2 mb-5" style="width:300px;">
				<form action="首頁" method="post">
					<div class="input-group">
						<label class="mt-2" for="goods_name">{{ $t('goods_name')}}：</label>
						<input type="text" class="form-control" placeholder="" name="goods" id="goods_name">
						<button class="btn btn-secondary" type="submit">{{ $t('search')}}</button> 
					</div>
				</form>
			</div>
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home">{{ $t('teach_material')}}</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1">{{ $t('japanese_boutique')}}</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu2">{{ $t('Limiter')}}</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content mb-5">
				<div id="home" class="container tab-pane active" height="200"><br>
					<?php
						require 'db_login.php';
						error_reporting(0);
						$goods=$_POST['goods'];
						$account=$_SESSION['account'];
						$goods_sql = mysqli_query($db, "SELECT * FROM goods01 where goods_name LIKE '%$goods%' and item_num='4' and exist='0'");
						
												
						echo '<div class="row">';
							while ($goods_row = mysqli_fetch_array($goods_sql)) {
								if($goods_row['price']<1){
									$price="上架中";
								}else{
									$price=$goods_row['price']."元";
								}
								echo'
									<div class="col-sm-3 col-md-3 col-lg-3 mt-5">
										<form action="商品資訊" method="get">
											<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">
											<button type="submit" class="btn btn-link">
												<img class="img-fluid text-center" src="images/goods/'.$goods_row['photo'].'" width="80%">
											</button>
											<button type="submit" class="btn btn-link text-info" style="text-decoration:none;">
												<div class="text-left" style="height:50px;">
													'.$goods_row['goods_name'].'
												</div>
											</button>
									
											<div class="text-center">'.$price.'</div>
										</form>
									</div>
								';	
							}
						?>		
					</div>
				</div>
				<div id="menu1" class="container tab-pane fade"><br>
					<?php
						require 'db_login.php';
						error_reporting(0);
						$goods=$_POST['goods'];
						$goods_sql = mysqli_query($db, "SELECT * FROM goods01 where goods_name LIKE '%$goods%' and item_num='2' and exist='0'");
							
						echo '<div class="row">';
							while ($goods_row = mysqli_fetch_array($goods_sql)) {
								if($goods_row['price']<1){
									$price="上架中";
								}else{
									$price=$goods_row['price']."元";
								}
								echo'	
									<div class="col-sm-3 col-md-3 col-lg-3 mt-5">
										<form action="商品資訊" method="get">
											<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">
											<button type="submit" class="btn btn-link">
												<img class="img-fluid text-center" src="images/goods/'.$goods_row['photo'].'" width="80%">
											</button>
											<button type="submit" class="btn btn-link text-info" style="text-decoration:none;">
												<div class="text-left" style="height:50px;">
													'.$goods_row['goods_name'].'
												</div>
											</button>
									
											<div class="text-center">'.$price.'</div>
										</form>
									</div>
								';	
							}
						?>		
					</div>
				</div>
				<div id="menu2" class="container tab-pane fade"><br>
					<?php
						require 'db_login.php';
						error_reporting(0);
						$goods_sql = mysqli_query($db, "SELECT * FROM goods01 where goods_name LIKE '%$goods%' and item_num='5' and exist='0'");
							
						echo '<div class="row">';
							while ($goods_row = mysqli_fetch_array($goods_sql)) {
								if($goods_row['price']<1){
									$price="上架中";
								}else{
									$price=$goods_row['price']."元";
								}
								echo'	
									<div class="col-sm-3 col-md-3 col-lg-3 mt-5">
										<form action="商品資訊" method="get">
											<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">
											<button type="submit" class="btn btn-link">
												<img class="img-fluid text-center" src="images/goods/'.$goods_row['photo'].'" width="80%">
											</button>
											<button type="submit" class="btn btn-link text-info" style="text-decoration:none;">
												<div class="text-left" style="height:50px;">
													'.$goods_row['goods_name'].'
												</div>
											</button>
									
											<div class="text-center">'.$price.'</div>
										</form>
									</div>
								';	
							}
						?>		
				</div>
			</div>	
		</div>	
	</div>	
	
	<script src="language/language.js"></script>

<!--		<?php include_once ("footer0.php"); ?>-->
	
</body>
</html>