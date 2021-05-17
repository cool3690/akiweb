<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("../head.php"); ?>	
</head>
<body>
	<?php include_once ("navbar_backstage.php"); ?>	
	<div class="container" style="padding-bottom:53px;">	
		<script>
		$(function(){
			$('.checkall').on('click', function() {
				$('.child').prop('checked', this.checked)
			});
		});
		</script>
		
		
		<?php
			require '../db_login.php';
			error_reporting(0);
			echo '<h3 class="mt-5 mb-5 d-flex justify-content-center"><span class="backstage_title">作業登錄</span></h3>';
			$account=$_SESSION['account'];
			// $sql = mysqli_query($db, "SELECT * FROM goods");
			// $sql2 = mysqli_query($db, "SELECT * FROM goods");
			$admin_sql = mysqli_query($db, "SELECT * FROM administrator where account=$account");	
			while ($admin_row = mysqli_fetch_array($admin_sql)) {
				$authorize=$admin_row['authorize'];
			}
			
			//設定分頁------------------------------------------------------------------------------
			$sql = "SELECT * FROM homework order by hw_id ASC";
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
			$i=($page-1)*10+1;
			
			//------------------------------------------------------------------------------
			$j=0;
			$check="";
			// echo $sql;
			if (isset($_POST['submit'])) {
				$submit=$_POST['submit'];
				if($submit=="1"){
					ini_set('date.timezone','Asia/Taipei');	
					$sdate=$_POST['sdate'];
					$title = $_POST['title'];
					$text = $_POST['file'];
					$file = $_FILES['file']['name'];
					$course_sql = mysqli_query($db, "SELECT max(hw_id) FROM homework");
					while ($course_row = mysqli_fetch_array($course_sql)) {
						$max=$course_row[0]; 
					}
					$nmax=$max+1;
					// file file directory
					$format=substr($file, -3);
					//echo $format;
					if($format=="ocx"){
						$target = "../images/hw/HW".$nmax."-1.docx";
						$nfile = 'HW'.$nmax."-1.docx";
					}else if($format=="doc"){
						$target = "../images/hw/HW".$nmax."-1.doc";
						$nfile = 'HW'.$nmax."-1.doc";
					}else if($format=="pdf"){
						$target = "../images/hw/HW".$nmax."-1.pdf";
						$nfile = 'HW'.$nmax."-1.pdf";
					}
					$sql = "INSERT INTO homework (`sdate`, `title`, `file`, `exist`) VALUES ('$sdate', '$title', '$nfile', '0')";
					if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
						if (mysqli_query($db, $sql)) {
							echo "<script type='text/javascript'>";
							echo 'alert("新增成功！");';
							echo "window.location.href='作業登錄'";
							echo "</script>"; 
						} else {
							echo '<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
										<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！請正確上傳所有內容資料</strong> 
								  </div>';
						}
					}else{
						echo '<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>錯誤！檔案錯誤</strong> 
							  </div>';
					}
				}else if($submit=="2"){
					$check=$_POST['checkbox'];
					// echo "!";
					foreach($check as $value){		
						$hw_id=$_POST['hw_id'];
						$sql = "DELETE FROM homework WHERE hw_id = '$hw_id[$value]'";

						if (mysqli_query($db, $sql)) {
							echo "<script type='text/javascript'>";
							echo 'alert("刪除成功！");';
							echo "window.location.href='作業登錄'";
							echo "</script>"; 
						} else {
							echo "更新失敗";
						}	
					}
					
				}else if($submit=="3"){
						
					$check=$_POST['checkbox'];
					foreach($check as $value2){
						$hw_id=$_POST['hw_id'];
						$title=$_POST['title'];
						$exist=$_POST['exist'];
						$file=$_POST['file'];
						$sdate=$_POST['sdate'];
						$file2 = $_FILES['file2']['name'];
						$exist = $_POST['exist'];
					
						if($file2[$value2]!=null && $file[$value2]!=$file2[$value2]){
							$format=str_replace(".","",substr($file2[$value2], -4));
							$nfile="HW".$hw_id[$value2]."-1.".$format;
							$target = "../images/hw/HW".$hw_id[$value2]."-1.".$format;

							move_uploaded_file($_FILES['file2']['tmp_name'][$value2], $target);		
							$sql = "UPDATE `homework` SET `sdate`='$sdate[$value2]', `title`='$title[$value2]', `exist`='$exist[$value2]', `file`='$nfile' WHERE hw_id = '$hw_id[$value2]'";
							// echo $sql;

							if (mysqli_query($db, $sql)) {
								$check="T";
							}					
						}else{	
							$sql = "UPDATE `homework` SET `sdate`='$sdate[$value2]', `title`='$title[$value2]', `exist`='$exist[$value2]' WHERE hw_id = '$hw_id[$value2]'";
							// echo $sql;
							if (mysqli_query($db, $sql)) {
								$check="T";
							}					
						}
					}
					if ($check=="T") {
						echo "<script type='text/javascript'>";
						echo 'alert("更新成功！");';
						echo "window.location.href='作業登錄'";
						echo "</script>"; 
					} else {
						echo '
							<div class="alert alert-danger alert-dismissible" id="myAlert">
								<button type="button" class="close">&times;</button>
								<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>更新失敗！</strong> 
							</div>
						';
					}
				}
			}	
						
