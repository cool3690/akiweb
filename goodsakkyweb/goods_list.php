<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<div class="container-filud">	
		<div id="app">
			<?php include_once ("navbar_goods_admin.php"); ?>
		</div>
		<?php
			require 'db_login.php';
			error_reporting(0);
			echo '<h3 class="text-center mt-5 mb-5">商品資料</h3>';
			$account=$_SESSION['account'];
			// $goods_sql = mysqli_query($db, "SELECT * FROM goods");
			// $goods_sql2 = mysqli_query($db, "SELECT * FROM goods");
			$admin_sql = mysqli_query($db, "SELECT * FROM administrator where account=$account");	
			while ($admin_row = mysqli_fetch_array($admin_sql)) {
				$authorize=$admin_row['authorize'];
			}
			
			//設定分頁------------------------------------------------------------------------------
			$sql = "SELECT * FROM goods01";
			$query_sql = mysqli_query($db, $sql);
			$count_data = mysqli_num_rows($query_sql); //計算總數
			$per_num = 10; //每頁顯示筆數
			$totalpage = ceil($count_data/$per_num); //取得整數
			if (!isset($_GET["page"])){ 	
				$page=1; //設定起始頁
			} else {
				$page = intval($_GET["page"]); //確認頁數
			}
			$start_page = ($page-1) * $per_num; //每頁開始序號
		
			$goods_sql = mysqli_query($db, $sql.' LIMIT '.$start_page.', '.$per_num);
			// echo  $sql.' LIMIT '.$start_page.', '.$per_num;
			$i=($page-1)*10+1;
			//------------------------------------------------------------------------------		
			$j=0;
			$check="";
			// echo $goods_sql;
						
echo '
			<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2" id="goods_list_max">
				<table class="table text-center">
					<form method="POST" action="商品編輯" enctype="multipart/form-data">
';		
						while ($goods_row = mysqli_fetch_array($goods_sql)) {
							$content = str_replace( PHP_EOL, '<br />', $goods_row['content']);	
echo'
							<thead style="background-color:#D7FFEE;">
								<tr>
									<th width="8%">編號</th>
									<th width="13%">細項</th>
									<th width="">商品</th>
									<th width="5%">圖片</th></tr>
								</tr>
							</thead>
							<tbody>
								<tr>
									<input type="hidden" name="goods_num[]" value="'.$goods_row['goods_num'].'">
';
									if(@$_SESSION['admin']=='Y'){	
echo '
										<td class="align-middle">'.$goods_row['goods_num'].'</td>
										<input type="hidden" name="buy[]" value='.$j.'>
										<td class="align-middle">
											<div>品項編號</div>
											<select class="form-control" name="item_num[]">
';
												$sql = mysqli_query($db, "SELECT * FROM goods_item");
												while ($row = mysqli_fetch_array($sql)) {
													echo "<option value='".$row['item_num']."'"; echo $row["item_num"]==$goods_row['item_num']?'selected':''; echo">".$row['item_name']." </option>";
												}
echo'
											</select>	
									
											<div class="mt-3">商品類別</div>
											<select class="form-control" name="class_num[]">';
												$sql = mysqli_query($db, "SELECT * FROM goods_class");
												while ($row = mysqli_fetch_array($sql)) {
													echo "<option value='".$row['class_num']."'"; echo $row["class_num"]==$goods_row['class_num']?'selected':''; echo">".$row['class_name']." </option>";
												}
												echo'
											</select>
											
											<div class="mt-3">單位</div>
											<select class="form-control" name="unit">
											　	<option value="本"'; echo $goods_row["unit"] == "本" ? "selected":"";  echo '>本</option>
											　	<option value="個"'; echo $goods_row["unit"] == "個" ? "selected":"";  echo '>個</option>
											　	<option value="枚">枚</option>
											　	<option value="着">着</option>
								<!--			　	<option value="包み">包み</option>  -->
											</select>	
												
											<div class="mt-3">單價</div>
											<input type="text" class="form-control" name="price[]" value="'.$goods_row['price'].'">
										
											<div class="mt-3">狀態</div>
											<select class="form-control" name="exist[]">
													<option value="0"'; echo $goods_row["exist"] == "0" ? "selected":"";  echo '>上架</option>
													<option value="1"'; echo $goods_row["exist"] == "1" ? "selected":"";  echo '>停售</option>
											</select>								
										</td>
										<td class="align-middle">
											<div class="mt-5">商品名稱</div>
											<textarea class="form-control" rows="1" name="goods_name[]">'.$goods_row['goods_name'].'</textarea>
											
											<div class="mt-3">商品資料</div>
											<textarea class="form-control" rows="6" name="information[]">'.$goods_row['information'].'</textarea>
											
											<div class="mt-3">注意事項</div>
											<textarea class="form-control mb-5" rows="6" name="note[]">'.$goods_row['note'].'</textarea>
										</td>
										<td class="align-middle">
											<img class="img-fluid text-center mb-3" src="images/goods/'.$goods_row['photo'].'" width="80%">
											<input type="hidden" class="form-control" name="photo[]" value="'.$goods_row['photo'].'">
											<input type="file" name="photo2[]"> 
										</td>
';	
										$j++;	
									}
echo '
							</tr>
';
							}
