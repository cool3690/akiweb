<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<div class="container mb-5">	
		<?php include_once ("navbar.php"); ?>
	
		<h4 class="mt-3 mb-5 d-flex justify-content-center"><b>課程列表</b></h4>
		<div class="row">
			<?php
				require 'db_login.php';
				error_reporting(0);
				$course_sql = mysqli_query($db, "SELECT * FROM course where exist='0'");
				$sql = mysqli_query($db, "SELECT * FROM course");
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2">';
					echo '<table class="table table-bordered text-center"><thead><tr><th width="12%">課程名稱</th><th width="6%">禮拜</th><th width="13%">開始時間</th><th width="13%">開始日期</th><th width="9%">課程數量</th><th>內容</th><th width="8%">價錢</th><th width="8%"></th></tr></thead>';			
				while ($course_row = mysqli_fetch_array($course_sql)) {
					$content = str_replace( PHP_EOL, '<br />', $course_row['content']);	
					echo '<form method="POST" action="course_select.php" enctype="multipart/form-data">';						
					echo "<tbody><tr>";
					echo '<input type="hidden" name="course_num" value="'.$course_row['course_num'].'">';
					echo '<input type="hidden" name="notre" value="1">';	
					if(@$_SESSION['admin']=='Y'){
						echo '<td class="align-middle"><input type="text" class="form-control " name="name" value="'.$course_row['name'].'"></td>';
						echo '<td class="align-middle"><input type="text" class="form-control " name="week" value="'.$course_row['week'].'"></td>';
						echo '<td class="align-middle"><input type="text" class="form-control " name="stime" value="'.$course_row['stime'].'"></td>';
						echo '<td class="align-middle"><input type="text" class="form-control " name="sdate" value="'.$course_row['sdate'].'"></td>';
						echo '<td class="align-middle"><input type="text" class="form-control " name="course_amount" value="'.$course_row['course_amount'].'"></td>';
						echo '<td class="align-middle"><textarea class="form-control" rows="5" name="content">'.$course_row['content'].'</textarea></td>';
						echo '<td class="align-middle"><input type="text" class="form-control " name="price" value="'.$course_row['price'].'"></td>';
						echo '<td class="align-middle"><button type="submit" class="btn btn-primary" name="submit" value="2">修改</button>';
						echo '<button type="submit" class="btn btn-primary mt-3" name="submit" value="3">刪除</button></td>';						
					}else{	
						echo "<td class='align-middle'><p>".$course_row['name']."</p></td>";
						echo "<td class='align-middle'><p>".$course_row['week']."</p></td>";				
						echo "<td class='align-middle'><p>".$course_row['stime']."</p></td>";	
						echo "<td class='align-middle'><p>".$course_row['sdate']."</p></td>";
						echo "<td class='align-middle'><p>".$course_row['course_amount']."</p></td>";				
						echo "<td class='align-middle'><p>".$content."</p></td>";				
						echo "<td class='align-middle'><p>".$course_row['price']."</p></td>";
						
						$course_num = $course_row['course_num'];
						$account = $_SESSION['account'];
						$cart_sql = mysqli_query($db, "SELECT * FROM cart where account = '$account' and course_num = '$course_num'");
						if (mysqli_num_rows($cart_sql) == 0) {							
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
						$course_num = $_POST['course_num'];
						$name = $_POST['name'];
						$week = $_POST['week'];
						$stime = $_POST['stime'];
						$sdate=$_POST['sdate'];
						$course_amount = $_POST['course_amount'];
						$content = $_POST['content'];
						$price=$_POST['price'];
						if($submit==1){		
							$account = $_SESSION['account'];
							$course_num=$_POST['course_num'];
							$quantity="1";
				
							$cart_sql = mysqli_query($db, "SELECT * FROM cart where account = '$account' and course_num = '$course_num'");	
							date_default_timezone_set('Asia/Taipei');
							$date = date("Y/m/d");				
							$cart_into_sql = "INSERT INTO `cart`(`account`, `sdate`, `course_num`, `quantity`) VALUES ('$account', '$date', '$course_num', '$quantity')";
							if (mysqli_query($db, $cart_into_sql)) {
								
								echo '<script language="javascript">';
								echo 'alert("放入購物車！");';
								echo "window.location.href='course_select.php'";
								echo '</script>';	
							} else {
								echo "Error: " . $cart_sql . "<br />" . mysqli_error($db);
							}						
						}else if($submit == 2){
								$sql = "UPDATE course SET name='$name', week='$week', stime='$stime', sdate='$sdate', course_amount='$course_amount', content='$content', price='$price' where course_num = '$course_num'";
								echo "UPDATE course SET name='$name', week='$week', stime='$stime', sdate='$sdate', course_amount='$course_amount', content='$content', price='$price' where course_num = '$course_num'";
								if (mysqli_query($db, $sql)) {
									echo '<script language="javascript">';
									echo 'alert("更新成功！");';
									echo "window.location.href='course_select.php'";
									echo "</script>"; 
								}	
						}else{
							$sql = "DELETE FROM course WHERE course_num = '$course_num'";
							echo "DELETE FROM course WHERE course_num = '$course_num'";
							if (mysqli_query($db, $sql)) {
								echo '<script language="javascript">';
								echo 'alert("刪除成功！");';
								echo "window.location.href='course_select.php'";
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
<!--	<?php include_once ("footer.php"); ?>	 -->
</body>
</html>