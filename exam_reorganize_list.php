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
		}
	</style>
	<script type="text/javascript">
		//input全選
		$(function(){
			$('.checkall').on('click', function() {
				$('.child').prop('checked', this.checked)
			});
		});
		
		$(document).ready(function(){
			$("#searchInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#search tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
	<?php include_once ("navbar_backstage.php"); ?>	
	<div class="container" style="padding-bottom:8%;">
		<?php
			require 'db_login.php';			
			//設定分頁
			$sql = "SELECT * FROM bun order by id ASC";
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
		
			$bun_sql = mysqli_query($db, $sql.' LIMIT '.$start_page.', '.$per_num);
			$i=($page-1)*10+1;
			$j=0;
			$num=0;
			
			error_reporting(0);
			echo '		
				<div class="row mt-3 mb-3">	
					<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4"></div>
					<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4">
						<h3 class="mb-5 d-flex justify-content-center"><span class="backstage_title">題目資料</span></h3>
					</div>
					<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4">
						搜尋題目：<input class="form-control" id="searchInput" type="text" placeholder="Search..">
					</div>
				</div>
			';		
			// $bun_sql = mysqli_query($db, "SELECT * FROM bun");
			$bun_sql2 = mysqli_query($db, "SELECT * FROM bun");
			echo '<div class="max">
					<form method="POST" action="重組編輯">
						<table class="table text-center">
							<thead>
								<tr class="table-success">
									<th><input type="checkbox"  class="checkall"/></th>
									<th width="8%">編號</th>
									<th width="10%">課程</th>
									<th width="40%">題目 / 重組內容</th>
									<th width="40%">正確答案（日文） / 正確答案（中文）</th>
								</tr>
							</thead>';	
											
						while ($bun_row = mysqli_fetch_array($bun_sql)) {
							$content = str_replace( PHP_EOL, '<br />', $bun_row['content']);					
							echo '<tbody id="search">
									<tr>
										<input type="hidden" name="id[]" value="'.$bun_row['id'].'">
										<input type="hidden" name="id2" value="'.$bun_row['id'].'">
										<input type="hidden" name="notre" value="1">	
										<input type="hidden" name="buy[]" value='.$num.'>';
										if(@$_SESSION['admin']=='Y'){	
											echo '
												<td class="align-middle">
													<input type="checkbox" name="checkbox[]" value='.$num.' id="check" class="child" >
												</td>
												<td class="align-middle">
													'.$i.'
												</td>
												<td class="align-middle">
													<select class="form-control" name="mych[]">';
														for($k=1;$k<25;$k++){
															echo '
																<option value="'.$k.'"';echo $k==$bun_row['mych']?'selected':''; echo'>'.$k.'</option>
															';
														}							
													
													echo'
													</select>			
												</td>
												<td class="align-middle">
													<textarea class="form-control mt-4 mb-4" rows="3" name="Q[]">'.$bun_row['Q'].'</textarea>
													<textarea class="form-control mb-4" rows="3" name="contain[]">'.$bun_row['contain'].'</textarea>
												</td>
												<td class="align-middle">
													<textarea class="form-control mt-4 mb-4" rows="3" name="jp[]">'.$bun_row['jp'].'</textarea>
													<textarea class="form-control mb-4" rows="3" name="ch[]">'.$bun_row['ch'].'</textarea>
												</td>
											';	
											$i++;
											$num++;									
										}
							echo '</tr>';
						}
					echo '</tbody> 
					</table>
					<div class="text-left mb-3">*勾選欲刪除的題目</div>
					<div class="text-left mb-3">*修改題目不需勾選</div>
					<div class="text-left">
						<button type="submit" class="btn btn-danger" name="submit" value="1">刪除</button>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-info" name="submit" value="2">完成修改</button>
					</div>
				</form>
			</div>';
			echo '<div class="min">';
				echo '<form method="POST" action="重組編輯">';
				echo '<table class="table text-center">

						<thead class="bg-success text-white">
							<tr>
								<th class="align-middle" rowspan="5"><input type="checkbox"  class="checkall"/></th>
								<th class="align-middle" rowspan="5">編號</th>
								<th>課程</th>
							</tr>
							<tr>
								<th>題目</th>
							</tr>
							<tr>
								<th>重組內容</th>
							</tr>
							<tr>
								<th>正確答案（日文）</th>
							</tr>
							<tr>
								<th>正確答案（中文）</th>
							</tr>
						</thead>';
						
								
						while ($bun_row = mysqli_fetch_array($bun_sql2)) {
							$content = str_replace( PHP_EOL, '<br />', $bun_row['content']);					
							echo '<tbody id="search">';
								echo '<input type="hidden" name="id[]" value="'.$bun_row['id'].'">';
								echo '<input type="hidden" name="id2" value="'.$bun_row['id'].'">';
								echo '<input type="hidden" name="notre" value="1">';	
								if(@$_SESSION['admin']=='Y'){	
									echo '
										<tr>
											<td class="align-middle" rowspan="5">
												<input type="checkbox" name="checkbox[]" value='.$j.' id="check" class="child" >
											</td>
											<td class="align-middle" rowspan="5">'.$bun_row['id'].'</td><td class="align-middle">
												<select class="form-control" name="mych[]">';
													for($j=1;$j<25;$j++){
														echo '
															<option value="'.$j.'"';echo $j==$bun_row['mych']?'selected':''; echo'>'.$j.'</option>
														';
													}							
													
													echo'
												</select>			
											</td>
										</tr>
										<tr>	
											<input type="hidden" name="buy[]" value='.$j.'>
											<td class="align-middle">
												<textarea class="form-control mt-4 mb-4" rows="3" name="Q[]">'.$bun_row['Q'].'</textarea>
											</td>
										</tr>
										<tr>
											<td class="align-middle">     
												<textarea class="form-control mb-4" rows="3" name="contain[]">'.$bun_row['contain'].'</textarea>
											</td>
										</tr>
										<tr>
											<td class="align-middle">
												<textarea class="form-control mt-4 mb-4" rows="3" name="jp[]">'.$bun_row['jp'].'</textarea>
											</td>
										</tr>
										<tr>
											<td class="align-middle">

												<textarea class="form-control mb-4" rows="3" name="ch[]">'.$bun_row['ch'].'</textarea>
											</td>
										</tr>
									';
					
									$j++;	
								}
							}
					echo '
						</tbody>
					</table>
					<div class="text-left mb-3">*勾選欲刪除的題目</div>
					<div class="text-left mb-3">*修改題目不需勾選</div>
					<div class="text-left">
						<button type="submit" class="btn btn-danger" name="submit" value="1">刪除</button>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-info" name="submit" value="2">完成修改</button>
					</div>
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
			
			if(@$_SESSION['admin']!='Y'){
				echo '<span>　　  * 　<i class="fas fa-shopping-cart mt-1 text-info"></i>　綠色未選商品<br>
				　　　　<i class="fas fa-cart-arrow-down mt-1 text-secondary"></i>　灰色為已放入購物車商品</span>';	
			}
			if (isset($_POST['submit'])) {
				$submit=$_POST['submit'];
					if($submit==1){
						// echo '1110';
											$check=$_POST['checkbox'];
				foreach($check as $value){		
					$id=$_POST['id'];
					$sql = "DELETE FROM bun WHERE id = '$id[$value]'";
					// echo $sql;
					if (mysqli_query($db, $sql)) {
						echo '<script language="javascript">';
						echo 'alert("刪除成功！");';
						echo "window.location.href='重組編輯'";
						echo "</script>"; 
					} else {
						echo '<script language="javascript">';
						echo 'alert("刪除失敗！");';
						echo "</script>"; 
					}		
				}	
					}else if($submit==2){
				$buy=$_POST['buy'];
				
				foreach($buy as $value2){	
					$id=$_POST['id'];
					$id2=$_POST['id2'];
					$Q=$_POST['Q'];
					$contain=$_POST['contain'];
					$jp=$_POST['jp'];
					$ch=$_POST['ch'];
					$mych=$_POST['mych'];
	
					$submit=$_POST['submit'];
						// echo "UPDATE `QandA` SET `Q`='$Q[$value2]',`A1`='$A1[$value2]',`A2`='$A2[$value2]',`A3`='$A3[$value2]',`A4`='$A4[$value2]',`ans`='$ans[$value2]',`mych`='$mych[$value2]' WHERE id = '$id[$value2]'<br>";
						$sql = "UPDATE `bun` SET `Q`='$Q[$value2]',`contain`='$contain[$value2]',`jp`='$jp[$value2]',`ch`='$ch[$value2]',`mych`='$mych[$value2]' WHERE id = '$id[$value2]'";
							// echo "UPDATE `goods` SET `item_id`='$item_id[$value2]',`class_id`='$class_id[$value2]',`goods_name`='$goods_name[$value2]',`information`='$information[$value2]',`unit`='$unit[$value2]',`price`='$price[$value2]',`photo`='$nphoto',`exist`='$exist[$value2]' WHERE goods_id = '$goods_id[$value2]'<br>";
						if (mysqli_query($db, $sql)) {
							
							
							// echo "更新成功";
							echo "<script type='text/javascript'>";
							echo 'alert("更新成功！");';
							echo "window.location.href='重組編輯'";
							echo "</script>"; 
						} else {
							echo "更新失敗";
						}	
	
					}						
				}
			}		
			
			
			mysqli_close($db);
		?>
	</div>
<!--	<?php include_once ("footer0.php"); ?>	 -->
</body>
</html>