<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>		
</head>
<body>
	<?php include_once ("navbar_backstage.php"); ?>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	<div class="container mt-3">	
		<?php 
				require '../db_login.php';
				
				//設定分頁------------------------------------------------------------------------------
				$sql = "SELECT * FROM administrator";
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
			
				$admin_sql = mysqli_query($db, $sql.' LIMIT '.$start_page.', '.$per_num);
				// echo  $sql.' LIMIT '.$start_page.', '.$per_num;
				$i=($page-1)*10+1;
				//------------------------------------------------------------------------------
				
			if(isset($_POST['submit'])){
				// $admin_sql = mysqli_query($db, "SELECT * FROM administrator");	
				while ($admin_row = mysqli_fetch_array($admin_sql)) {	
					$itema='itema'.$admin_row['admin_id'];
					$itemb='itemb'.$admin_row['admin_id'];
					$itemc='itemc'.$admin_row['admin_id'];
					$remark='remark'.$admin_row['admin_id'];
					$name='name'.$admin_row['admin_id'];
					$item_array = array();
					$check='';
					
					@$$itema = $_POST [$itema];
					@$$itemb = $_POST [$itemb];
					@$$itemc = $_POST [$itemc];
					@$$remark = $_POST [$remark];
					@$$name = $_POST [$name];
					// echo $$remark;
					if(@$$itema!=null){
						array_push($item_array, $$itema);
					}
					if(@$$itemb!=null){
						array_push($item_array, $$itemb);
					}
					if(@$$itemc!=null){
						array_push($item_array, $$itemc);
					}
					$remark=$$remark;
					$name=$$name;
					$array_count=count($item_array);
					@$authorize=$item_array[0];
					$account=$admin_row["account"];
					if($authorize=="1" && $array_count==3){
						$check="T";
					}else if($authorize=='2' && $array_count==1){
						$check="T";
					}else if($authorize=="3" && $array_count==1){
						$check="T";
					}else if($array_count==0){
						$check="E"; //未勾選錯誤
					}else{
						$check="F"; //錯誤
					}
					if($check=="T"){
						$sql = "UPDATE `administrator` SET `name`='$name', `authorize`='$authorize', remark='$remark' WHERE account = '$account'";
						// echo $sql.'---------------<br>';
						mysqli_query($db, $sql);
						// echo '  
							// <div class="alert alert-info alert-dismissible mt-5">
								// <button type="button" class="close" data-dismiss="alert">&times;</button>
								// <i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>正確！</strong> 
							 // </div>
						// ';
					}else if($check=="F"){
						echo '
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>更新失敗！權限設定錯誤</strong> 
							</div>
						 ';
					}else{
						echo '
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>請正確勾選！</strong> 
							</div>
						 ';
					}
				}
					echo "<script type='text/javascript'>";
					echo 'alert("更新成功！");';
					echo "window.location.href='權限管理'";
					echo "</script>"; 
			}

		if(@$_SESSION['admin']=="Y"){
			echo '
			<h3 class="text-center mt-5">權限管理</h3>
				<form method="post" action="權限管理">
					<table class="table text-center mt-3">
						<thead class="thead-dark">
						<tr>
							<th width="10%">編號</th>
							<th width="15%">帳號</th>
							<th width="15%">姓名</th>
							<th width="10%">補習班</th>
							<th width="10%">題庫</th>
							<th width="10%">商品</th>
							<th width="30%">備註</th>
						</tr>
						</thead>
						<tbody>
				';
						require '../db_login.php';
						$arr1=array("1");
						$arr2=array("1","2");
						$arr3=array("1","3");
						$j=0;

						// $admin_sql = mysqli_query($db, "SELECT * FROM administrator");	
						
						while ($admin_row = mysqli_fetch_array($admin_sql)) {	
							$a=$admin_row['authorize'];
							// echo $a;
							foreach ($arr1 as $key => $value) {
								if($a==$value){
									$check1="T";
									break;
								}else{
									$check1="F";
								}
							}
							foreach ($arr2 as $key => $value) {
								if($a==$value){
									$check2="T";
									break;
								}else{
									$check2="F";
								}
							}
							foreach ($arr3 as $key => $value) {
								if($a==$value){
									$check3="T";
									break;
								}else{
									$check3="F";
								}
							}
							echo '
							  <tr>
								<td>
									'.$admin_row['admin_id'].'
								</td>
								<td>
									'.$admin_row['account'].'
								</td>
								<td>
									<input type="text" class="form-control" name="name'.$admin_row['admin_id'].'" value="'.$admin_row['name'].'">
								</td>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="Checka'.$admin_row['admin_id'].'" name="itema'.$admin_row['admin_id'].'" value="1"';  echo $check1 == "T" ? 'checked' : '' ; echo '>
										<label class="custom-control-label" for="Checka'.$admin_row['admin_id'].'"></label>
									</div>	
								</td>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="Checkb'.$admin_row['admin_id'].'" name="itemb'.$admin_row['admin_id'].'" value="2"';  echo $check2 == "T" ? 'checked' : '' ; echo '>
										<label class="custom-control-label" for="Checkb'.$admin_row['admin_id'].'"></label>
									</div>	
								</td>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="Checkc'.$admin_row['admin_id'].'" name="itemc'.$admin_row['admin_id'].'" value="3"';  echo $check3 == "T" ? 'checked' : '' ; echo '>
										<label class="custom-control-label" for="Checkc'.$admin_row['admin_id'].'"></label>
									</div>	
								</td>
								<td>
									<input type="text" class="form-control" name="remark'.$admin_row['admin_id'].'" value="'.$admin_row['remark'].'">
								</td>
							  </tr>';
							$j++;
						}	
				echo '
						</tbody>
					</table>	
					<div class="text-center mt-5"><button type="submit" class="btn btn-primary" name="submit">完成修改</button></div>
				</form>
			</div>';
			
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
			
		}else{
			echo '<script language="javascript">';
			echo 'alert("尚未有權限，請進行登入！");';
			echo "window.location.href='登入會員'";
			echo '</script>';	
		}
		include_once ("../footer0.php");
	?>
</body>
</html>
