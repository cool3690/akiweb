<?php
	if (isset($_POST['submit'])) {

		require 'db_login.php';		
		$submit=$_POST['submit'];
		if ($submit==1) {
			$item_name =$_POST["item_name"];
			
			$sql = "INSERT INTO goods_item (`item_name`) VALUES ('$item_name')";

			if (mysqli_query($db, $sql)) {
				echo '<script language="javascript">';
				echo 'alert("新增成功！");';
			//	echo 'window.location.href = "goods.php";';
				echo '</script>';	
			} else {
				echo '<script language="javascript">';
				echo 'alert("新增失敗！請重新操作");';
			//	echo 'window.location.href = "goods.php";';
				echo '</script>';
			}
		}else{
			// Get text
			$item_num = $_POST['item_num'];
			$goods_name = $_POST['goods_name'];
			$unit = $_POST['unit'];
			$price = $_POST['price'];
			$information = $_POST['information'];
			// Get photo name
			$photo = $_FILES['photo']['name'];

			// photo file directory
			$target = "images/goods/".basename($photo);
			$sql = "INSERT INTO goods (item_num , goods_name, information, unit, price, photo, exist) VALUES ('$item_num', '$goods_name', '$information', '$unit', '$price','$photo','0')";
			echo $sql;
			// execute query
			mysqli_query($db, $sql);

			if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
				echo '<script language="javascript">';
				echo 'alert("新增成功！");';
			//	echo 'window.location.href = "goods.php";';
				echo '</script>';				
			}else{
				echo '<script language="javascript">';
				echo 'alert("新增失敗！請重新操作");';
			//	echo 'window.location.href = "goods.php";';
				echo '</script>';
			}
		}
		
		mysqli_close($db);		
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<style type="text/css">
	   form{
		　width: 50%;
		　margin: 20px auto;
	   }
	   form div{
		　margin-top: 5px;
	   }
	   #img_div{
		　width: 50%;
		　padding: 5px;
		　margin: 15px auto;
		　border: 1px solid #cbcbcb;
	   }
	   #img_div:after{
		　content: "";
		　display: block;
		　clear: both;
	   }
	   img{
		　float: left;
		　margin: 5px;
		　width: 300px;
		　height: 140px;
	   }
	</style>
	<div class="container mb-5">
		<?php include_once ("navbar.php"); ?>
	
		<div class="mt-5" id="content">
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
				<h4 class="mb-3 d-flex justify-content-center"><b>新增產品主檔</b></h4>
				<div class="form-group">
					<p>產品名稱</p>
					<input type="text" class="form-control" placeholder="產品名稱" name="item_name" required>
				</div>
				<button type="submit" class="btn btn-primary" name="submit" value="1">送出</button>
			</form>
			<hr class="mt-5 mb-5">
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" enctype="multipart/form-data">
				<h4 class="mb-3 d-flex justify-content-center"><b>新增產品明細檔</b></h4>
				<input type="hidden" name="size" value="1000000">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-3">	
						<div>
							<p>品項編號</p>
							<select class='form-control' name="item_num">
							<?php
								require 'db_login.php';
								$sql = mysqli_query($db, "SELECT * FROM goods_item");
								while ($row = mysqli_fetch_array($sql)) {
									echo "<option value='".$row['item_num']."'>".$row['item_name']." </option>";
								}
								mysqli_close($db);		
							?>	
							</select>			
						</div>
						</div>	
					<div class="col-sm-12 col-md-6 col-lg-3">	
						<div>
							<p>品牌名稱</p>
							<input type="text" class="form-control" name="goods_name" required>
						</div>
						</div>
					<div class="col-sm-12 col-md-6 col-lg-3">	
						<div>
							<p>單位</p>
							<input type="text" class="form-control" name="unit" required>
						</div>
						</div>
					<div class="col-sm-12 col-md-6 col-lg-3">	
						<div>
							<p>單價</p>
							<input type="text" class="form-control" name="price" required>
						</div>
						</div>
					<div class="col-sm-12 col-md-12 col-lg-12">		
						<div>
							<p>商品資訊</p>
							<textarea class="form-control" rows="5" name="information" required></textarea>
						</div>
						</div>
					<div class="col-sm-12 col-md-12 col-lg-12">	
						<div>
							<p>上傳產品照片</p>
							<input type="file" name="photo" required>
						</div>
				  
						</div>
						<div class="mt-3">
							<button type="submit" class="btn btn-primary" name="submit" value="2">送出</button>
						</div>	
				</div>										
			</form>
		</div>
	</div>
	
	<?php include_once ("footer.php"); ?>	
</body>
</html>