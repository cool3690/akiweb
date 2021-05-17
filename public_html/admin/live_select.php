<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>	
	<script src="https://unpkg.com/@daily-co/daily-js"></script>
</head>
<body>
	<?php include_once ("navbar_backstage.php"); ?>
	
	<div class="container" style="padding-bottom:155px;">
			<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">查詢上課時數</span></h3>
			<?php
				require '../db_login.php';			
				//設定分頁
				$sql = "
					SELECT * , b.name, c.name
					FROM online_time a 
					left join user b on a.account=b.account 
					left join administrator c on a.account=c.account 
					order by id DESC
				";

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
				// $result = mysqli_query($db, "SELECT * FROM online_time order by id DESC");
				$result2 = mysqli_query($db, "SELECT * FROM online_time order by id DESC");
				echo "
					<table class='table table-bordered text-center max'>
						<tr class='table-info'>
							<th width='7%'>編號</th>
							<th>帳號</th>
							<th>姓名</th>
							<th>身分</th>
							<th>日期</th>
							<th>登入時間</th>
							<th>累計時間（時:分）</th>
						</tr>";
					while ($row = mysqli_fetch_array($result)) {
						$account=$row[4];
						$user_sql = mysqli_query($db, "SELECT * FROM user where account = '$account'");
						if (mysqli_num_rows($user_sql) > 0) {						
							$check=2;
						}else{				
							$check=1;
						}
						// echo $row['$id'];
						$sdate=$row['sdate'];
						$date=substr($sdate,0,4).'/'.substr($sdate,4,2).'/'.substr($sdate,6,2);
						$sumtime= intval($row['sumtime']/60).':'.intval($row['sumtime']%60);
						echo "<tbody>
							<tr>
							<td class='text-center align-middle'> ".$i."</td>
						";
						if($check==2){
							echo"
								<td class='text-center align-middle'>".$account."</p></td>
								<td class='text-center align-middle' style='line-height:30px;'> ".$row[19]."</td>
								<td class='text-center align-middle' style='line-height:30px;'>學員</td>
							";
						}else{
							echo"
								<td class='text-center align-middle'>".$account."</p></td>
								<td class='text-center align-middle' style='line-height:30px;'> ".$row[20]."</td>
								<td class='text-center align-middle' style='line-height:30px;'>管理者</td>
							";
						}
						echo"
							<td class='text-center align-middle' style='line-height:30px;'> ".$date."</td>
							<td class='text-center align-middle' style='line-height:30px;'> ".$row['stime']."</td>
							<td class='text-center align-middle' style='line-height:30px;'> ".$sumtime."</td>";
						$i++;
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
	<?php include_once ("../footer0.php"); ?>
</body>
</html>