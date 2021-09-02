<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>	
</head>
<body>
	<script type="text/javascript">
		//input全選
		$(function(){
			$('.checkall').on('click', function() {
				$('.child').prop('checked', this.checked)
			});
		});
		
		$(document).ready(function(){
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
	<style>
		body {
			background-image: url("images/backstage_bg.png");
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
		}
	</style>
	<?php include_once ("navbar_backstage.php"); ?>	
	<div class="container pl-5 pr-5" style="padding-bottom:8%;">
			<?php
				require 'db_login.php';
				error_reporting(0);
				echo '		
					<div class="row mt-3 mb-3">	
						<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4"></div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4">
							<h3 class="mb-5 d-flex justify-content-center"><span class="backstage_title">題目資料</span></h3>
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4">
							搜尋題目：<input class="form-control" id="myInput" type="text" placeholder="Search..">
						</div>
					</div>
				';
				$goods_sql = mysqli_query($db, "SELECT * FROM QandA");
				$sql = mysqli_query($db, "SELECT * FROM goods");
				echo '<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-12 mb-2" id="topic_list_max">';
					echo '<table class="table text-center">
							<thead><tr class="table-success">
								<th><input type="checkbox"  class="checkall"/></th>
								<th width="8%">編號</th>
								<th width="">題目</th>
								<th width="12%">選項1/選項2</th>
								<th width="12%">選項3/選項4</th>
								<th width="10%">正確答案/課程</th>
							<!--	<th width="25%">處理狀態</th>  -->
							</tr></thead>';			
							$i=0;
							
					echo '<form method="POST" action="多選題編輯" enctype="multipart/form-data">';		
				while ($goods_row = mysqli_fetch_array($goods_sql)) {
					$content = str_replace( PHP_EOL, '<br />', $goods_row['content']);					
					echo '<tbody id="myTable"><tr>';
					echo '<input type="hidden" name="num[]" value="'.$goods_row['num'].'">';
					echo '<input type="hidden" name="num2" value="'.$goods_row['num'].'">';
					echo '<input type="hidden" name="notre" value="1">';	
					if(@$_SESSION['admin']=='Y'){	
						echo '
						
						  <td class="align-middle">
								<input type="checkbox" name="checkbox[]" value='.$i.' id="check" class="child" >
						  </td>
						<td class="align-middle">'.$goods_row['num'].'</td>';
						echo '<input type="hidden" name="buy[]" value='.$i.'>';
						echo '<td class="align-middle">
							<textarea class="form-control" rows="5" name="Q1[]">'.$goods_row['Q1'].'</textarea>
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="A1[]" value="'.$goods_row['A1'].'">
							<input type="text" class="form-control" name="A2[]" value="'.$goods_row['A2'].'">
						</td>';
						echo '<td class="align-middle">
							<input type="text" class="form-control" name="A3[]" value="'.$goods_row['A3'].'">
							<input type="text" class="form-control" name="A4[]" value="'.$goods_row['A4'].'">
						</td>';
						echo '<td class="align-middle">
						<select class="form-control" name="ans[]">';
						for($j=1;$j<5;$j++){
							echo '
								<option value="'.$j.'"';echo $j==$goods_row['ans']?'selected':''; echo'>'.$j.'</option>
							';
							}	
							echo'
							</select>	
						<select class="form-control" name="mych[]">';
						for($j=1;$j<25;$j++){
							echo '
								<option value="'.$j.'"';echo $j==$goods_row['mych']?'selected':''; echo'>'.$j.'</option>
							';
							}							
							
								echo'
							</select>			
						</td>';		
	
						  $i++;	
					}
					echo '</tr>';
				}
				echo '</tbody> </table>
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
						$num=$_POST['num'];
						$sql = "DELETE FROM QandA WHERE num = '$num[$value]'";
						// echo $sql;
						if (mysqli_query($db, $sql)) {
							echo '<script language="javascript">';
							echo 'alert("刪除成功！");';
							echo "window.location.href='多選題編輯'";
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
						$num=$_POST['num'];
						$num2=$_POST['num2'];
						$Q1=$_POST['Q1'];
						$A1=$_POST['A1'];
						$A2=$_POST['A2'];
						$A3=$_POST['A3'];
						$A4=$_POST['A4'];
						$ans=$_POST['ans'];
						$mych=$_POST['mych'];

						$submit=$_POST['submit'];
							// echo "UPDATE `QandA` SET `Q1`='$Q1[$value2]',`A1`='$A1[$value2]',`A2`='$A2[$value2]',`A3`='$A3[$value2]',`A4`='$A4[$value2]',`ans`='$ans[$value2]',`mych`='$mych[$value2]' WHERE num = '$num[$value2]'<br>";
							$sql = "UPDATE `QandA` SET `Q1`='$Q1[$value2]',`A1`='$A1[$value2]',`A2`='$A2[$value2]',`A3`='$A3[$value2]',`A4`='$A4[$value2]',`ans`='$ans[$value2]',`mych`='$mych[$value2]' WHERE num = '$num[$value2]'";
								// echo "UPDATE `goods` SET `item_num`='$item_num[$value2]',`class_num`='$class_num[$value2]',`goods_name`='$goods_name[$value2]',`information`='$information[$value2]',`unit`='$unit[$value2]',`price`='$price[$value2]',`photo`='$nphoto',`exist`='$exist[$value2]' WHERE goods_num = '$goods_num[$value2]'<br>";
							if (mysqli_query($db, $sql)) {
								
								
								// echo "更新成功";
								echo "<script type='text/javascript'>";
								echo "window.location.href='多選題編輯'";
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