echo '
			<form action="作業登錄" method="POST" enctype="multipart/form-data" class="mb-5">
				<input type="hidden" name="size" value="1000000">
				<div class="row">	
					<div class="col-sm-12 col-md-12 col-lg-3" style="padding-bottom:3px;">
						<p class="text-center">日期</p>
						<input type="text" class="form-control" name="sdate" id="datepicker" value="" required>	
					</div>		
					<div class="col-sm-12 col-md-12 col-lg-5" style="padding-bottom:3px;">	
						<p class="text-center">作業名稱</p>
						<input type="text" class="form-control" name="title" required>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-2">	
						<p>上傳作業檔案</p>
							<input type="file" name="file" required> 
					</div>	
					<div class="col-sm-12 col-md-12 col-lg-2 text-center">	
						<button type="submit" class="btn btn-info mt-3" name="submit" value="1">完成新增</button>
					</div>	
				</div>										
			</form>

			<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2" id="list_max">
				<table class="table text-center">
							<thead style="background-color:#ACD6FF;">
								<tr>
									<th width="1%"><input type="checkbox"  class="checkall"/></th>
									<th width="15%">日期</th>
									<th width="">作業名稱</th>
									<th width="13%">狀態</th>
									<th width="10%">上傳作業檔案</th></tr>
								</tr>
							</thead>
					<form method="POST" action="作業登錄" enctype="multipart/form-data">
';		
						while ($row = mysqli_fetch_array($result)) {
							$content = str_replace( PHP_EOL, '<br />', $row['content']);	
							$file=$row['file'];
							$file_name=str_replace(".","",substr($file,0,6));
					$datepicker='datepicker'.$j;
echo'
							<tbody>
								<tr>
									<input type="hidden" name="hw_id[]" value="'.$row['hw_id'].'">
									<td class="align-middle"><input type="checkbox" name="checkbox[]" class="child" value='.$j.'></td>
										<td class="align-middle">
											<input type="text" class="form-control" name="sdate[]" id='.$datepicker.' value="'.$row['sdate'].'">
										</td>		
										<input type="hidden" name="buy[]" value='.$j.'>
										<td class="align-middle">
											<textarea class="form-control" rows="1" name="title[]">'.$row['title'].'</textarea>
											
										</td>
										<td class="align-middle">
											<select class="form-control" name="exist[]">
													<option value="0"'; echo $row["exist"] == "0" ? "selected":"";  echo '>上架</option>
													<option value="1"'; echo $row["exist"] == "1" ? "selected":"";  echo '>下架</option>
											</select>								
										</td>
										<td class="align-middle">
											<input type="hidden" class="form-control" name="file[]" value="'.$row['file'].'">
											<input type="file" name="file2[]"> 
											<a href="images/hw/'.$file.'" target="_blank">'.$file_name.'</a>
										</td>	
';	
						  
echo '
							</tr>
';
								$j++;
							}
echo '
						</tbody> 
					</table>
						<div class="text-left">
							<button type="submit" class="btn btn-danger" name="submit" value="2">刪除</button>
						</div>					
					<div class="text-center">
						<button type="submit" class="btn btn-info" name="submit" value="3">完成修改</button>
					</div>
				</form>
			</div>
';
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
				echo '
					<span>　　  * 　<i class="fas fa-shopping-cart mt-1 text-info"></i>　綠色未選商品<br>
				　　　　<i class="fas fa-cart-arrow-down mt-1 text-secondary"></i>　灰色為已放入購物車商品</span>
				';	
			}		
			mysqli_close($db);
		?>
	</div>
	<script type="text/javascript">
		$(function(){
			$( "#datepicker" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yy/mm/dd",
				timeFormat:  "hh:mm:ss"			
			});

			<?php
			
				$sql2 = mysqli_query($db, "SELECT count(*) FROM homework");
				while ($row = mysqli_fetch_array($sql2)) {
					$num=$row[0];
				}
				for($i=0;$i<=$num;$i++){
					echo'$( "#datepicker'.$i.'" ).datepicker({
						changeMonth:true,
						changeYear:true,
						dateFormat:"yy/mm/dd",
						timeFormat:  "hh:mm:ss"			
					});
					';
				}
			?>	
		});		
	</script>
	<?php include_once ("../footer0.php"); ?>
</body>
</html>