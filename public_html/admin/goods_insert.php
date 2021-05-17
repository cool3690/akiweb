<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>	
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
	<div class="container mb-5">
		<?php
			if (isset($_POST['submit'])) {

				require '../db_login.php';		
				$submit=$_POST['submit'];
				if ($submit==1) {
					$item_name =$_POST["item_name"];
					
					$sql = "INSERT INTO goods_item (`item_name`) VALUES ('$item_name')";

					if (mysqli_query($db, $sql)) {
						echo '<div class="alert alert-info alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>新增成功</strong><br> 
								品項編號：'.$item_name.'
							  </div>';
					} else {
						echo '<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>商品品項新增錯誤！</strong> 
							  </div>';
					}
				}else if ($submit==2) {
					$class_name =$_POST["class_name"];
					
					$sql = "INSERT INTO goods_class (`class_name`) VALUES ('$class_name')";

					if (mysqli_query($db, $sql)) {
						echo '<div class="alert alert-info alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>新增成功</strong><br>
								商品類型：'.$class_name.'
							  </div>';
					} else {
						echo '<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>商品類型新增錯誤！</strong> 
							  </div>';
					}
				}else{
					// Get text
					$account=$_SESSION['account'];
					$item_num = $_POST['item_num'];
					$class_num = $_POST['class_num'];
					$goods_name = $_POST['goods_name'];
					$unit = $_POST['unit'];
					$price = $_POST['price'];
					$information = $_POST['information'];
					$note = $_POST['note'];
					// Get photo name
					$photo = $_FILES['photo']['name'];
					$course_sql = mysqli_query($db, "SELECT max(goods_num) FROM goods");
					while ($course_row = mysqli_fetch_array($course_sql)) {
						$max=$course_row[0]; 
					}
					$nmax=$max+1;
					// photo file directory
					$target = "../images/goods/".$nmax."-1.jpg";
					$nphoto = $nmax."-1.jpg";
					$sql = "INSERT INTO goods (item_num, class_num, goods_name, information, note, unit, price, manager, photo, exist) VALUES ('$item_num', '$class_num', '$goods_name', '$information', '$note', '$unit', '$price', '$account', '$nphoto','0')";
					// echo $sql;
					// execute query

					if (mysqli_query($db, $sql)) {
						if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
							echo '<div class="alert alert-info alert-dismissible">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>新增成功</strong><br>
									商品名稱：'.$goods_name.'<br>
									商品資訊：'.$information.'<br>
									注意事項：'.$note.'<br>
										單位：'.$unit.'<br>
										單價：'.$price.'<br>
										圖片：'.$photo.'<br>
								  </div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！請正確上傳所有內容資料</strong> 
								  </div>';
						}
					} else {
						echo '<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
									<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！請正確上傳所有內容資料</strong> 
							  </div>';
					}
				}
				
				mysqli_close($db);		
			}
		?>	
			
	
	
	
  <ul class="nav nav-tabs mt-5" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">新增產品明細檔</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">新增產品主檔</a>
    </li>
<!--    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
    </li>-->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
			<form action="商品登錄" method="POST" enctype="multipart/form-data">
				<h4 class="mb-5 d-flex justify-content-center"><b>新增產品明細檔</b></h4>
				<input type="hidden" name="size" value="1000000">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-2">
						<p class="text-center">品項名稱</p>
						<select class='form-control' name="item_num">
						<?php
							require '../db_login.php';
							$sql = mysqli_query($db, "SELECT * FROM goods_item");
							while ($row = mysqli_fetch_array($sql)) {
								echo "<option value='".$row['item_num']."'>".$row['item_name']." </option>";
							}
							mysqli_close($db);		
						?>	
						</select>	
					</div>	
					<div class="col-sm-12 col-md-6 col-lg-2">
						<p class="text-center">商品類別</p>
						<select class='form-control' name="class_num">
						<?php
							require '../db_login.php';
							$sql = mysqli_query($db, "SELECT * FROM goods_class");
							while ($row = mysqli_fetch_array($sql)) {
								echo "<option value='".$row['class_num']."'>".$row['class_name']." </option>";
							}
							mysqli_close($db);		
						?>	
						</select>	
					</div>	
					<div class="col-sm-12 col-md-6 col-lg-6">	
						<p class="text-center">商品名稱</p>
						<input type="text" class="form-control" name="goods_name" required>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-1">	
						<p class="text-center">單位</p>
						<select class="form-control" name="unit">
						　	<option value="本">本</option>
						　	<option value="個">個</option>
						　	<option value="枚">枚</option>
						　	<option value="着">着</option>
		<!--				　	<option value="包み">包み</option>  -->
						</select>		
					</div>
					<div class="col-sm-12 col-md-6 col-lg-1">	
						<p class="text-center">單價</p>
						<input type="text" class="form-control" name="price" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 mt-5">
						<p>商品資訊</p>
						<textarea class="form-control" rows="8" name="information" required></textarea>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 mt-5">
						<p>注意事項</p>
						<textarea class="form-control" rows="8" name="note" required></textarea>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 mt-4">	
						<p>上傳產品照片</p>
							<input type="file" name="photo" required> 
					</div>	
					<div class="col-sm-12 col-md-12 col-lg-12">	
						<button type="submit" class="btn btn-info mt-3" name="submit" value="3">完成新增</button>
					</div>	
				</div>										
			</form>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
			<form action="商品登錄" method="post" style="padding-top:100px;">
				<h4 class="mb-5 d-flex justify-content-center"><b>新增產品主檔</b></h4>
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-3">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text bg-success text-white">品項名稱</span>
							</div>
							<input type="text" class="form-control" placeholder="" name="item_name" required>
							<div class="input-group-append">
								<button class="btn btn-success" name="submit" value="1">送出</button> 
							</div>
						</div>
					</div>
				</div>
			</form>
			<form action="商品登錄" method="post" style="padding-bottom:174px;">
				<div class="row mt-5">
					<div class="col-sm-12 col-md-6 col-lg-3">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text bg-info text-white">商品類別</span>
							</div>
							<input type="text" class="form-control" placeholder="" name="class_name" required>
							<div class="input-group-append">
								<button class="btn btn-info" name="submit" value="2">送出</button> 
							</div>
						</div>
					</div>
				</div>
			</form>
    </div>
<!--    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div> -->
  </div>	
	</div>	
	<?php include_once ("../footer0.php"); ?>	
</body>
</html>