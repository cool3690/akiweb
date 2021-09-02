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
	<style>
		body {
			background-image: url("images/bg02.jpg");
			background-repeat: repeat;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	<?php include_once ("navbar_course.php"); ?>	

	<?php
		require 'db_login.php';
		$course_sql3 = mysqli_query($db, "SELECT * FROM course");
			while ($course_row = mysqli_fetch_array($course_sql3)) {
				$num=$course_row['course_num'];
				echo '

				  <!-- The Modal -->
				 <div class="modal fade" id="myModal'.$num.'">
					<div class="modal-dialog">
						<div class="modal-content">
					  
						<!-- Modal Header -->
							<div class="">
								<button type="button" class="close" data-dismiss="modal">×</button>
							</div>
						
							<!-- Modal body -->
							<div class="modal-body">';
								echo'  <table class="table">
										<tbody>
											 <tr>
												<td class="table-success" width="30%">課程名稱</td>
												<td width="70%">'.$course_row['name'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">禮拜</td>
												<td>'.$course_row['week'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">開始時間</td>
												<td>'.$course_row['stime'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">開始日期</td>
												<td>'.$course_row['sdate'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">課程數量</td>
												<td>'.$course_row['course_amount'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">內容</td>
												<td>'.$course_row['content'].'</td>
											 </tr>
											 <tr>
												<td class="table-success">價錢</td>
												<td>'.$course_row['price'].'</td>
											 </tr>
										</tbody>
									</table>';	


			
							if(@$_SESSION['account']!=null){	
								echo '<form method="POST" action="課程列表" enctype="multipart/form-data"><input type="hidden" name="course_num" value="'.$course_row['course_num'].'">';
								echo '<input type="hidden" name="notre" value="1">';
						
								$course_num = $course_row['course_num'];
								$account = $_SESSION['account'];
								$cart_sql = mysqli_query($db, "SELECT * FROM cart where account = '$account' and course_num = '$course_num'");
								if (mysqli_num_rows($cart_sql) == 0) {							
									echo '<div class="text-right"><button type="submit" class="btn btn-outline-info mt-3 mr-3" name="submit" value="1"><i class="fas fa-shopping-cart fa-2x"></i></button></div>';
								}else{						
									echo '<div class="text-right"><a href="#" class="btn btn-outline-dark disabled mt-3 mr-3" name="submit"><i class="fas fa-cart-arrow-down fa-2x"></i></a></div>';
									
								}								
								echo'</form>';
							}				
							echo'</div>
						<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						
						</div>
					</div>
				</div>';
			}
		echo '<script>
			$(document).ready(function(){';
				$course_sql3 = mysqli_query($db, "SELECT * FROM course");
				while ($row = mysqli_fetch_array($course_sql3)) {
					$num=$row['course_num'];
					echo '			
					$("#myBtn'.$num.'").click(function(){
						$("#myModal'.$num.'").modal();
					});';
			}
		echo'});
		</script>';
	?>
	<?php
		require 'db_login.php';
		error_reporting(0);
		echo '<h3 class="text-center mt-5 mb-5">課程列表</h3>';
		echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2" id="coures_select">';
		echo '<div class="alert alert-info alert-dismissible fade show coures_select_alert">
		<button type="button" class="close" data-dismiss="alert">已閱讀</button>
		<strong>上課須知：</strong> <br>
			一、若課程固定上課人數已額滿，將無法開放選修同學選課。<br>
			二、報名後確定開班將會連絡各學員。<br>
			三、請於開課前至補習班繳費領取教科書。<br>
			四、老師會親自幫學員補課但請假補課二次為限，時間半個小時-1小時。<br>
			五，學員可選擇大家的日本語教科書自行購買或於補習班購買。<br>
			<p style=" margin-left : 36px; text-indent : -36px">六、退費標準依台南市政府公告為準。<br>
			(根據新修訂的自治條例，退費比例為：實際開課前退還全額開課後於全期或總課程時數1/3內退還60％；開課後於全期或總課程時數1/2內退還40％超過1/2則無法退費)	</p>
			七，補習班保有課程訂單修改及費用變更之權利。
			<br>
					
		</div>';
		if (isset($_POST['submit'])) {	
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
			$reserve_name = $_POST['reserve_name'];
			$phone=$_POST['phone'];
			$choose = $_POST['choose'];
			$remark = $_POST['remark'];
			if(@$_SESSION['account']!=""){	
				//課程放入購物車
				if($submit==1){		
					$account = $_SESSION['account'];
					$course_num=$_POST['course_num'];
					$quantity="1";
		
					$cart_sql = mysqli_query($db, "SELECT * FROM cart where account = '$account' and course_num = '$course_num'");	
					date_default_timezone_set('Asia/Taipei');
					$date = date("Y/m/d");				
					$cart_into_sql = "INSERT INTO `cart`(`account`, `sdate`, `course_num`, `quantity`) VALUES ('$account', '$date', '$course_num', '$quantity')";
					if (mysqli_query($db, $cart_into_sql)) {
						
					$course_sql = mysqli_query($db, "SELECT * FROM course where course_num = '$course_num'");	
						while ($course_row = mysqli_fetch_array($course_sql)) {
						  echo '<div class="alert alert-success alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>放入購物車！</strong> <br>
							<div class="row mt-2">
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 mb-2">
								課程名稱：'.$course_row['name'].'<br>
							</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 mb-2">
								禮拜：'.$course_row['week'].'<br>
							</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 mb-2">
								開始時間：'.$course_row['stime'].'<br>
							</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 mb-2">
								開始日期：'.$course_row['sdate'].'<br>
							</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 mb-2">
								課程數量：'.$course_row['course_amount'].'<br>
							</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-2 mb-2">
								內容：'.$course_row['content'].'<br>
							</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 mb-2">
								價錢：'.$course_row['price'].'<br>		
							</div>
							</div></div>';
							}
					} else {
						echo "錯誤訊息: 放入購物車失敗";
					}						
				}
			}
			 if($submit == 2){
				//試聽課程
				ini_set('date.timezone','Asia/Taipei');	
				$date = date("Y/m/d");
				$sql = "INSERT INTO `audit`(`date`, `name`, `phone`, `choose`, `remark`) VALUES ('$date', '$reserve_name', '$phone', '$choose', '$remark')";
				// echo $sql;
				
				if (mysqli_query($db, $sql)) {
				echo '<div class="alert alert-success alert-dismissible" id="myAlert">
						<button type="button" class="close">&times;</button>
						<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>填表成功！將有專人聯繫您，謝謝</strong> 
					  </div>';
				}	
				// $token = "4tlQczhtz99kXiH9GoEfenC7Oci1QNdCTdCLSkcsy3G";//測試
				$token = "uatg8slsz0D2Y7XRGml19RoZkZP8E6B1mowh95pzQHj";//試聽
				$message ="\r\n日期:". $date."\r\n姓名:". $reserve_name."\r\n電話:".$phone."\r\n選擇:".$choose."\r\n備註:".$remark;
				
				$curl = curl_init(); 
				curl_setopt($curl, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt($curl, CURLOPT_POST, 1); 
				curl_setopt($curl, CURLOPT_POSTFIELDS, "message=$message"); 
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.'',); 
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec($curl); 
				curl_close($curl); 								
				
			}else if($submit == 3){
				//請假連絡欄
				$reserve_name = $_POST['reserve_name'];
				$phone=$_POST['phone'];
				$choose = $_POST['choose'];
				$remark = $_POST['remark'];
				ini_set('date.timezone','Asia/Taipei');	
				$date = date("Y/m/d");

				echo '<div class="alert alert-success alert-dismissible" id="myAlert">
						<button type="button" class="close">&times;</button>
						<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>填表成功！已傳遞訊息。</strong> 
					  </div>';
				//$token = "4tlQczhtz99kXiH9GoEfenC7Oci1QNdCTdCLSkcsy3G";//測試
				$token = "xUCaFKe6Dld7lKr4n89hK7nyJBDeCtIuxllFIIULrwr";//請假
				$message ="\r\n日期:". $date."\r\n姓名:". $reserve_name."\r\n電話:".$phone."\r\n事項:".$choose."\r\n備註:".$remark;
				
				$curl = curl_init(); 
				curl_setopt($curl, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt($curl, CURLOPT_POST, 1); 
				curl_setopt($curl, CURLOPT_POSTFIELDS, "message=$message"); 
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.'',); 
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec($curl); 
				curl_close($curl); 						
				
			}else{
				echo '<script language="javascript">';
				echo 'alert("請進行登入！");';
				echo "window.location.href='登入會員'";
				echo '</script>';
			}
			
		}
		echo '</div>';
		
		//課程列表-大尺寸
		echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2 max" id="coures_select_max">';
			echo '<table class="table table-hover text-center">
			<thead>
				<tr class="table-warning">
					<th width="15%">課程名稱</th><th width="6%">禮拜</th><th width="11%">開始時間</th><th width="11%">開始日期</th><th width="9%">課程數量</th><th>內容</th><th width="6%">價錢</th><th width="5%"></th>
				</tr>
			</thead>';		
			$course_sql = mysqli_query($db, "SELECT * FROM course");
			$course_sql2 = mysqli_query($db, "SELECT * FROM course");
			$course_sql3 = mysqli_query($db, "SELECT * FROM course");	
			$course_sql4 = mysqli_query($db, "SELECT * FROM course");
			$sql = mysqli_query($db, "SELECT * FROM course");	
			while ($course_row = mysqli_fetch_array($course_sql)) {
				$content = str_replace( PHP_EOL, '<br />', $course_row['content']);	
				echo '<form method="POST" action="課程列表" enctype="multipart/form-data">';						
				echo '<tbody>
						<tr>';
						echo '<input type="hidden" name="course_num" value="'.$course_row['course_num'].'">';
						echo '<input type="hidden" name="notre" value="1">';	
						echo "<td class='align-middle'><p>".$course_row['name']."</p></td>";
						echo "<td class='align-middle'><p>".$course_row['week']."</p></td>";				
						echo "<td class='align-middle'><p>".$course_row['stime']."</p></td>";	
						echo "<td class='align-middle'><p>".$course_row['sdate']."</p></td>";
						echo "<td class='align-middle'><p>".$course_row['course_amount']."</p></td>";				
						echo "<td class='align-middle'><p>".$content."</p></td>";				
						echo "<td class='align-middle'><p>".$course_row['price']."</p></td>";
					
						$course_num = $course_row['course_num'];
						$cart_sql = mysqli_query($db, "SELECT * FROM cart where account = '$account' and course_num = '$course_num'");
						if (mysqli_num_rows($cart_sql) == 0) {							
							echo '<td class="align-middle"><button type="submit" class="btn btn-outline-info mt-3 mr-3" name="submit" value="1"><i class="fas fa-shopping-cart fa-2x"></i></button></td>';
						}else{						
							echo '<td class="align-middle"><a href="#" class="btn btn-outline-dark disabled mt-3 mr-3" name="submit"><i class="fas fa-cart-arrow-down fa-2x"></i></a></td>';
						}
				echo "</tr>
				</form>";
			}
		
			echo '</tbody> 
			</table>
			<div>　　  * 　<i class="fas fa-shopping-cart mt-1 text-info"></i>　綠色未選商品<br></div>
			<div style="padding-left:63px;"><i class="fas fa-cart-arrow-down mt-1 text-secondary"></i>　灰色為已放入購物車商品</div>
		</div>';		

		//課程列表-手機
		echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2 min" style="font-size:15px;">';
			echo '<table class="table table-hover text-center">
					<thead>
						<tr class="table-success"><th width="23%">課程</th><th width="12%">開始日期</th><th width="9%">數量</th><th width="5%">價錢</th></tr>
					</thead>';			
					while ($course_row = mysqli_fetch_array($course_sql2)) {
					$num=$course_row['course_num'];
					$content = str_replace( PHP_EOL, '<br />', $course_row['content']);	
					echo '<form method="POST" action="課程列表" enctype="multipart/form-data">';						
					echo '<tbody>
						<tr id="myBtn'.$num.'">';
							echo '<input type="hidden" name="course_num" value="'.$course_row['course_num'].'">';
							echo '<input type="hidden" name="notre" value="1">';
							echo '<td class="align-middle"><p>'.$course_row['name'].'</p></td>';
							echo '<td class="align-middle"><p>'.$course_row['sdate'].'</p></td>';
							echo '<td class="align-middle"><p>'.$course_row['course_amount'].'</p></td>';	
							echo '<td class="align-middle"><p>'.$course_row['price'].'</p></td>';						
					echo "</tr>
				</form>";
			}
			echo '</tbody> 
			</table>
			<div>　　  * 　<i class="fas fa-shopping-cart mt-1 text-info"></i>　綠色未選商品<br></div>
			<div style="padding-left:63px;"><i class="fas fa-cart-arrow-down mt-1 text-secondary"></i>　灰色為已放入購物車商品</div>				
		</div>';	

		//試聽課程-大尺寸				
		echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2 mt-5 max" id="course_audition_max">';
			echo '<h4 class="text-center mt-3 mb-3">試聽課程</h4>';
			echo '<table class="table table-hover text-center">
					<thead>
						<tr class="table-warning">
							<th width="20%">姓名</th><th width="20%">電話</th><th width="20%">課程</th><th>備註</th><th width="10%"></th>
						</tr>
					</thead>';
					echo '<form method="POST" action="課程列表" enctype="multipart/form-data">';						
					echo '<tbody>
						<tr id="myBtn'.$num.'">';
						echo '<input type="hidden" name="course_num" value="'.$course_row['course_num'].'">';
						echo '<input type="hidden" name="notre" value="1">';	
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="reserve_name" required>
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="phone" pattern="\d{10}" required>
						</td>';
						echo '<td class="align-middle">
								<select class="form-control" name="choose">';
								while ($course_row = mysqli_fetch_array($course_sql3)) {
									echo '
										<option value="'.$course_row['name'].'">'.$course_row['name'].'</option>
									';
								}							
								
							echo'</select>
							</td>';
							echo '<td class="align-middle">
								<textarea class="form-control" rows="5" name="remark"></textarea>
							</td>';	
							echo '<td class="align-middle">
								<button type="submit" class="btn btn-info" name="submit" value="2">確定</button>
							</td>
				
					</form>
				</tbody> 
			</table>
		</div>';	

		//試聽課程-手機		
		echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2 mt-5 min">';
			echo '<h4 class="text-center mt-3 mb-3">試聽課程</h4>';
			echo '<form method="POST" action="課程列表" enctype="multipart/form-data">';	
				echo '<input type="hidden" name="course_num" value="'.$course_row['course_num'].'">';
				echo '<input type="hidden" name="notre" value="1">';	
				echo '<div class="row">
						<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">
							姓名
						</div>
						<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
							<input type="text" class="form-control" name="reserve_name" required>
						</div>
						<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">
							電話
						</div>
						<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
							<input type="text" class="form-control" name="phone" pattern="\d{10}" required>
						</div>
						<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">
							課程
						</div>
						<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
							<select class="form-control" name="choose">';
								while ($course_row = mysqli_fetch_array($course_sql4)) {
									echo '
										<option value="'.$course_row['name'].'">'.$course_row['name'].'</option>
									';
								}	
							echo'</select>
					</div>
					<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">
						備註
					</div>
					<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
						<textarea class="form-control" rows="5" name="remark"></textarea>
					</div>
					<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">	
					</div>
					<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
							<button type="submit" class="btn btn-info" name="submit" value="2">確定</button>
					</div>	
				</div>	
			</form>
		</div>';	
		
		//請假連絡欄須知
		echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2 coures_select_alert" id="coures_select" style="">';
		echo '<div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert" id="button">已閱讀</button>
		<strong>請假須知</strong> <br>
			團班請假：老師會親自幫學員補課但請假補課二次為限，時間半個小時-1小時。<br>
			個人班請假：課程順延或另外調整時間上課，8堂課程需於三個月內完成。七，補習班保有課程訂單修改及費用變更之權利。
			<br>
					
		</div></div>';	


		//請假連絡欄表單-大尺寸
		echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 max leavet_form" id="leavet_form_max">';
		echo '<h4 class="text-center mt-3 mb-3">請假連絡欄</h4>';
			echo '<table class="table table-hover text-center"><thead>
					<tr class="table-danger">
						<th width="20%">姓名</th><th width="20%">電話</th><th>事項</th><th>備註</th><th width="10%"></th>
					</tr>
				</thead>';
			echo '<form method="POST" action="課程列表" enctype="multipart/form-data">';						
			echo '<tbody>
					<tr id="myBtn'.$num.'">';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="reserve_name" required>
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="phone" pattern="\d{10}" required>
						</td>
						<td class="align-middle">
							<select class="form-control" name="choose">
								<option value="事假">事假</option>
								<option value="病假">病假</option>
								<option value="調課">調課(需填寫備註)</option>
								<option value="其他">其他</option>
							</select></td>
						<td class="align-middle">
							<textarea class="form-control" rows="5" name="remark"></textarea>
						</td>';	
						echo '<td class="align-middle">
							<button type="submit" class="btn btn-info" name="submit" value="3">確定</button>
						</td>
					</tbody> 
				</form>
			</table>
		</div>';	

		//請假連絡欄表單-手機		
		echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2 mt-5 min leavet_form" id="leavet_form_min">';
			echo '<h4 class="text-center mt-3 mb-3">請假連絡欄</h4>';
			echo '<form method="POST" action="課程列表" enctype="multipart/form-data">';	;
				echo '<input type="hidden" name="notre" value="1">';	
				echo '<div class="row">
						<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">
							姓名
						</div>
						<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
							<input type="text" class="form-control" name="reserve_name" required>
						</div>
						<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">
							電話
						</div>
						<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
							<input type="text" class="form-control" name="phone" pattern="\d{10}" required>
						</div>
						<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">
							事項
						</div>
						<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
							<select class="form-control" name="choose">
								<option value="事假">事假</option>
								<option value="病假">病假</option>
								<option value="調課">調課(需填寫備註)</option>
								<option value="其他">其他</option>
							</select></td>
					</div>
					<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">
						備註
					</div>
					<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
						<textarea class="form-control" rows="5" name="remark"></textarea>
					</div>
					<div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-3 mb-2">	
					</div>
					<div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-2 mb-2">
							<button type="submit" class="btn btn-info" name="submit" value="3">確定</button>
					</div>	
				</div>	
			</form>
		</div>';
		
	?>

	<script>
		//點擊請假連絡欄須知已閱讀後，彈出請假連絡欄表單
		$( "#button" ).click(function() {
			var width=$(window).width();
			if (width>600){
				$( "#leavet_form_max" ).show( "slow" );
			}else{
				$( "#leavet_form_min" ).show( "slow" );
			}
		});
	</script>
	<?php include_once ("footer0.php"); ?>	 
</body>
</html>