echo '
						</tbody> 
					</table>
					<div class="text-center">
						<button type="submit" class="btn btn-info" name="submit" value="2">完成修改</button>
					</div>
				</form>
			</div>
';
			//下方分頁程式------------------------------------------------------------------------------------------
			$spage=$page-1;
			$epage=$page+1;
			
echo '
				<div>
					<ul class="pagination justify-content-center mt-5">
						<li class="page-item"><a class="page-link" href="?page=1"><<</a></li>
';
						
						if($spage<=1){
							echo '<li class="page-item disabled"><a class="page-link" href="?page='.$spage.'"><</a></li>';
						}else{    		
							echo '<li class="page-item"><a class="page-link" href="?page='.$spage.'"><</a></li>';
						}
						
						for( $page_loop=1 ; $page_loop<=$totalpage ; $page_loop++ ) {
							if ( $page-3 < $page_loop && $page_loop < $page+3 ) {
								if($page_loop==$page){
									echo '<li class="page-item active"><a class="page-link" href="?page='.$page_loop.'">'.$page_loop.'</a></li>';
								}else{
									echo '<li class="page-item"><a class="page-link" href="?page='.$page_loop.'">'.$page_loop.'</a></li>';
								}
							}
						}
						
						if($epage>=$totalpage){
							echo '<li class="page-item disabled"><a class="page-link" href="?page='.$epage.'">></a></li>';
						}else{    		
							echo '<li class="page-item"><a class="page-link" href="?page='.$epage.'">></a></li>';
						}
			echo '
						<li class="page-item"><a class="page-link" href="?page='.$totalpage.'">>></a></li>
					</ul>
				</div>
			';
			//-------------------------------------------------------------------------------------------------------------		
			
			
			if(@$_SESSION['admin']!='Y'){
				echo '
					<span>　　  * 　<i class="fas fa-shopping-cart mt-1 text-info"></i>　綠色未選商品<br>
				　　　　<i class="fas fa-cart-arrow-down mt-1 text-secondary"></i>　灰色為已放入購物車商品</span>
				';	
			}
			if (isset($_POST['submit'])) {
				
				$buy=$_POST['buy'];
				foreach($buy as $value2){	
					$goods_num=$_POST['goods_num'];
					$item_num=$_POST['item_num'];
					$class_num=$_POST['class_num'];
					$goods_name=$_POST['goods_name'];
					$information=$_POST['information'];
					$note=$_POST['note'];
					$unit=$_POST['unit'];
					$price=$_POST['price'];
					$photo=$_POST['photo'];
					
					$photo2 = $_FILES['photo2']['name'];
					$exist=$_POST['exist'];
					$target = "images/goods/".$goods_num[$value2]."-1.jpg";

					$format=substr($photo, -3);
					if($format=="jpg"){
						$target = "images/goods/".$goods_num[$value2]."-1.jpg";
					}else{
						$target = "images/goods/".$goods_num[$value2]."-1.png";
					}						
					if($photo2[$value2]!=null && $photo[$value2]!=$photo2[$value2]){
						$nphoto=$goods_num[$value2]."-1.jpg";
							$format=substr($photo, -3);
							if($format=="jpg"){
								$nphoto=$goods_num[$value2]."-1.jpg";
							}else{
								$nphoto=$goods_num[$value2]."-1.png";
							}
						move_uploaded_file($_FILES['photo2']['tmp_name'][$value2], $target);							
					}else{
						$nphoto=$photo[$value2];
					}
					$sql = "UPDATE `goods01` SET `item_num`='$item_num[$value2]',`class_num`='$class_num[$value2]',`goods_name`='$goods_name[$value2]',`information`='$information[$value2]',`note`='$note[$value2]',`unit`='$unit[$value2]',`price`='$price[$value2]',`photo`='$nphoto',`exist`='$exist[$value2]' WHERE goods_num = '$goods_num[$value2]'";

					if (mysqli_query($db, $sql)) {
						$check="T";
					}
				}
					if ($check=="T") {
						echo "<script type='text/javascript'>";
						echo 'alert("更新成功！");';
						echo "window.location.href='商品編輯'";
						echo "</script>"; 
					} else {
						echo '
							<div class="alert alert-danger alert-dismissible" id="myAlert">
								<button type="button" class="close">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>更新失敗！</strong> 
							</div>
						';
					}
			}			
			mysqli_close($db);
		?>
	</div>
	<script src="language/language.js"></script>
<!-- -->
</body>
</html>