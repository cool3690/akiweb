<!DOCTYPE html>
<html>
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	<?php include_once ("navbar_backstage.php"); ?>	

	<div class="container-fliud pl-3 pr-3" style="padding-bottom:8%;">

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
				if($authorize=="1"){
					$goods_sql = mysqli_query($db, "SELECT * FROM goods");
				}else{					
					$goods_sql = mysqli_query($db, "SELECT * FROM goods where manager=$account");
				}
				$sql = mysqli_query($db, "SELECT * FROM goods");
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2" id="goods_list_max">';
					echo '<table class="table text-center">
							<thead><tr class="table-success">
								<th width="4%">編號</th>
								<th width="9%">品項編號</th>
								<th width="8%">商品類別</th>
								<th width="13%">商品名稱</th>
								<th width="22%">商品資訊</th>
								<th width="22%">注意事項</th>
								<th width="4%">單位</th>
								<th width="6%">單價</th>
								<th width="5%">圖片</th>
								<th width="7%">狀態</th>
							<!--	<th width="25%">處理狀態</th>  -->
							</tr></thead>';			
							$i=0;
							
					echo '<form method="POST" action="商品編輯" enctype="multipart/form-data">';		
				while ($goods_row = mysqli_fetch_array($goods_sql)) {
					$content = str_replace( PHP_EOL, '<br />', $goods_row['content']);					
					echo '<tbody><tr>';
					echo '<input type="hidden" name="goods_num[]" value="'.$goods_row['goods_num'].'">';
					echo '<input type="hidden" name="notre" value="1">';	
					if(@$_SESSION['admin']=='Y'){	
						echo '<td class="align-middle">'.$goods_row['goods_num'].'</td>';
						echo '<input type="hidden" name="buy[]" value='.$i.'>';
						echo '<td class="align-middle">
							<select class="form-control" name="item_num[]">';
								$sql = mysqli_query($db, "SELECT * FROM goods_item");
								while ($row = mysqli_fetch_array($sql)) {
									echo "<option value='".$row['item_num']."'"; echo $row["item_num"]==$goods_row['item_num']?'selected':''; echo">".$row['item_name']." </option>";
								}
								echo'
							</select>					
						</td>';
						echo '<td class="align-middle">
							<select class="form-control" name="class_num[]">';
								$sql = mysqli_query($db, "SELECT * FROM goods_class");
								while ($row = mysqli_fetch_array($sql)) {
									echo "<option value='".$row['class_num']."'"; echo $row["class_num"]==$goods_row['class_num']?'selected':''; echo">".$row['class_name']." </option>";
								}
								echo'
							</select>					
						</td>';
						echo '<td class="align-middle">
							<textarea class="form-control" rows="5" name="goods_name[]">'.$goods_row['goods_name'].'</textarea>
						</td>';
						echo '<td class="align-middle">
							<textarea class="form-control" rows="5" name="information[]">'.$goods_row['information'].'</textarea>
						</td>';
						echo '<td class="align-middle">
							<textarea class="form-control" rows="5" name="note[]">'.$goods_row['note'].'</textarea>
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="unit[]" value="'.$goods_row['unit'].'">
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="price[]" value="'.$goods_row['price'].'">
						</td>';
						
						echo '<td class="align-middle">
						<img class="img-fluid text-center mb-3" src="images/goods/'.$goods_row['photo'].'" width="50%">
							<!-- <div>'.$goods_row['photo'].'</div> -->
							<input type="hidden" class="form-control" name="photo[]" value="'.$goods_row['photo'].'">
							<input type="file" name="photo2[]"> 
							</td>';
						echo '<td class="align-middle">
							<select class="form-control" name="exist[]">
									<option value="0"'; echo $goods_row["exist"] == "0" ? "selected":"";  echo '>上架</option>
									<option value="1"'; echo $goods_row["exist"] == "1" ? "selected":"";  echo '>停售</option>
							</select>				
						</td>';
						// <button type="submit" class="btn btn-primary" name="submit" value="2">修改</button><br></td>';
						// echo '<button type="submit" class="btn btn-primary mt-3" name="submit" value="3">刪除</button></td>';	
						  $i++;	
					}
					echo '</tr>';
				}
				echo '</tbody> </table>
						<div class="text-left mb-3">*勾選欲刪除的題目</div>
						<div class="text-left mb-3">*修改題目不需勾選</div>
						<div class="text-left">
							<button type="submit" class="btn btn-danger" name="submit" value="1">刪除</button>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-info" name="submit" value="2">完成修改</button>
						</div>
					</form>
				</div>';
				
				if(@$_SESSION['admin']!='Y'){
					echo '<span>　　  * 　<i class="fas fa-shopping-cart mt-1 text-info"></i>　綠色未選商品<br>
					　　　　<i class="fas fa-cart-arrow-down mt-1 text-secondary"></i>　灰色為已放入購物車商品</span>';	
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
						$sql = "UPDATE `goods` SET `item_num`='$item_num[$value2]',`class_num`='$class_num[$value2]',`goods_name`='$goods_name[$value2]',`information`='$information[$value2]',`note`='$note[$value2]',`unit`='$unit[$value2]',`price`='$price[$value2]',`photo`='$nphoto',`exist`='$exist[$value2]' WHERE goods_num = '$goods_num[$value2]'";
						if (mysqli_query($db, $sql)) {
							echo "<script type='text/javascript'>";
							echo 'alert("更新成功！");';
							echo "window.location.href='商品編輯'";
							echo "</script>"; 
						} else {
					echo '<div class="alert alert-danger alert-dismissible" id="myAlert">
							<button type="button" class="close">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>更新失敗！</strong> 
						  </div>';
						}
					}
				}			
				mysqli_close($db);
			?>
			
	</div>
<!--	<?php include_once ("footer0.php"); ?>	 -->
</body>
</html>