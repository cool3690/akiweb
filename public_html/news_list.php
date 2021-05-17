<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script>
	$(function(){
		$('.checkall').on('click', function() {
			$('.child').prop('checked', this.checked)
		});
	});
	</script>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
			text-align: justify;
		}
	</style>
	<?php include_once ("navbar_backstage.php"); ?>	

	<div class="container">
		<?php
			echo '
				<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">大事記要資料</span></h3>
			';
			$account=$_SESSION['account'];
			require 'db_login.php';
			error_reporting(0);
				//設定分頁
			$sql = "SELECT * FROM news order by news_id DESC";
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
			
			$news_sql = mysqli_query($db, $sql.' LIMIT '.$start_page.', '.$per_num);
			// echo  $sql.' LIMIT '.$start_page.', '.$per_num;
			$i=($page-1)*10+1;
			$j=1;		
			$num=0;	

			$news_sql2 = mysqli_query($db, "SELECT * FROM news order by news_id DESC");
			$sql = mysqli_query($db, "SELECT * FROM news");
			echo '<div class="max">';
				echo '<form method="POST" action="news_list.php" enctype="multipart/form-data">';	
				echo '<table class="table text-center">
						<thead>
							<tr class="table-success">
								<th width="3%"><input type="checkbox"  class="checkall"/></th>
								<th width="8%">編號</th>
								<th width="10%">日期</th>
								<th width="50%">標題/內容</th>
								<th width="">照片</th>
							</tr>
						</thead>';	
											
						echo '<tbody>';
						while ($news_row = mysqli_fetch_array($news_sql)) {
							$content = str_replace( PHP_EOL, '<br />', $news_row['content']);					
							echo '<tr>';
								echo '<input type="hidden" name="news_id[]" value="'.$news_row['news_id'].'">';
								echo '<input type="hidden" name="notre" value="1">';	
								if(@$_SESSION['admin']=='Y'){	
									echo '<input type="hidden" name="buy[]" value='.$num.'>';
									echo '<td class="align-middle">
											<input type="checkbox" name="checkbox[]" class="child" value='.$num.'>
										  </td>';
									echo '<td class="align-middle">
											'.$i.'
										  </td>';
									echo '<td class="align-middle">
											'.$news_row['date'].'
										  </td>';
									echo '<td class="align-middle">
											<input type="text" class="form-control mt-4 mb-4" name="title[]" value="'.$news_row['title'].'">
											<textarea class="form-control mb-4" rows="8" name="text[]">'.$news_row['text'].'</textarea>
										 </td>';
									echo '<td class="align-middle">
											<a data-fancybox="gallery" href="images/news/'.$news_row['photo'].'">
												<img class="img-fluid text-center mb-3" src="images/news/'.$news_row['photo'].'" width="70%">
											</a>
											<!-- <div>'.$news_row['photo'].'</div> -->
											<input type="hidden" class="form-control" name="photo[]" value="'.$news_row['photo'].'">
											<input type="file" class="form-control-file border" name="photo2[]">
										 </td>';
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
				echo '<form method="POST" action="news_list.php" enctype="multipart/form-data">';	
				echo '<table class="table text-center">
						<thead class="bg-success text-white">
							<tr>
								<th class="align-middle" rowspan="5"><input type="checkbox"  class="checkall"/></th>
								<th class="align-middle" rowspan="5">編號</th>
								<th>日期</th>
							</tr>
							<tr>
								<th>標題</th>
							</tr>
							<tr>
								<th>內容</th>
							</tr>
							<tr>
								<th>照片</th>
							<!--	<th width="25%">處理狀態</th>  -->
							</tr>
						</thead>';	
						$i=1;
						$j=1;		
						$num=0;	
							
						while ($news_row = mysqli_fetch_array($news_sql2)) {
							// $content = str_replace( PHP_EOL, '<br />', $news_row['content']);					
							echo '<tbody>';
							echo '<input type="hidden" name="news_id[]" value="'.$news_row['news_id'].'">';
							echo '<input type="hidden" name="notre" value="1">';	
							if(@$_SESSION['admin']=='Y'){	
								echo '<input type="hidden" name="buy[]" value='.$num.'>';
								echo '<tr>';
									echo '<td class="align-middle" rowspan="5">
											<input type="checkbox" name="checkbox[]" class="child" value='.$num.'>
									      </td>';
									echo '<td class="align-middle" rowspan="5">'.$i.'
									      </td>';
									echo '<td class="align-middle">'.$news_row['date'].'
									      </td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td class="align-middle">
											<textarea class="form-control" rows="2" name="title[]">'.$news_row['title'].'</textarea>
										  </td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td class="align-middle">
											<textarea class="form-control" rows="5" name="text[]">'.nl2br($news_row['text']).'</textarea>
										  </td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td class="align-middle">
											<a data-fancybox="gallery" href="images/news/'.$news_row['photo'].'">
												<img class="img-fluid text-center mb-3" src="images/news/'.$news_row['photo'].'" width="70%">
											</a>
											<!-- <div>'.$news_row['photo'].'</div> -->
											<input type="hidden" class="form-control" name="photo[]" value="'.$news_row['photo'].'">
											<input type="file" class="form-control-file border" name="photo2[]">
										 </td>';
							    echo '</tr>';
								$i++;
								$num++;	
							}
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
					//刪除消息
					$check=$_POST['checkbox'];
					foreach($check as $value){		
						$news_id=$_POST['news_id'];
						$sql = "DELETE FROM news WHERE news_id = '$news_id[$value]'";

						if (mysqli_query($db, $sql)) {
							echo "<script type='text/javascript'>";
							echo 'alert("刪除成功！");';
							echo "window.location.href='news_list.php'";
							echo "</script>"; 
						} else {
							echo "更新失敗";
						}	
					}
				}else{
					$buy=$_POST['buy'];
					foreach($buy as $value2){	
						$news_id=$_POST['news_id'];
						$title=$_POST['title'];
						$text=$_POST['text'];
						$photo=$_POST['photo'];
						$photo2 = $_FILES['photo2']['name'];

						$format=substr($photo, -3);
						if($format=="jpg"){
							$target = "images/news/".$news_id[$value2]."-1.jpg";
						}else{
							$target = "images/news/".$news_id[$value2]."-1.png";
						}
						
						if($photo2[$value2]!=null && $photo[$value2]!=$photo2[$value2]){
							if($format=="jpg"){
								$nphoto=$news_id[$value2]."-1.jpg";
							}else{
								$nphoto=$news_id[$value2]."-1.png";
							}
							move_uploaded_file($_FILES['photo2']['tmp_name'][$value2], $target);					
						}else{
							$nphoto=$photo[$value2];
						}
						$sql = "UPDATE `news` SET `title`='$title[$value2]',`text`='$text[$value2]',`photo`='$nphoto' WHERE news_id = '$news_id[$value2]'";
						//echo  "UPDATE `news` SET `title`='$title[$value2]',`text`='$text[$value2]',`photo`='$nphoto' WHERE news_id = '$news_id[$value2]'";
						if (mysqli_query($db, $sql)) {
							echo "<script type='text/javascript'>";
							echo 'alert("更新成功！");';
							echo "window.location.href='news_list.php'";
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