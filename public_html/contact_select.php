<!DOCTYPE html>
<html lang="en">
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
	
	<div class="container" style="padding-bottom:100px;">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">查詢問題單</span></h3>
			<?php
				require 'db_login.php';			
				//設定分頁
				$sql = "SELECT * FROM suggest order by contact_id DESC";
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
			
				$result = mysqli_query($db, $sql.' LIMIT '.$start_page.', '.$per_num);
				// echo  $sql.' LIMIT '.$start_page.', '.$per_num;
				$i=($page-1)*10+1;
				$j=1;
				// $account = $_SESSION['username'];
				// $result = mysqli_query($db, "SELECT * FROM suggest order by contact_id DESC");
				$result2 = mysqli_query($db, "SELECT * FROM suggest order by contact_id DESC");
				
				echo "
					<table class='table table-bordered text-center max'>
						<tr class='table-info'>
							<th width='7%'>編號</th>
							<th>日期/時間/姓名/電話/E-mail</th>
							<th>標題/建議</th>
						</tr>";
					while ($row = mysqli_fetch_array($result)) {
						// echo $row['$contact_id'];
						echo "<tbody>
							<tr>
							<td class='text-center align-middle'> ".$i."</td>
							<td class='text-center align-middle' style='line-height:30px;'> ".$row['today_date']."<br> ".$row['today_time']."<br>".$row['name']."<br>".$row['phone'].'<br>'.$row['email']."</td>
							<td><p style='font-weight:bold;'>".$row['title']."</p><p class='text-left'>".$row['suggest']."</p></td>";
						$i++;
					}
					echo "</tbody>
					</table>";

				
				echo "
					<table class='table text-center min'>
						<tr class='table-info'>
							<th width='7%'>編號</th>
						</tr>
						<tr class='table-info'>
							<th>日期/時間/姓名/電話/E-mail</th>
						</tr>
						<tr class='table-info'>
							<th>標題/建議</th>
						</tr>";
					while ($row = mysqli_fetch_array($result2)) {
						echo "<tbody>
							<tr class='table-success'>
								<td class='text-center align-middle'> ".$j."</td>
							</tr>
							<tr>
								<td class='text-center align-middle' style='line-height:30px;'> ".$row['today_date']."<br> ".$row['today_time']."<br>".$row['name']."<br>".$row['phone'].'<br>'.$row['email']."</td>
							</tr>
							<tr>
								<td><p style='font-weight:bold;'>".$row['title']."</p><p class='text-left'>".$row['suggest']."</p></td>
							</tr>";
						$j++;
					}
					echo "</tbody>
					</table>";
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
	<?php include_once ("footer0.php"); ?>
</body>
</html>