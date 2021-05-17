<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>		
	<meta http-equiv="refresh" content="300" />		
</head>
<body>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
		}
		@media (min-width: 0px) and (max-width: 1000px) { 
			.container{
				height:200px;
			}
		}
		@media (min-width: 1000px) and (max-width: 1600px) { 
			.container{
				height:372px;
			}
		}
		@media (min-width: 1600px) and (max-width: 2000px) { 
			.container{
				height:586px;
			}
		}
	</style>
	
	<?php 
	
		if(@$_SESSION['account']!=null){
			if(@$_SESSION['admin']=="Y"){
				include_once ("admin/navbar_backstage.php");
			}else{
				include_once ("navbar_cramy.php"); 
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("尚未有權限，請進行登入！");';
			echo "window.location.href='登入會員'";
			echo '</script>';	
		}
	?>	
	
	<div class="container">
		<div class="row mt-5 mb-5">	
			<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4"></div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4">
				<h3 class=" d-flex justify-content-center"><span class="backstage_title">作業列表</span></h3>
			</div>
		</div>
		<?php
			require 'db_login.php';		

			$result = mysqli_query($db, "SELECT * FROM homework where exist='0' order by hw_id ASC");
			$j=1;
			
			echo "
				<table class='table table-bordered text-center'>
					<tr class='table-info'>
						<th width='20%'>日期</th>
						<th width='50%'>作業名稱</th>
						<th width='30%'>下載作業</th>
					</tr>";
				while ($row = mysqli_fetch_array($result)) {
					$id=$row['hw_id'];
					$date=$row['sdate'];
					$file=$row['file'];
					$file_name=str_replace(".","",substr($file,0,-4));
					ini_set('date.timezone','Asia/Taipei');		
					$time=time();		
					// $now=date("Y/m/d H:i:s", $time);	
					// $date2="2020/05/09";
					// $time=strtotime( date('Y/m/d H:i:s',strtotime($date2)));
					// echo $time.'<br>';
					// echo $date.'<br>';
					// $etime = date('Y/m/d H:i:s',strtotime($date. "+7 days"));
					$stime=strtotime($date);
					$etime = strtotime( date('Y/m/d H:i:s',strtotime($date. "+7 days")));
/* 					 echo $date.'<br>';
					 echo date('Y/m/d H:i:s',strtotime($date. "+7 days")).'<br>';
					 echo $stime.'<br>';
					 echo strtotime($date. "+7 days").'<br>';
					 */
					if ($time > $etime){
						// echo "T<br>";
						$sql = "UPDATE `homework` SET `exist`='1' WHERE hw_id = '$id'";
						mysqli_query($db, $sql);
						echo "<script type='text/javascript'>";
						echo "window.location.href='作業列表'";
						echo "</script>"; 
					}
					if ($time > $stime){
					echo "
						<tbody id='searchTable'>
						<tr>
						<td class='text-center align-middle'>
							".$row['sdate']."
						</td>
						<td class='text-center align-middle'> 
							".$row['title']."
						</td>
						<td>
							<a href='images/hw/$file' target='_blank'>$file_name</a>
						</td>";
					}
				}
				echo "</tbody>
				</table>";		
			mysqli_close($db);	
		?>
	</div>
	<?php include_once ("footer0.php"); ?>
</body>
</html>