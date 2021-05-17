<!DOCTYPE html>
<html>
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
		$(function() {
			$('#button').click(function() {
				if ($('#member_modify tr:nth-child(3)').is(':visible') != true) {
					$('#member_modify tr:nth-child(3)').show();
					$('#member_modify tr:nth-child(4)').show();  
					$('#member_modify tr:nth-child(5)').show();          
					$(this).text('取消修改');
				} else {
					$('#member_modify tr:nth-child(3)').hide();
					$('#member_modify tr:nth-child(4)').hide();
					$('#member_modify tr:nth-child(5)').hide();
					$(this).text('修改密碼');
				}
			});
		});	
	</script>

	<?php include_once ("navbar_cramy.php"); ?>	
		
	<div class="container" style="padding-bottom:53px;">
		<div class="mt-5">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">會員資料</span></h3>
			<?php	 
				
				$account = $_SESSION['account'];
				require 'db_login.php';			
				//設定分頁
				$sql = "SELECT * FROM user";
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
			
				$member_sql = mysqli_query($db, $sql.' LIMIT '.$start_page.', '.$per_num);
				// echo  $sql.' LIMIT '.$start_page.', '.$per_num;
				$i=($page-1)*10+1;

				$j=1;		
				$num=0;	
				$snum=0;
					if(@$_SESSION['admin']=="Y"){	
						$member_sql = mysqli_query($db, "SELECT * FROM administrator where account = '$account'");
					}else{
						$member_sql = mysqli_query($db, "SELECT * FROM user where account = '$account'");	
					}
					// echo "SELECT * FROM administrator where account = '$account'";
					echo '<form method="post" name="form1" id="form1" action="member_select.php">';	
					echo "<table class='table table-bordered text-center' id='member_modify'><tbody>";
					while ($row = mysqli_fetch_array($member_sql)) {
						echo '<tr><td>帳號</td><td class="text-left">'.$account.'</td></tr>
							  <tr><td>密碼</td><td class="text-left"><button type="button" class="btn btn-outline-info" id="button">修改密碼</button></td></tr>
							  <tr style="display:none;"><td>原密碼</td><td><input type="password" class="form-control" name="passwd" value=""></td></tr>
							  <tr style="display:none;"><td>新密碼</td><td><input type="password" class="form-control" name="passwdn1" value=""></td></tr>
							  <tr style="display:none;"><td>再次輸入<br />新密碼</td><td><input type="password" class="form-control" name="passwdn2" value=""></td></tr>';
						echo '<tr><td>姓名</td><td><input type="text" class="form-control" name="name" value="'.$row['name'].'"></td></tr>';
						echo '<tr><td>E-mail</td><td><input type="text" class="form-control" name="email" value="'.$row['email'].'"></td></tr>';
													  
						echo '<input type="hidden" name="notre" value="1">';
					}
					
					echo "</tbody></table>";
					echo '<div class="text-center mt-5"><button type="submit" class="btn btn-primary" name="submit" value="2">完成修改</button></div>
				</form>';
				
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
				mysqli_close($db);
			?>
		</div>
	</div>
	
	<?php include_once ("footer0.php"); ?>	
</body>
</html>

<?php		
	if (isset($_POST['submit'])) {
		require 'db_login.php';
		$submit=$_POST['submit'];
		$passwdo1=$_POST['passwd'];
		$passwdn1=$_POST['passwdn1'];
		$passwdn2=$_POST['passwdn2'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$account=$_SESSION['account'];	
		// print_r($name);
		if($submit==2){			
			if($passwdo1==''){
				if(@$_SESSION['admin']=="Y"){
					$sql = mysqli_query($db, "SELECT * FROM administrator where account = '$account'");echo "SELECT * FROM administrator where account = '$account'";
				}else{
					$sql = mysqli_query($db, "SELECT * FROM user where account = '$account'");
				}
				while ($row = mysqli_fetch_array($sql)) {
					if($email==$row['email'] && $name==$row['name']){
						echo '1----------------------';
						echo "<script type='text/javascript'>";
						echo 'alert("未有資料變更！");';
						echo "window.location.href='member_select.php'";
						echo "</script>"; 
					}else{
						if(@$_SESSION['admin']=="Y"){
								$sql2 = "UPDATE administrator SET email='$email',name='$name' WHERE account='$account'"; 
						}else{
								$sql2 = "UPDATE user SET email='$email',name='$name' WHERE account='$account'"; 
						}
						if (mysqli_query($db, $sql2)) {
								// echo "更新成功";
						echo '2----------------------';
							echo "<script type='text/javascript'>";
							echo 'alert("資料更新成功！");';
							echo "window.location.href='member_select.php'";
							echo "</script>"; 
						} else {
							echo 'alert("資料更新失敗，請重新嘗試！");';
						}						
					}
				}
			}else{
				include("vendor/MCrypt.php");	
						$passwd_encrypted=$passwdn1;	
						$passwd_encryptedo=$passwdo1;	
						$mcrypt = new MCrypt();
						$passwd = $mcrypt->encrypt($passwd_encrypted);
						$passwdo = $mcrypt->encrypt($passwd_encryptedo);
				if(@$_SESSION['admin']=="Y"){
					$sql = mysqli_query($db, "SELECT * FROM administrator where account = '$account' and passwd = '$passwdo'");
					$sql2 = "UPDATE administrator SET passwd='$passwd',name='$name', email='$email' WHERE account='$account'"; 
				}else{
					$sql = mysqli_query($db, "SELECT * FROM user where account = '$account' and passwd = '$passwdo'");
					$sql2 = "UPDATE user SET passwd='$passwd',name='$name', email='$email' WHERE account='$account'"; 
				}
				// echo "SELECT * FROM administrator where account = '$account' and passwd = '$passwdo1'";
				if (mysqli_num_rows($sql) > 0) {	
					if($passwdn1 == $passwdn2 && $passwdn1!=''){					
						if (mysqli_query($db, $sql2)) {
							echo '3----------------------';
							// echo "更新成功";
							echo "<script type='text/javascript'>";
							echo 'alert("資料更新成功！");';
							echo "window.location.href='member_select.php'";
							echo "</script>"; 
						} else {
							echo 'alert("資料更新失敗，請重新嘗試！");';
						}				
				
					}else{
						
						echo "<script type='text/javascript'>";
						echo 'alert("新密碼兩次輸入錯誤！");';
						// echo "window.location.href='member_select.php'";
						echo "</script>"; 	
					}				
				} else {
						echo '4----------------------';
						echo "<script type='text/javascript'>";
						echo 'alert("原密碼輸入錯誤！");';
						echo "window.location.href='member_select.php'";
						echo "</script>"; 		
				}		
			}
		}
		mysqli_close($db);
	}
?>