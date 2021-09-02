<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
		$(document).ready(function(){
			$(".close").click(function(){
				$("#myAlert").alert("close");
			});
		});
	</script>
		<?php include_once ("navbar_customer.php"); ?>		
	<div class="container mb-5">
<!--		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color:#ffffff;">
				<li class="breadcrumb-item"><a href="首頁">Home</a></li>
				<li class="breadcrumb-item"><a href="商品列表.php">アクセサリー</a></li>
				<li class="breadcrumb-item active" aria-current="page">七宝焼</li>
			</ol>
		</nav>-->
			<?php
				require 'db_login.php';
				error_reporting(0);
				$goods_num = $_GET['goods_num'];
				$goods_sql = mysqli_query($db, "SELECT * FROM goods where exist='0' and goods_num=$goods_num");
				
				while ($goods_row = mysqli_fetch_array($goods_sql)) {		
					echo '<div class="row">
							<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">';
								if (isset($_POST['submit'])) {
									if(@$_SESSION['account']!=""){	
										$submit=$_POST['submit'];
										$account = $_SESSION['account'];
										$goods_num = $_POST['goods_num'];
										if($submit == 1){	
											date_default_timezone_set('Asia/Taipei');
											$date = date("Y/m/d");				
											$cart_into_sql = "INSERT INTO `goods_cart`(`account`, `sdate`, `goods_num`, `quantity`) VALUES ('$account', '$date', '$goods_num', '1')";
											if (mysqli_query($db, $cart_into_sql)) {
												echo '<div class="alert alert-success alert-dismissible fade show">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<strong>放入購物車！</strong>
													 </div>';
											} else {
												echo "Error: " . $cart_sql . "<br />" . mysqli_error($db);
											}
										}else if($submit == 2){	
											date_default_timezone_set('Asia/Taipei');
											$date = date("Y/m/d");				
											$track_sql = "INSERT INTO `goods_track`(`sdate`, `account`, `goods_num`) VALUES ('$date', '$account', '$goods_num')";
											if (mysqli_query($db, $track_sql)) {
												echo '<div class="alert alert-danger alert-dismissible fade show">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<strong>追蹤此商品！</strong>
													 </div>';	
											} else {
												echo "Error: " . $cart_sql . "<br />" . mysqli_error($db);
											}
										}
									}else{
											echo '<script language="javascript">';
											echo 'alert("請進行登入！");';
											echo "window.location.href='登入會員'";
											echo '</script>';
									}
								}						
					echo '</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-7" style="border-right: 2px solid #bebebe;">
								';	
											if($goods_row['class_num']=="5"){
												echo "
									  <a href='images/goods/".$goods_row['photo']."' data-fancybox data-fancybox>	
										<img class='img-fluid text-center mx-auto d-block mb-5' src='images/goods/".$goods_row['photo']."' style='width:50%'>		
									  </a>";
												
											
											}else{					
									echo "
									  <a href='images/goods/".$goods_row['photo']."' data-fancybox data-fancybox>	
										<img class='img-fluid text-center mx-auto d-block mb-5' src='images/goods/".$goods_row['photo']."' style='width:100%'>		
									  </a>";
									  }
									echo '<input type="hidden" name="item_num" value="'.$goods_row['item_num'].'">';
									echo '<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">';
									echo '<input type="hidden" name="notre" value="1">';
									$information = str_replace( PHP_EOL, '<br />', $goods_row['information']);
									echo '<p>'.$goods_row['goods_name'].'</p>';		
									echo '<p>'.$information.'</p>';
									for($a=1;$a<6;$a++){
									$file="images/goods/".$goods_num."-".$a.".jpg";
										if (file_exists($file)) {
										echo "
										  <a href='$file' data-fancybox data-fancybox>	
											<img class='img-fluid text-center mt-3' src='$file' style='width:100%'>		
										  </a>";
										}else{
											$file="images/goods/".$goods_num."-".$a.".png";
											echo "
											  <a href='$file' data-fancybox data-fancybox>	
												<img class='img-fluid text-center mt-3' src='$file' style='width:100%'>		
											  </a>";
										
										}
									}
									echo '<hr><p style="font-weight:bold;"><i class="fab fa-buffer mt-3"></i>　購入の際の注意点</p>
									<p class="mt-3" style="font-size:14px;padding-left:10px;">'.$goods_row['note'].'
									</p>';
							echo '</p>
						</div>';
						echo '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-5 pl-5"><div>
								<form action="商品資訊?goods_num='.$goods_num.'" method="POST">	';
								
									if($goods_row['price']<1){
											echo '<a href="#" class="btn disabled pt-3 pb-3 mr-3 mb-5" name="submit" style="background-color: #ffd306;width:100%;color:#005ab5;font-size:26px;">上架中</a>';
									}else{
										echo '<div>価格: <span style="font-size:26px;">'.$goods_row['price'].'</span> 元　　1人が購入しました</span></div>';
									
				//						echo '<input type="number" class="form-control" min="0" value="1" name="quantity" style="width:80px;">';				
										$goods_num = $goods_row['goods_num'];
										$account = $_SESSION['account'];
										$gcart_sql = mysqli_query($db, "SELECT * FROM goods_cart where account = '$account' and goods_num = '$goods_num'");
										if (mysqli_num_rows($gcart_sql) == 0) {		
											echo '<button type="submit" class="btn mt-3 mr-3 text-white" name="submit" value="1" style="background-color: #ffaf60;width:100%">購買</button>';
										}else{
											echo '<a href="#" class="btn disabled mt-3 mr-3" name="submit" style="background-color: #ffaf60;width:100%">已在購物車</a>';
											
										}
										echo '
										<p class="mt-3">この作家から5,000円以上購入で送料無料</p>';
									}
									echo '
									<div class="row">
										<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<input type="hidden" name="goods_num" value="'.$goods_row['goods_num'].'">';
											
									$gtrack_sql = mysqli_query($db, "SELECT * FROM goods_track where account = '$account' and goods_num = '$goods_num'");
									if (mysqli_num_rows($gtrack_sql) == 0) {		
										echo '
											<button type="submit" class="btn btn-outline-light text-dark" name="submit" value="2" style="width:100%;font-size:14px;border:2px solid #f0f0f0;"><i class="fab fa-gratipay text-danger"></i>　お気に入りに追加</button>';
									}else{
										echo '
											<a href="#" class="btn disabled" name="submit" value="2" style="width:100%;font-size:14px;border:2px solid #f0f0f0;"><i class="fab fa-gratipay text-danger"></i>　已追加</a>';
										
									}
									
										echo'</div>
										<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<button type="button" class="btn btn-outline-light text-dark" style="width:100%;font-size:14px;border:2px solid #f0f0f0;"><i class="fas fa-envelope text-info"></i>　商品評估及留言</button>
										</div>
									</div>
								</form>
						</div>';
						echo '<div class="mt-5 pt-3 pl-3 pr-3 pb-3" style="border:5px #f0f0f0 solid;">
								<span class="text-info">mio min mio GALLERY</span><br><span class="badge badge-warning">New</span>';
							echo "<div class='row'>
									<div class='col-12 col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-3'>
										<img class='img-fluid text-center' src='images/goods/0-1.jpg' style='width:100%'>
									</div>";
									$i=1;
									$goods_class = mysqli_query($db, "SELECT class_num FROM goods where exist='0' and goods_num=$goods_num");
									while ($class_row = mysqli_fetch_array($goods_class)) {	
										$goods_class = $class_row['class_num'];
									}
									$class_sql = mysqli_query($db, "SELECT * FROM goods where class_num=$goods_class");	
									while ($class_row = mysqli_fetch_array($class_sql)) {	
										$i++;
										echo '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-3">
												<form action="商品資訊?goods_num='.$goods_num.'" method="get">
													<input type="hidden" name="goods_num" value="'.$class_row['goods_num'].'">

													<button type="submit" class="btn btn-link"><img class="img-fluid text-center" src="images/goods/'.$class_row['photo'].'" width="100%"></button>
												</form>
											</div>';							
											
										if($i>8){
											break;
										}
									}
						echo'</div>
						<div>';						
						
					echo '</div>
				</div>';
			}
				
			mysqli_close($db);
		?>
			
	</div>
	
<!--	<?php include_once ("footer0.php"); ?>	-->
</body>
</html>