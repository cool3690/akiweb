<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
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
	<div class="container mt-3" style="padding-bottom:205px;">	
	
		<?php 
			if(isset($_POST['submit'])){
						require 'db_login.php';
				$admin_sql = mysqli_query($db, "SELECT * FROM administrator");	
				while ($admin_row = mysqli_fetch_array($admin_sql)) {	
					$itema='itema'.$admin_row['admin_id'];
					$itemb='itemb'.$admin_row['admin_id'];
					$itemc='itemc'.$admin_row['admin_id'];
					$item_array = array();
					$check='';
					
					@$$itema = $_POST [$itema];
					@$$itemb = $_POST [$itemb];
					@$$itemc = $_POST [$itemc];
				
					if(@$$itema!=null){
						array_push($item_array, $$itema);
					}
					if(@$$itemb!=null){
						array_push($item_array, $$itemb);
					}
					if(@$$itemc!=null){
						array_push($item_array, $$itemc);
					}
					
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
						$check="E";
					}else{
						$check="F";
					}
					if($check=="T"){
						$sql = "UPDATE `administrator` SET `authorize`='$authorize' WHERE account = '$account'";
						// echo $sql.'---------------<br>';
						mysqli_query($db, $sql);
					}else if($check=="F"){
						echo '更新失敗<br>';
						echo '權限設定錯誤<br>';
					}else{
						echo '請正確勾選<br>';
					}
				}
			}

		if(@$_SESSION['admin']=="Y"){
			echo '
			<h3 class="text-center mt-5">權限管理</h3>
				<form method="post" action="權限管理">
					<table class="table text-center mt-3">
						<thead class="thead-dark">
						<tr>
							<th>編號</th>
							<th>帳號</th>
							<th>姓名</th>
							<th>補習班</th>
							<th>課程</th>
							<th>商品</th>
						</tr>
						</thead>
						<tbody>
				';
						require 'db_login.php';
						$arr1=array("1");
						$arr2=array("1","2");
						$arr3=array("1","3");
						$j=0;

						$admin_sql = mysqli_query($db, "SELECT * FROM administrator");	
						
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
								'.$admin_row['name'].'
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
							  </tr>';
							$j++;
						}	
				echo '
						</tbody>
					</table>	
					<div class="text-center mt-5"><button type="submit" class="btn btn-primary" name="submit">完成修改</button></div>
				</form>
			</div>';
			include_once ("footer0.php");
		}else{
			echo '尚未有權限';
		}
	?>
</body>
</html>
