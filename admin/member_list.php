<!DOCTYPE html>
<html>
<head>
	<?php include_once ("../head.php"); ?>	
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

	<?php include_once ("navbar_backstage.php"); ?>	
		
	<div class="container" style="padding-bottom:53px;">
		<div class="mt-5">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">會員列表</span></h3>
			<?php	 
				
				$account = $_SESSION['account'];
				require '../db_login.php';			
				//設定分頁------------------------------------------------------------------------------
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
				//------------------------------------------------------------------------------

				$j=1;		
				$num=0;	
				$snum=0;
				if(@$_SESSION['authorize']==1){

					// $member_sql = mysqli_query($db, "SELECT * FROM user");
					$member_sql2 = mysqli_query($db, "SELECT * FROM user");
					echo "
						<form method='post' action='會員列表' class='max'>	
							<table class='table table-bordered text-center' id='member_modify'>
								<thead>
									<tr class='bg-info text-white'>
										<th>編號</th>
										<th>帳號</th>
										<th>姓名</th>
										<th>E-mail</th>
									</tr>
								</thead>
								<tbody>";
								while ($row = mysqli_fetch_array($member_sql)) {
									echo '<tr><td>'.$i.'</td>
											  <td class="text-left">'.$row['account'].'</td>
											  <td><input type="text" class="form-control" name="name[]" value="'.$row['name'].'"></td>
											  <td><input type="text" class="form-control" name="email[]" value="'.$row['email'].'"></td>										  
										  </tr>
										  <input type="hidden" name="checknum[]" value='.$num.'>
										  <input type="hidden" class="form-control" name="account[]" value="'.$row['account'].'">
										  <input type="hidden" class="form-control" name="passwd" value="">
										  <input type="hidden" class="form-control" name="passwdn1" value="">
										  <input type="hidden" class="form-control" name="passwdn2" value="">
									';
									$i++;
									$num++;
								}
							echo '
								</tbody>
							</table>
						<div class="text-center mt-5"><button type="submit" class="btn btn-primary" name="submit" value="1">完成修改</button></div>
						</form>
					';	
					echo "
						<form method='post' action='會員列表' class='min'>	
							<table class='table table-bordered text-center' id='member_modify'>
								<thead>
									<tr class='bg-info text-white'>
										<th rowspan='2'>編號</th>
										<th>帳號</th>
										<th>姓名</th>
									</tr>
									<tr class='bg-info text-white'>
										<th colspan='2'>E-mail</th>
									</tr>
								</thead>
								<tbody>";
								while ($row = mysqli_fetch_array($member_sql2)) {
									echo '<tr>
											<td rowspan="2" class="align-middle">'.$j.'</td>
											<td class="text-left align-middle">'.$row['account'].'</td>
											<td><input type="text" class="form-control" name="name[]" value="'.$row['name'].'"></td>
										  </tr>
										  <tr>
											<td colspan="2"><input type="text" class="form-control" name="email[]" value="'.$row['email'].'"></td>										  
										  </tr>
										  <input type="hidden" name="checknum[]" value='.$snum.'>
										  <input type="hidden" class="form-control" name="account[]" value="'.$row['account'].'">
										  <input type="hidden" class="form-control" name="passwd" value="">
										  <input type="hidden" class="form-control" name="passwdn1" value="">
										  <input type="hidden" class="form-control" name="passwdn2" value="">
									';
									$j++;
									$snum++;
								}
							echo '
								</tbody>
							</table>
						<div class="text-center mt-5"><button type="submit" class="btn btn-primary" name="submit" value="1">完成修改</button></div>
						</form>
					';	
						
				}
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
	
	<?php include_once ("../footer0.php"); ?>	
</body>
</html>

<?php		
	if (isset($_POST['submit'])) {
		require '../db_login.php';
		$submit=$_POST['submit'];
		$passwdo1=$_POST['passwd'];
		$passwdn1=$_POST['passwdn1'];	
		$passwdn2=$_POST['passwdn2'];
		$name=$_POST['name'];	
		$email=$_POST['email'];	
		$account=$_SESSION['account'];	
		// print_r($name);
		if($submit==1){
			$checknum=$_POST['checknum'];	
			$account=$_POST['account'];	
			foreach($checknum as $value2){	
			
				$sql = "UPDATE `user` SET `email`='$email[$value2]',`name`='$name[$value2]' WHERE account = '$account[$value2]'";
				echo $sql;
				mysqli_query($db, $sql);
			}	
					echo "<script type='text/javascript'>";
					echo 'alert("更新成功！");';
					echo "window.location.href='會員列表'";
					echo "</script>"; 
		}
		mysqli_close($db);
	}
?>