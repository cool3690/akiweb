<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once ("head.php"); ?>			
</head>
<body>
	<div class="container-filud">	
		<div id="app">
			<?php include_once ("navbar_goods_admin.php"); ?>
		</div>
		<div class="container mt-5 mb-5">	
		<h3 class="text-center mt-5 mb-5"><span class="pl-4" style="border-left:6px solid #005AB5;">商品訂單</span></h3>
		<?php 
			require 'db_login.php';
			$account = $_SESSION['account'];
			error_reporting(0);
			$a=1;
			$sum=0;
			$gorder_tmp_id='';
			$person_sql = mysqli_query($db, "SELECT * FROM goods_order01 a left join goods01 b on a.goods_num=b.goods_num where account='0912345678' ORDER BY gorder_id DESC");
			while ($person_row = mysqli_fetch_array($person_sql)) {
				$gorder_id=$person_row['gorder_id'];
				$price=$person_row[6];
				$subtotal=$price*$person_row['amount'];
				$gorder_sql2 = mysqli_query($db, "SELECT count(*) FROM goods_order01 where gorder_id='$gorder_id'");
				while ($gorder_row2 = mysqli_fetch_array($gorder_sql2)) {
					$gorder_max = $gorder_row2[0];
				}
				
				$status_tmp = $person_row['status'];
				if($status_tmp == "A"){
					$status="已出貨";
				}else if($status_tmp == "B"){
					$status="下單完成";
				}else if($status_tmp == "C"){
					$status="取消訂單";
				}
				
				if($gorder_id!=$gorder_tmp_id){
					$gorder_tmp_id=$gorder_id;
echo '
					<table class="table text-center mt-3 mb-5">
						<span class="pl-5">訂單編號：'.$gorder_id.'</span>
						<span class="pl-5">訂單日期：'.$person_row['sdate'].'</span>
						<span class="pl-5 pr-5">商品狀態：'.$status.'</span>
';

							if($status_tmp == "B"){
								$status="下單完成";
								echo '
									<form method="POST" action="管理訂單">
										<input type="hidden" name="gorder_id" value="'.$gorder_id.'">
										<button type="submit" name="submit" class="btn text-white btn-sm ml-4" style="background-color:#ff9797;" value="1">出貨去</button>
										<button type="submit" name="submit" class="btn text-white btn-sm ml-4" style="background-color:#EA0000;" value="2">取消訂單</button>
									</form>
								';
							}
echo'
						<thead style="background-color:#FCFCFC;">
							<tr>
								<th>商品</th>
								<th>品牌名稱</th>
								<th>單價</th>
								<th width="10%">數量</th>
								<th>小計</th>
							</tr>
						</thead>
						<tbody>
';
				}
echo'
							<tr>
								<td class="align-middle">
									<img src="images/goods/'.$person_row['photo'].'" style="width:100px;height:100px;">
								</td>
								<td class="align-middle">
									'.$person_row['goods_name'].'
								</td>
								<td class="align-middle">
									'.$price.'
								</td>
								<td class="align-middle">
									'.$person_row['amount'].'
								</td>
								
								<td class="align-middle">
									'.$subtotal.'
								</td>
							</tr>
';
				$sum += $subtotal;
				if($a==$gorder_max){
echo '
							<tr>
								<td></td><td></td><td></td><td class="align-middle">總計</td><td class="align-middle">'.$sum.'</td>
							</tr>
						</tbody> 
					</table>
					
';
					$a=0;
					$sum=0;
				}
				$a++;
			}
			
			if (isset($_POST['submit'])) {
				$submit=$_POST['submit'];
				$gorder_id=$_POST['gorder_id'];
				if($submit==1){
					$sql = "UPDATE `goods_order01` SET `status`='A' WHERE gorder_id = '$gorder_id'";
					if (mysqli_query($db, $sql)) {
						echo "<script type='text/javascript'>";
						echo 'alert("更新成功！");';
						echo "window.location.href='管理訂單'";
						echo "</script>"; 
					} else {
					echo '<div class="alert alert-danger alert-dismissible" id="myAlert">
						<button type="button" class="close">&times;</button>
							<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>更新失敗！</strong> 
					  </div>';
					}
				}else{
					$sql = "UPDATE `goods_order01` SET `status`='C' WHERE gorder_id = '$gorder_id'";
					if (mysqli_query($db, $sql)) {
						echo "<script type='text/javascript'>";
						echo 'alert("更新成功！");';
						echo "window.location.href='管理訂單'";
						echo "</script>"; 
					} else {
					echo '<div class="alert alert-danger alert-dismissible" id="myAlert">
						<button type="button" class="close">&times;</button>
							<i class="fas fa-times fa-lg pr-3" style="color:red;"></i><strong>更新失敗！</strong> 
					  </div>';
					}
				}
			}
			mysqli_close($db);
		?>
	</div>
	<script src="language/language.js"></script>
</body>
</html>